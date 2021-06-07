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
                "        </tr>"
            data.forEach(elem => {
                    let tr = document.createElement("tr")
                    tr.classList.add("toUser")
                    tr.userId = elem["id_user"]
                    let headers = ["name", "surname", "patronymic", "hair_colour", "profession",
                        "eye_colour"];
                    headers.forEach(header => {
                        let td = document.createElement("td")
                        if (elem[header] && elem[header] != " ")
                            td.textContent = elem[header]
                        else
                            td.classList.add("greyText")
                            td.textContent = "Отсутствует"

                        tr.appendChild(td);
                    });
                    tr.addEventListener("click", openProfilePage)

                    block.appendChild(tr)
                }
            );

            function openProfilePage() {
                let id = this.userId
                window.open(`http://localhost:8888/treeproject/user.php?id=${id}`, "_self")
            }

            let error = document.querySelector(".error");
            if (!data.length) {
                let errorText = "Ничего не найдено";
                error.textContent = errorText;
            } else {
                error.textContent = ""
            }

        }
    }
}

input()