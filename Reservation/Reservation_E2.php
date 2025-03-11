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
$chambre="";
$retour="<a href='Reservation_E1.php'><button class=\"btn btn-secondary m-3\"> Retour à l'étape 1</button></a>";

if(!empty($_POST["hotel"]) && !empty($_POST["date_debut"]) && !empty($_POST["date_fin"])) {
    $debut=$_POST["date_debut"];$fin=$_POST["date_fin"];
    $chambre=Chambre::GetSelectChambreDisponible($pdo,$_POST["hotel"],$_POST["date_debut"],$_POST["date_fin"]);
    if($chambre==""){
        $error="<section id=\"errors\" class=\"container alert alert-danger mt-2\" >
                 Aucune chambre de disponible !
                 </section>";
    }
}
else{
    $error="<section id=\"errors\" class=\"container alert alert-danger mt-2\" >
                 Questionnaire remplie non correctement veuillez retournez à l'étape 1
                 </section>";
}

$form="<!-- Formulaire 2 : Sélection des chambres -->
<div id=\"chambre-section\" class=\"form-section\">
    <h3>Étape 2 : Sélectionnez votre chambre</h3>
    <form id=\"chambre-form\" method='post' action='Reservation_E1.php'>
        <div class=\"mb-3\">
            <label for=\"chambre\" class=\"form-label\">Choisissez une chambre :</label>
            <select id=\"chambre\" name='chambre' class=\"form-select\" required>
                <option value=\"\">-- Choisissez une chambre --</option>
                $chambre
            </select>
        </div>
        <input type='hidden' name='date_debut' value='".$_POST["date_debut"]."'>
        <input type='hidden' name='date_fin' value='".$_POST["date_fin"]."'>
        <input type=\"submit\" class=\"btn btn-success\" value='Confirmer la réservation'>
    </form>
</div>";

require "Reservation_vue.php";