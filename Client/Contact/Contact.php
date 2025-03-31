<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Client_model.php");
$db=dbConnect();
session_start();

$lien="";
if(isset($_SESSION['user_id'])){
    $lien= "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../affichage_reservation/Client_Controleur.php\">Mes Réservations</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"../Reservation/Reservation_E1.php\">Réserver un nouveau séjour</a></li>";
}
$admin = Client_Model::GetCoordsFromId(5,$db);
$caen = Client_Model::GetCoordsFromId(1,$db);
$paris = Client_Model::GetCoordsFromId(4,$db);
$nantes = Client_Model::GetCoordsFromId(2,$db);
$brest = Client_Model::GetCoordsFromId(3,$db);
require("Contact_vue.php");
