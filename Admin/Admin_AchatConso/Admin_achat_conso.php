<?php

use model\Reservation;
require_once ("../../Serveur/database/constants.php");
require_once ('../../Serveur/model/Hotel_model.php');
require_once('../../Serveur/model/Consommation_model.php');
require_once('../../Serveur/model/Client_model.php');
require_once('../../Serveur/model/Reservation_model.php');
session_start();
$db=dbConnect();

//id de l'hotel
$hotel=Hotel::getEmployeHotel($db,$_SESSION['id_loc']);

$nomHotel=Hotel::getNomHotel($db,$hotel);

$date= $_POST['date'];
if(isset($date)){
    $clients = Client_Model::getAllClient($db,$hotel,$date);
    if(isset($_POST['client'])){
        $client = $_POST['client'];
        $reservations=Reservation::GetReservationsatDate($db,$client,$date);
        $consommations= Consomation::get_all_consommation($db,$hotel);
        if(isset($_POST['consommation']) && isset($_POST['reservation'])){
            $consommation = $_POST['consommation'];
            $reservation = $_POST['reservation'];
            Consomation::assign_consommation($db,$date,$consommation,$reservation);
        }
    }
}

require_once('Admin_achat_conso_vue.php');
