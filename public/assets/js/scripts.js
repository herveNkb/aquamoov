window.onload = () => {
// For the switch of active status of user and permissions
    let active = document.querySelectorAll("[type=checkbox]");
    for (let switchButton of active) {
        switchButton.addEventListener("click", function () {

            // AJAX
            let req = new XMLHttpRequest;
            // Ajax verification
            req.onreadystatechange = () => {
                if (req.readyState === 4) {
                    if (req.status !== 200) {
                        alert(
                            "Une erreur c'est produite. Code: "
                            + req.status
                            + ", message : "
                            + req.statusText
                        );
                    }
                }
            } ;

            req.open("get", `/admin/activer/${this.dataset.id}`)
            req.send();

        })
    }
}