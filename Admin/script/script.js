let discoOn = false;
let discoInterval;

function startDisco() {
    if (!discoOn) {
        discoInterval = setInterval(() => {
            document.body.style.backgroundColor =
                'rgb(' +
                Math.floor(Math.random() * 256) + ',' +
                Math.floor(Math.random() * 256) + ',' +
                Math.floor(Math.random() * 256) + ')';
        }, 100);
        discoOn = true;
    } else {
        clearInterval(discoInterval);
        document.body.style.backgroundColor = "";
        discoOn = false;
    }
}
