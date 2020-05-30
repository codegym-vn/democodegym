/**
 * Created by nhatnk on 6/28/17.
 */
const CARD_SIZE = 100;
const BOARD_ROWS = 5;
const BOARD_COLS = 5;

function Card(x, y, value) {
    this.x = x;
    this.y = y;
    this.value = value;

    this.render = function(parent){
        var left = this.x * (CARD_SIZE  + 10);
        var top = this.y * (CARD_SIZE  + 10);

        var wrapper = $('<div class="card-wrapper" style="left: '+left+'px; top: '+top+'px;"></div>');

        var card = $('<div class="card" x="'+this.x+'" y="'+this.y+'" value="'+this.value+'">' +
                        '<div class="front">' +
                        '</div>' +
                        '<div class="back">' +
                            '<img src="images/'+this.value+'.png"/>' +
                        '</div>' +
                    '</div>');
        card.flip();
        wrapper.append(card);
        parent.append(wrapper);
    };
}

function GameBoard() {
    this.cards = [];
    this.flipped;

    this.start = function(){
        var pairs = this.generatePairs();
        for(var i = 0; i < BOARD_ROWS; i++){
            this.cards[i] = [];
            for(var j = 0; j < BOARD_COLS; j++){
                var randomIndex = Math.random() * pairs.length - 1;
                var value = pairs.splice(randomIndex, 1)[0];
                this.cards[i][j] = new Card(i, j, value);
            }
        }
    };

    this.generatePairs = function(){
      var arr = [];
      var pairCount = BOARD_COLS * BOARD_ROWS / 2;
      for(var i = 0; i < pairCount; i++){
          arr[i * 2] = i + 1;
          arr[i * 2 + 1] = i + 1;
      }
      return arr;
    };

    this.render = function(){
        for(var i = 0; i < BOARD_ROWS; i++){
            for(var j = 0; j < BOARD_COLS; j++){
                this.cards[i][j].render($('body'));

            }
        }

        var cards = this.cards;
        $(".card").on('flip:done',function(){
            var x = $(this).attr('x');
            var y = $(this).attr('y');
            if(getFlip()) {
                check(cards[x][y]);
            } else {
                setFlip(cards[x][y]);
            }
        });

        $('body').append('<div id="timer"></div>');
    };

    setFlip = function(card){
        this.flipped = card;
    };

    getFlip = function(){
        return this.flipped;
    };

    check = function(card){
        if(this.flipped.value === card.value) {
            hide(card);
            hide(this.flipped);
        } else {
            reset(card);
            reset(this.flipped);
        }
        this.flipped = undefined;
    };

    hide = function(card){
        $('.card[x="'+card.x+'"][y="'+card.y+'"]').hide();
    };

    reset = function(card){
        $('.card[x="'+card.x+'"][y="'+card.y+'"]').flip(false);
    }

}

var gameBoard = new GameBoard();
gameBoard.start();
gameBoard.render();