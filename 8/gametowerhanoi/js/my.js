document.addEventListener('DOMContentLoaded', () => {
    const diskCountE = document.getElementById("diskCount");
    diskCountE.addEventListener("change", () => {
        const diskCount = parseInt(diskCountE.value);
        if (MAX_TOTAL_DISK - diskCount <= 0) {
            alert("The maximum number of disks is " +  (diskCount - 1));
            return;
        }
        start(diskCount);
    })

    const restartButton = document.getElementById("restartButton");
    restartButton.addEventListener("click", () => {
        document.getElementById("diskCount").value = DEFAULT_TOTAL_DISK
        start(DEFAULT_TOTAL_DISK);
    })
});

function start(diskCount) {
    const game = new GameMain('my-canvas', diskCount);
    game.init();
}

start(DEFAULT_TOTAL_DISK);