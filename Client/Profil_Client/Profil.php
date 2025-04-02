<?php
session_start();
require_once("../../Serveur/model/Client_model.php");
require_once("../../Serveur/database/constants.php");
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login/login.php');
}
$pdo=dbConnect();
$client = Client_model::getClient($_SESSION['user_id'],$pdo);
$prenom = $client['prenom'];

require("Profil_vue.php");