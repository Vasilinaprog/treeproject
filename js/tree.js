let openProfile = function () {
    let buttons = document.querySelectorAll(".users-tree.users-tree-pointer");
    buttons.forEach(elem => {
        elem.addEventListener("click", openProfile)
    })
    function openProfile()
    {
        let id = this.getAttribute("userid")
        window.open(`http://localhost:8888/treeproject/user.php?id=${id}`, "_self")
    }
}

openProfile();