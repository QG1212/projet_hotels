<?php
require_once "../../Serveur/model/Chambre_model.php";
require_once("../../Serveur/database/constants.php");

$db=dbConnect();
session_start();




if(isset($_POST['classes']) && isset($_POST['categories']) && isset($_POST['price'])){
    Chambre::UpdatePrice($db, $_POST['classes'], $_POST['categories'], $_POST['price']);
}

$array_price = Chambre::price($db);

require_once("eddit_room_vue.php");