let ajout_roles, ajout_acteurs;

window.onload = init;

function init() {

    ajout_roles = document.getElementById('ajoutbtn-roles');
    ajout_roles.addEventListener('click', ajouterRole, false);


}

function ajouterRole() {

    let base_form = document.getElementById('form_role')
    let input_base = document.getElementById('base_form_role');
    let base_clone = input_base.cloneNode(true);
    let deletebtn = document.getElementById('delete')
    let deletebtn_clone = deletebtn.cloneNode('true')


    deletebtn.innerHTML = '<i class="fas fa-trash-alt"></i>'


    base_form.appendChild(deletebtn_clone)
    base_form.appendChild(base_clone);

    deletebtn_clone.addEventListener('click', function () {
        base_form.removeChild(base_clone);
        base_form.removeChild(deletebtn_clone)
    })
}

/* function deleteRole() {

} */