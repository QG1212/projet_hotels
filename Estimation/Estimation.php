<?php
require_once("../database/constants.php");
require_once("../model/Hotel_model.php");
require_once("../model/Chambre_model.php");
$pdo=dbConnect();
$select_hotel=Hotel::getSelectHotels($pdo);
$select_chambre=Chambre::GetSelectCategorie($pdo);
$text="0";
$error=false;
if( !empty($_POST["hotel"]) && !empty($_POST["chambre"]) && !empty($_POST["datedebut"]) && !empty($_POST["datefin"]) ){
    $debut=new DateTime($_POST["datedebut"]);
    $fin=new DateTime($_POST["datefin"]);
    if($fin>$debut){
        $prix=Chambre::GetPrixChambre($pdo,$_POST["chambre"],($debut->diff($fin))->days);
    }
    else{
        $error=true;
    }
}
require("Estimation_vue.php");