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
                if(this.value !== "")
                makeRequest(this.value, this.getAttribute("parameter"));

            }
        })


        function makeRequest(value, param) {
            let login = get_cookie("login");
            data = {
                "query": `UPDATE users
                          SET ${param} = '${value}'
                          WHERE login = '${login}'`, "all": true, "fetch": false
            }
            console.log(data)
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


let addSelect = function (){
    let selects = document.querySelectorAll("select");
    selects.forEach(select => {

    });
}
addSelect();
inputs()