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
$retour="";

if(!empty($_POST["chambre"])){
    if(\model\Reservation::AddReservation($pdo,$_SESSION["user_id"],$_POST["date_debut"],$_POST["date_fin"],$_POST["chambre"])){
        header("Location: ../client/Client_Controleur.php");
        //ajout réussit on envoie sur la page des réservations clients
    }
    else{
        $error="<section id=\"errors\" class=\"container alert alert-danger mt-2\" >
                    Echec de la réservation, veillez remplir le questionnaire à nouveau
                  </section>";

    }
}
$form="<!-- Formulaire 1 : Sélection de l'hôtel et des dates -->
    <div class=\"form-section\">
        <h3>Étape 1 : Choisissez votre hôtel et vos dates</h3>
        <form id=\"hotel-form\" method=\"post\" action='Reservation_E2.php'>
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

require "Reservation_vue.php";

