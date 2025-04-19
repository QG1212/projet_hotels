<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Employe_model.php");
require_once("../../Serveur/model/login_model.php");
//connexion bdd

session_start();
$pdo=dbConnect();

//pour connexion
if(isset($_POST['email'])) {
    $user = Employe::GetEmployeEmail($pdo, $_POST['email']);
    if ($user && password_verify($_POST['password'], $user['fleure'])) { //si utilisateur existe et mdp correct
        $_SESSION['id_loc']=$user['id_localisation'];
        $_SESSION['employe_id'] = $user['id_employe']; //stockage de l'ID utilisateur dans la session
        $_SESSION['perm'] = Employe::GetEmployePerm($pdo, $user['id_employe']);//stock les perms de l'employé dans la scession
        echo "Connexion réussie vous allez être redirigé vers la page admin";
        header('Location: ../Admin_Perm/Admin_perm.php');
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
require("admin_log_vue.php");


