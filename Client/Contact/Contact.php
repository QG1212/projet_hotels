<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Employe_model.php");
$db=dbConnect();
session_start();

$lien="";
if(isset($_SESSION['user_id'])){
    $lien= "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../affichage_reservation/Client_Controleur.php\">Mes Réservations</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"../Reservation/Reservation_E1.php\">Réserver un nouveau séjour</a></li>";
}
$Secretaires=Employe::GetSecretaires($db);
require("Contact_vue.php");
