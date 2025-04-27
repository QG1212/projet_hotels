<?php

use model\Reservation;
require_once ("../../Serveur/database/constants.php");
require_once ('../../Serveur/model/Hotel_model.php');
require_once('../../Serveur/model/Consommation_model.php');
require_once('../../Serveur/model/Client_model.php');
require_once('../../Serveur/model/Reservation_model.php');
require_once("../../Serveur/model/lien.php");
session_start();
$db=dbConnect();

//id de l'hotel
$id_hotel=Hotel::getEmployeHotel($db,$_SESSION['id_loc']);
if(isset($_POST['Hotel_pdg']) and $_POST['Hotel_pdg']!=0){
    //si le pdg change d'hotel
    $id_hotel = $_POST['Hotel_pdg'];
}
//nom de l'hotel pour l'affichage
$nomHotel=Hotel::getNomHotel($db,$id_hotel);
//formulaire de changement hotel du pdg
$changement_hotel="<div class=\"form-container mb-1 p-4 static\">
                        <form method=\"post\" action=\"Reservation_admin.php\" class=\"d-flex align-items-center gap-3\">
                            <select name=\"Hotel_pdg\" class=\"form-select w-auto\">
                            <option value=\"0\" selected>Vous êtes sur l'hôtel ".$nomHotel."</option>
                            ".Hotel::getSelectHotels($db, $id_hotel)."
                            </select>
                            <button type=\"submit\" name=\"Valider\" class=\"btn btn-success\">Changer Hôtel</button>
                        </form>
                   </div>";

if(isset($_POST['date'])){
    $date= $_POST['date'];
    $clients = Client_Model::getAllClient($db, $id_hotel,$date);
    if(isset($_POST['client'])){
        $client = $_POST['client'];
        $reservations=Reservation::GetReservationsatDate($db,$client,$date);
        $consommations= Consomation::get_all_consommation($db,$id_hotel);
        if(isset($_POST['conso']) && isset($_POST['reservation'])){
            $consommation = $_POST['conso'];
            $reservation = $_POST['reservation'];
            $nombre = $_POST["nombre"];
            Consomation::assign_consommation($db,$date,$consommation,$reservation,$nombre);

        }
    }
}
$lien=lien::getLien($_SESSION['perm']);
require_once('Admin_achat_conso_vue.php');
