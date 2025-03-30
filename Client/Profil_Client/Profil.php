<?php
require_once ("../../Serveur/model/Client_model.php");
if(!isset($_SESSION['user_id'])){
    header('Location: ../login/login.php');
}
$client = Client_model::getClient($_SESSION['user_id']);
require("Profil_vue.php");