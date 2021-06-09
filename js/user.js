// TODO тут будет вся логика страницы с пользователем


let Addbutton = function () {
    let button = document.querySelector("#addButton");
    button.addEventListener("click", showModalWin)

    function showModalWin() {

        let darkLayer = document.createElement('div'); // слой затемнения
        darkLayer.id = 'shadow'
        document.body.appendChild(darkLayer);

        let modalWin = document.getElementById('popupWin');
        modalWin.classList.add("visible");

        darkLayer.onclick = function () {
            darkLayer.parentNode.removeChild(darkLayer);
            modalWin.classList.remove("visible");
            return false;
        };
    }
}
//TODO надо сделать логику кнопки добавления родственника
Addbutton()
