<?php
require_once "../../Serveur/model/Chambre_model.php";
require_once("../../Serveur/database/constants.php");

$db=dbConnect();
session_start();

$array_price = Chambre::price($db);
//var_dump($array_price);

$classes = $_POST['classes'];
$categories = $_POST['categories'];
$prices = $_POST['prices'];




if(isset($classes) && isset($categories) && isset($prices)){
    Chambre::GetSelectClass($classes);
    Chambre::GetSelectCategorie($categories);

    Chambre::UpdateClass($db);
    Chambre::UpdateCategorie($db);
    Chambre::UpdatePrice($db, $classes,  $categories ,$prices);
}

require_once("eddit_room_vue.php");