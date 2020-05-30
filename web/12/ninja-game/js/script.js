/**
 * Created by nhatnk on 6/27/17.
 */
const GAMEBOARD_WIDTH = 500;
const GAMEBOARD_HEIGHT = 500;

const ORIENTATION_LEFT = "left";
const ORIENTATION_RIGHT = "right";
const ORIENTATION_UP = "up";
const ORIENTATION_DOWN = "down";

const NINJA_WIDTH = 59;
const NINJA_HEIGHT = 86;

const DEFAULT_NINJA_X_POSITION = 100;
const DEFAULT_NINJA_Y_POSITION = 100;
const DEFAULT_NINJA_ORIENTATION = ORIENTATION_DOWN;
const DEFAULT_NINJA_SPEED = 20;

function Ninja(){
    this.xPosition = DEFAULT_NINJA_X_POSITION;
    this.yPosition = DEFAULT_NINJA_Y_POSITION;
    this.orientation = ORIENTATION_DOWN;
    this.speed = DEFAULT_NINJA_SPEED;
    this.step = 1;

    this.buildImage = function(){
        this.image = this.orientation + this.step + '.png';
    };

    this.buildImage();

    this.move = function(){
        switch (this.orientation) {
            case ORIENTATION_DOWN:
                this.yPosition += this.speed;
                break;
            case ORIENTATION_UP:
                this.yPosition -= this.speed;
                break;
            case ORIENTATION_LEFT:
                this.xPosition -= this.speed;
                break;
            case ORIENTATION_RIGHT:
                this.xPosition += this.speed;
                break;
        }

        if(this.step === 2){
            this.step = 1;
        } else {
            this.step = 2;
        }
        this.buildImage();
    };

    this.turn = function(orientation){
        this.orientation = orientation;
        this.step = 1;
        this.buildImage();
    };

    this.show = function(ctx){
        var image = new Image();
        var xPosition = this.xPosition;
        var yPosition = this.yPosition;
        image.onload = function(){
            ctx.drawImage(image, xPosition, yPosition);
        };
        image.src = './images/' + this.image;
    }
}

function GameBoard() {
    this.ninja = new Ninja();
    this.ctx = undefined;
    this.start = function(){
        this.ctx = document.getElementById('gameCanvas').getContext('2d');
        this.ninja.show(this.ctx);
    };

    this.render = function(){
        this.ctx.clearRect(0, 0, GAMEBOARD_WIDTH, GAMEBOARD_HEIGHT);
        this.ninja.show(this.ctx);
    };

    this.moveNinja = function(event){
        var orientation = 0;
        switch (event.which){
            case 37:
                orientation = ORIENTATION_LEFT;
                break;
            case 38:
                orientation = ORIENTATION_UP;
                break;
            case 39:
                orientation = ORIENTATION_RIGHT;
                break;
            case 40:
                orientation = ORIENTATION_DOWN;
                break;
        }

        if(orientation){
            if(this.ninja.orientation !== orientation){
                this.ninja.orientation = orientation;
            } else {
                this.ninja.move();
            }
            this.render();
        }
    }
}

var gameBoard = new GameBoard();
gameBoard.start();