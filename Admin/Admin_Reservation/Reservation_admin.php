<?php
session_start();
require_once('../../Serveur/database/constants.php');
require_once('../../Serveur/model/Reservation_model.php');
require_once('../../Serveur/model/Hotel_model.php');

//connection à la db
$db=dbConnect();

// recuperer l'id de l'hôtel de l'admin connecté
//$id_hotel = isset($_SESSION['id_hotel']) ? $_SESSION['id_hotel'] : null;
//Comme l'id de l'hotel n'est pas dans la session et que certain employé ne sont associé à aucun hotel masi au siege
//récupération de l'id Hotel
$id_hotel=Hotel::getEmployeHotel($db,$_SESSION['id_loc']);

if(!isset($_SESSION['id_loc']))
    echo"Probleme";
if (!$id_hotel) {
    echo "Erreur : aucun hôtel associé.";
    exit;
}


if (!isset($_SESSION['perm']) || !in_array(2, $_SESSION['perm'])) { // perm 3 pour gestion reservation
    echo "pas la perm";
    exit;
}

// recuperer les réservations de cet hôtel
$reservations = \model\Reservation::getReservationsByHotel($db,$id_hotel);

require("Reservation_admin_vue.php");
?>