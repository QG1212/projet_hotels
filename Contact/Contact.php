<?php
require_once("../database/constants.php");
require_once("../model/Client_model.php");
$db=dbConnect();
session_start();

$lien="";
if(isset($_SESSION['user_id'])){
    $lien= "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../Client/Client_Controleur.php\">Mes Réservations</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"../Reservation/Reservation_E1.php\">Réserver un nouveau séjour</a></li>";
}
$admin = Client_Model::GetCoordsFromId(9,$db);
$caen = Client_Model::GetCoordsFromId(5,$db);
$paris = Client_Model::GetCoordsFromId(8,$db);
$nantes = Client_Model::GetCoordsFromId(6,$db);
$brest = Client_Model::GetCoordsFromId(7,$db);
require("Contact_vue.php");
