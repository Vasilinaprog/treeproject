function get_cookie(cookie_name) {
    let results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');

    if (results)
        return (unescape(results[2]));
    else
        return null;
}


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

let buttonAccept = function () {
    let button = document.querySelector("#button-accept-user")
    button.addEventListener("click", addToDataBase)

    function addToDataBase() {
        //тут будет логика добавления в базу данных
        let id = get_cookie("id_user")
        let id_user = this.getAttribute("userId")
        let type = document.querySelector("#select-type").value
        sql = `INSERT INTO relationship(id_user, id_subscribe, type) VALUES (${id}, ${id_user}, "${type}")`
        console.log(sql)
        data = {
            "query": sql, "all": false,
            "fetch": false
        }
        let url = "http://localhost:8888/treeproject/query.php";
        fetch(url, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json()
        })
            .then(function (data) {
                console.log(data)
            })
    }

}

buttonAccept()
Addbutton()


