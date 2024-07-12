class CounterMove {
    constructor() {
        this.count = 0;
    }

    draw(ctx) {
        ctx.beginPath();
        ctx.fillStyle = 'black';
        ctx.font = '20px Arial';
        ctx.fillText(`Moves: ${this.count}`, 500, 50);
        ctx.closePath();
    }

    incrementMove(ctx) {
        this.count++;
        this.draw(ctx);
    }
}
