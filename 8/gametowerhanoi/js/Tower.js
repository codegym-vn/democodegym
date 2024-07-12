class Tower {
    constructor(index) {
        this.index = index;
        this.disks = [];
        this.color = DEFAULT_COLOR_TOWER;
        this.with = DEFAULT_TOWER_WIDTH;
        this.height = DEFAULT_TOWER_HEIGHT;
        this.name = "";
    }

    addDisk(disk) {
        if (this.canAddDisk(disk)) {
            this.disks.push(disk);
            return true;
        }
        return false;
    }

    removeDisk() {
        return this.disks.pop();
    }

    canAddDisk(disk) {
        return this.emptyDisk() || !this.diskIsFull(disk);
    }

    diskIsFull(disk) {
        return this.disks[this.disks.length - 1].size < disk.size;
    }

    emptyDisk() {
        return this.disks.length === 0;
    }

    draw(ctx, x, y) {
        this.drawTower(ctx, x, y);
        this.drawDisk(ctx, x, y);
    }

    drawTower(ctx, x, y) {
        const baseHeight = 10;
        ctx.fillStyle = this.color;
        ctx.fillRect(x - this.with / 2, y - this.height - 20, this.with, this.height);
        ctx.fillRect(x - 50, y - 20, 100, baseHeight);
        //show name tower
        ctx.fillStyle = 'black';
        ctx.font = '20px Arial';
        ctx.fillText(this.name, x - 10, y + 20);
        ctx.closePath();
    }

    drawDisk(ctx, x, y) {
        for (let i = 0; i < this.disks.length; i++) {
            this.disks[i].draw(ctx, x, y - (i + 1) * 20);
        }
    }

    setName(name) {
        this.name = name;
    }
}