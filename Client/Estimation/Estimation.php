<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Hotel_model.php");
require_once("../../Serveur/model/Chambre_model.php");
$pdo=dbConnect();
$select_hotel=Hotel::getSelectHotels($pdo);
$select_chambre=Chambre::GetSelectCategorie($pdo);
$text="0";
$error=false;
if( !empty($_POST["hotel"]) && !empty($_POST["chambre"]) && !empty($_POST["datedebut"]) && !empty($_POST["datefin"]) ){
    $debut=new DateTime($_POST["datedebut"]);
    $fin=new DateTime($_POST["datefin"]);
    if($fin>$debut){
        $prix=Chambre::GetPrixCategorie($pdo,$_POST["chambre"],$_POST["hotel"],($debut->diff($fin))->days);
    }
    else{
        $error=true;
    }
}
session_start();
$lien="";
if(isset($_SESSION['user_id'])){
    $lien= "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../affichage_reservation/Client_Controleur.php\">Mes Réservations</a></li>
            <li class=\"nav-item\"><a class=\"nav-link\" href=\"../Reservation/Reservation_E1.php\">Réserver un nouveau séjour</a></li>";
}
require("Estimation_vue.php");