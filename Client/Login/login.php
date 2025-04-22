<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Client_model.php");
require_once("../../Serveur/model/login_model.php");

session_start();
if(!empty($_POST["deconnection"])){
    session_destroy();
}
$pdo=dbConnect();

    //pour connexion
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); //filtrage pour vérifier que conforme pas de balise ou autre
        $password = $_POST['password'];
        $user=Client_Model::GetClientEmail($email,$pdo);
        session_start(); //démarre session
        if ($user && password_verify($password, $user['fleure'])) { //si utilisateur existe et mdp correct
            $_SESSION['user_id'] = $user['id_client']; //stockage de l'ID utilisateur dans la session
            echo "Connexion réussie vous allez être redirigé vers la page client";
            header('Location: ../affichage_reservation/Client_Controleur.php');
        } else {
            echo "Email ou mot de passe incorrect.";
        }

        //pour inscription
    } elseif (isset($_POST['action']) && $_POST['action'] === 'signup') {
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        connexion::isEmailValid($pdo,$email);
        Client_Model::AddClient($pdo,$email, $nom, $prenom, $password,$confirm_password, $tel);
    }
    require("login_vue.html");
//}


