<?php
require_once("../model/Hotel_model.php");
require_once("../model/Chambre_model.php");
require_once("../database/constants.php");
require_once("../model/Reservation_model.php");
session_start();
if(empty($_SESSION["user_id"])){
    header("Location: ../login/login.php");
}
$pdo=dbConnect();
$hotel=Hotel::getSelectHotels($pdo);
$error="";
$disponible=false;
$chambre="";
$debut=null;$fin=null;

if(!empty($_POST["hotel"]) && !empty($_POST["date_debut"]) && !empty($_POST["date_fin"])) {
    $debut=$_POST["date_debut"];$fin=$_POST["date_fin"];
    $chambre=Chambre::GetSelectChambreDisponible($pdo,$_POST["hotel"],$_POST["date_debut"],$_POST["date_fin"]);
    if($chambre==""){
        $error="<section id=\"errors\" class=\"container alert alert-danger mt-2\" >
                 Aucune chambre de disponible !
                 </section>";
    }
    else{
        $disponible=true;
    }
}
if(!empty($_POST["chambre"]) && $debut!=null && $fin!=null){
    \model\Reservation::AddReservation($pdo,$_POST["chambre"],$debut,$fin,$_SESSION["user_id"]);
    if(true){
        header("Location: ../client/Client_Controleur.php");
        //ajout réussit on envoie sur la page des réservations clients
    }
    else{
        $error="<section id=\"errors\" class=\"container alert alert-danger mt-2\" >
                    Echec de la réservation, veillez recharger la page et réessayer
                  </section>";
        $_POST["chambre"]=null;
        $debut=null;$fin=null;
        $disponible=false;
    }
}
$form_hotel="<!-- Formulaire 1 : Sélection de l'hôtel et des dates -->
    <div class=\"form-section\">
        <h3>Étape 1 : Choisissez votre hôtel et vos dates</h3>
        <form id=\"hotel-form\" method=\"post\">
            <div class=\"mb-3\">
                <label for=\"hotel\" class=\"form-label\">Sélectionner un hôtel :</label>
                <select id=\"hotel\" name=\"hotel\" class=\"form-select\" required>
                    <option value=\"\">-- Choisir un hôtel --</option>
                    $hotel
                </select>
            </div>

            <div class=\"mb-3\">
                <label for=\"date-debut\" class=\"form-label\">Date de début :</label>
                <input type=\"date\" id=\"date-debut\" name=\"date_debut\" class=\"form-control\" required>
            </div>

            <div class=\"mb-3\">
                <label for=\"date-fin\" class=\"form-label\">Date de fin :</label>
                <input type=\"date\" id=\"date-fin\" name=\"date_fin\" class=\"form-control\" required>
            </div>

            <input type=\"submit\" value='Voir les chambres disponibles' class=\"btn btn-primary\">
        </form>
    </div>";

$form_chambre="<!-- Formulaire 2 : Sélection des chambres -->
<div id=\"chambre-section\" class=\"form-section\">
    <h3>Étape 2 : Sélectionnez votre chambre</h3>
    <form id=\"chambre-form\" method='post'>
        <div class=\"mb-3\">
            <label for=\"chambre\" class=\"form-label\">Choisissez une chambre :</label>
            <select id=\"chambre\" name='chambre' class=\"form-select\" required>
                <option value=\"\">-- Choisissez une chambre --</option>
                $chambre
            </select>
        </div>

        <input type=\"submit\" class=\"btn btn-success\" value='Confirmer la réservation'>
    </form>
</div>";
require "Reservation_vue.php";
?>

