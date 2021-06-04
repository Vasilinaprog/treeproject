// тут будет поиск по людям

function get_cookie(cookie_name) {
    let results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');

    if (results)
        return (unescape(results[2]));
    else
        return null;
}

let input = function () {
    let name = document.querySelector("input")
    name.addEventListener('keydown', function (e) {
        if (e.keyCode === 13) {
            if (this.value !== "")
                makeRequest(this.value, this.getAttribute("parameter"));

        }
    })

    function makeRequest(value, param) {
        let id = get_cookie("id_user");
        data = {
            "query": `SELECT *
                      FROM users u
                               LEFT JOIN information_users inf ON u.id_user = inf.id_user
                      WHERE inf.name LIKE "%${value}%"`,
            "all": true,
            "fetch": true
        }
        let url = "http://localhost:8888/treeproject/query.php";
        fetch(url, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(data)
        })
            .then(function (response) {
                return response.json()
            })
            .then(function (data) {
                addToPage(data)
            })

        function addToPage(data) {
            let block = document.querySelector(".answer");
            data.forEach(elem => {
                    console.log(elem);
                }
            );

        }
    }
}

input()