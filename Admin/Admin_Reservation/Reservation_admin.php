<?php
session_start();
require_once('../../Serveur/model/Reservation_model.php');

// recuperer l'id de l'hôtel de l'admin connecté
$id_hotel = isset($_SESSION['id_hotel']) ? $_SESSION['id_hotel'] : null;

if (!$id_hotel) {
    echo "Erreur : aucun hôtel associé.";
    exit;
}

// recuperer les réservations de cet hôtel
$reservations = getReservationsByHotel($id_hotel);

require("Reservation_admin.php");
?>