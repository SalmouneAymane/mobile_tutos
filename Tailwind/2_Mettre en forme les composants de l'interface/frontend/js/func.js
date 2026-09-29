// i dellete whit name instead of id 
document.addEventListener('DOMContentLoaded', () => {
const API = "http://localhost:8000/backend/categorie.php";
const show_form = document.querySelector("#btn_show_form");
const section_form = document.querySelector("#section_form");
const cancel_form = document.querySelector("#btn_cancel_form");
const submit_form = document.querySelector("#btn_submit_form");
const table_body = document.querySelector("#table_body");


show_form.addEventListener("click", () => {
    section_form.hidden = false;
    show_form.hidden = true; 
});

cancel_form.addEventListener("click", () => {
    section_form.hidden = true;
    show_form.hidden = false; 

    section_form.reset();
});

submit_form.addEventListener("click", (event) => {
    event.preventDefault();
    const name = document.querySelector("#form_name").value;
    const color = document.querySelector("#form_color").value;

   const data = [{
        name: name,
        color: color
    }] ;
    fetch(API, {
        method: "POST",
        headers: {  "content-type": "application/json" },
        body: JSON.stringify(data)
    })
    .then((response) => response.json())
    .then((data) => {
        section_form.hidden = true;
        show_form.hidden = false;
        section_form.reset();
        getCategories();
    });
});

    function getCategories() {
        fetch(API)
            .then((response) => response.json())
            .then((data) => {
                table_body.innerHTML = ''
                data.forEach((categorie) => {
                    const html = `
                        <tr>
                            <td>${categorie.name}</td>
                            <td>${categorie.color}</td>
                            <td><button class="btn-delete">Supprimer</button></td>
                        </tr>`;
                    table_body.insertAdjacentHTML('beforeend', html);
                    table_body.lastElementChild.querySelector('.btn-delete').addEventListener('click', () => {
                        fetch(API, {
                            method: 'DELETE',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ name: categorie.name })
                        }).then(() => getCategories());
                    });
                });
        });
    };
    
    getCategories();
});