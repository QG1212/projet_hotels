function showForm(formId) {
    document.getElementById('login-form').classList.remove('active');
    document.getElementById('signup-form').classList.remove('active');

    //affiche formulaire sélectionné
    document.getElementById(formId + '-form').classList.add('active');
}
