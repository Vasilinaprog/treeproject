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
    button.addEventListener("click", check)

    function check() {
        let id = get_cookie("id_user")
        let id_user = this.getAttribute("userId")
        let type = document.querySelector("#select-type").value
        sql = `SELECT *
               FROM relationship
               WHERE id_user = ${id}
                 AND id_subscribe = ${id_user}`
        data = {
            "query": sql, "all": true,
            "fetch": true
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
                if (data.length != 0) {
                    updateValue(id, id_user, type)
                } else {
                    addToDataBase(id, id_user, type)
                }
            })
    }

    function updateValue(id, id_user, type) {
        if (type !== "delete") {
            sql = `UPDATE relationship
                   SET type = "${type}"
                   WHERE id_user = ${id}
                     AND id_subscribe = ${id_user}`
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
                    location.reload()
                })
        } else {
            sql = `DELETE
                   FROM relationship
                   WHERE id_user = ${id}
                     AND id_subscribe = ${id_user}`
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
                    location.reload()
                })
        }
    }

    function addToDataBase(id, id_user, type) {
        //тут будет логика добавления в базу данных
        if (type !== "delete") {

            sql = `INSERT INTO relationship(id_user, id_subscribe, type)
                   VALUES (${id}, ${id_user}, "${type}")`
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
                    location.reload()
                })
        }
    }

}

buttonAccept()
Addbutton()


