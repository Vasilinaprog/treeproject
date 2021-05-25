function get_cookie(cookie_name) {
    let results = document.cookie.match('(^|;) ?' + cookie_name + '=([^;]*)(;|$)');

    if (results)
        return (unescape(results[2]));
    else
        return null;
}

let inputs = function () {

    let inputsData = document.querySelectorAll(".change-input");
    inputsData.forEach(elem => {
        elem.addEventListener('keydown', function (e) {
            if (e.keyCode === 13) {
                if (this.value !== "")
                    makeRequest(this.value, this.getAttribute("parameter"));

            }
        })


        function makeRequest(value, param) {
            let id = get_cookie("id_user");
            data = {
                "query": `UPDATE information_users
                          SET ${param} = '${value}'
                          WHERE id_user = '${id}'`, "all": true, "fetch": false
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
                    location.reload()
                })
        }
    })
}
let addSelect = function () {
    let selects = document.querySelectorAll("select");
    selects.forEach(select => {
        select.addEventListener("change", changeSelect)
    });

    function changeSelect() {
        let param = this.getAttribute("parameter")
        makeRequest(this.value, param);

    }

    function makeRequest(value, param) {
        let id = get_cookie("id_user");
        data = {
            "query": `UPDATE information_users
                      SET ${param} = '${value}'
                      WHERE id_user = '${id}'`, "all": true, "fetch": false
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
                location.reload()
            })
    }
}
addSelect();


inputs()