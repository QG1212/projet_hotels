<?php
require_once "../../Serveur/model/Chambre_model.php";
require_once("../../Serveur/database/constants.php");
require_once('../../Serveur/model/lien.php');

$db=dbConnect();
session_start();

//lien auquelle l'employé a accés
$lien=lien::getLien($_SESSION['perm']);


if(isset($_POST['classes']) && isset($_POST['categories']) && isset($_POST['price'])){
    Chambre::UpdatePrice($db, $_POST['classes'], $_POST['categories'], $_POST['price']);
}

$array_price = Chambre::price($db);

require_once("eddit_room_vue.php");