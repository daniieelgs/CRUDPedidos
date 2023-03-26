document.querySelectorAll(".web-link").forEach(n => n.addEventListener("click", () => window.location.href = n.dataset.link));

const modalElemet = document.getElementById('modalDelete');

let modal = null;

if(modalElemet){
    modal = new bootstrap.Modal(document.getElementById('modalDelete'));

    modalElemet.querySelector(".btn-delete").addEventListener("click", () => modal.hide());
}

document.querySelectorAll(".delete-web").forEach(n => n.addEventListener("click", () => {

    modalElemet.querySelector(".comanda-name").innerText = n.dataset.comandaname;

    modalElemet.querySelector(".form-delete").action = `/comanda/${n.dataset.comandaid}`;

    modal.show();
}));