<?php
session_start();
require_once("../../Serveur/model/Client_model.php");
require_once("../../Serveur/database/constants.php");
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/login.php');
}
$pdo=dbConnect();

if(!empty($_POST["prenom"]) and !empty($_POST["nom"]) and !empty($_POST["email"]) and !empty($_POST["tel"])){
    Client_Model::UpdateClient($pdo,$_SESSION["user_id"],$_POST["nom"],$_POST["prenom"],$_POST["tel"],$_POST["email"]);
}
$client = Client_model::getClient($_SESSION['user_id'],$pdo);
$prenom = $client['prenom'];
require("Profil_vue.php");