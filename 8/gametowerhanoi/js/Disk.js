class Disk {
    constructor(size) {
        this.size = size;
        this.x = null;
        this.y = null;
        this.width = this.size * 30;
        this.height = 20;
    }

    draw(ctx, x, y) {
        ctx.beginPath();
        this.x = x;
        this.y = y;
        ctx.fillStyle = `hsl(${this.size * 60}, 100%, 50%)`;
        ctx.fillRect(this.x - this.width / 2, this.y - this.height, this.width, this.height);
        ctx.closePath();
    }
}