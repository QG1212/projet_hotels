<?php
require_once("../database/constants.php");
require_once("../model/Hotel_model.php");
require_once("../model/Chambre_model.php");
$pdo=dbConnect();
$select_hotel=Hotel::getSelectHotels($pdo);
$select_chambre=Chambre::getSelectChambre($pdo);
$text="0";
if( !empty($_POST["hotel"]) && !empty($_POST["chambre"]) && !empty($_POST["datedebut"]) && !empty($_POST["datefin"]) ){
    $debut=new DateTime($_POST["datedebut"]);
    $fin=new DateTime($_POST["datefin"]);
    if($fin>$debut){
        $text=Chambre::GetPrixChambre($pdo,$_POST["chambre"],($debut->diff($fin))->days);
    }
}
require("Estimation_vue.php");