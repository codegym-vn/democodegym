const game = new GameMain('my-canvas', DEFAULT_TOTAL_DISK);

document.addEventListener('DOMContentLoaded', () => {
    const restartButton = document.getElementById("restartButton");
    restartButton.addEventListener("click", () => {
        document.getElementById("diskCount").value = DEFAULT_TOTAL_DISK
        game.setNumberDisk(DEFAULT_TOTAL_DISK);
    })
});

function changeNumberDisk() {
    const diskCountE = document.getElementById("diskCount");
    const diskCount = parseInt(diskCountE.value);
    if (MAX_TOTAL_DISK - diskCount <= 0) {
        alert("The maximum number of disks is " +  diskCount);
        return;
    }

    if (diskCount < MIN_TOTAL_DISK) {
        alert("The minimum number of disks is " + MIN_TOTAL_DISK);
        return;
    }

    game.setNumberDisk(diskCount);
}

function start() {
    game.init();
}

start();