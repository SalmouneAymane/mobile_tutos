document.addEventListener('DOMContentLoaded', () => {
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

    const html = `
                <tr>
                    <td>${name}</td>
                    <td>${color}</td>
                </tr>`;
    table_body.insertAdjacentHTML('beforeend', html);
    section_form.hidden = true;
    show_form.hidden = false;
    section_form.reset();

});

});