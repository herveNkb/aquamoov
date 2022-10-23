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

    // For the deleted button of franchises and structures
    let deleteBtn = document.querySelectorAll(".btn-delete");
    for (let button of deleteBtn) {
        button.addEventListener("click", function () {
            document.querySelector(".modal-footer a").href = `/admin/supprimer/${this.dataset.id}`;
            document.querySelector(".modal-body").innerText = `Êtes-vous sûr(e)  de vouloir supprimer "${this.dataset.email}"`;
        });
    }
}