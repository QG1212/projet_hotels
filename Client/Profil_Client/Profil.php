<?php
require_once ("chemin tah les ouf")
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: ../login/login.php');
}
$client = Client_model::getClient($_SESSION['user_id']);
require("Profil_vue.php");