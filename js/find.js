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
            let block = document.querySelector("table");
            block.innerHTML = "<tr>\n" +
                "            <th>Имя</th>\n" +
                "            <th>Фамилия</th>\n" +
                "            <th>Отчество</th>\n" +
                "            <th>Цвет волос</th>\n" +
                "            <th>Профессия</th>\n" +
                "            <th>Цвет глаз</th>\n" +
                "            <th>Рост</th>\n" +
                "            <th>День рождения</th>\n" +
                "            " +
                "        </tr>"
            data.forEach(elem => {
                console.log(elem)
                    let tr = document.createElement("tr")
                    let headers = ["name", "surname", "patronymic", "hair_colour", "profession",
                        "eye_colour", "height", "birthday"];
                    headers.forEach(header => {
                        let td = document.createElement("td")
                        if(elem[header] && elem[header] != " ")
                            td.textContent = elem[header]
                        else
                            td.textContent = "Отсутствует"

                        tr.appendChild(td);
                    });
                    block.appendChild(tr)
                }
            );
            let error = document.querySelector(".error");
            if (!data.length){
                let errorText = "Ничего не найдено";
                error.textContent = errorText;
            }else{
                error.textContent = ""
            }

        }
    }
}

input()