let table = $("#game");
let x;
let y;
let isGameStart = false
let heroSelected = false;
let hero;
let fieldWidth = 20;
let fieldHeight = 20;


CreateFieldGame();

function Game(e) {
    if (isGameStart) {
        table.empty();
        CreateFieldGame();
    }
    else {
        StartGame();
    }
}

document.onkeydown = function (e) {
    if (heroSelected) {
        switch (e.key) {
            case 'ArrowUp':
                if (x > 0 && document.getElementById((x - 1) + ',' + y).disabled == false)
                    --x;
                break;

            case 'ArrowDown':
                if (x < fieldHeight - 1 && document.getElementById((x + 1) + ',' + y).disabled == false)
                    ++x;
                break;

            case 'ArrowLeft':
                if (y > 0 && document.getElementById(x + ',' + (y - 1)).disabled == false)
                    --y;
                break;

            case 'ArrowRight':
                if (y < fieldWidth - 1 && document.getElementById(x + ',' + (y + 1)).disabled == false)
                    ++y;
                break;

            default:
                return;
        }
        hero.checked = false;
        hero = document.getElementById(x + ',' + y);
        hero.checked = true;
    }

}

function CreateFieldGame() {
    for (let i = 0; i < fieldHeight; i++) {
        for (let j = 0; j < fieldWidth; j++) {
            let el = $("<input>");
            el.attr('TYPE', 'CHECKBOX');
            el.attr('id', i + ',' + j);
            table.append(el);
        }
        let br = $("<br>");
        table.append(br);
    }

    isGameStart = false
    heroSelected = false;
    hero = null;
}

function StartGame() {
    for (let i = 0; i < fieldHeight; i++) {
        for (let j = 0; j < fieldWidth; j++) {
            let el = document.getElementById(i + ',' + j);

            if (el.checked) {
                el.disabled = true;
            }
            else {
                el.addEventListener('click', function () {
                    if (!heroSelected) {
                        heroSelected = true;
                        hero = this;
                        x = i;
                        y = j;
                    }
                    else
                        el.checked = false;

                    if (el == hero)
                        el.checked = true;
                })
            }
        }
    }
    isGameStart = true;
}