<?php
session_start();
require_once('../../Serveur/database/constants.php');
require_once('../../Serveur/model/Reservation_model.php');
require_once('../../Serveur/model/Hotel_model.php');
require_once('../../Serveur/model/lien.php');

//connection à la db
$db=dbConnect();

// recuperer l'id de l'hôtel de l'admin connecté
//$id_hotel = isset($_SESSION['id_hotel']) ? $_SESSION['id_hotel'] : null;
//Comme l'id de l'hotel n'est pas dans la session et que certain employé ne sont associé à aucun hotel mais au siege
//récupération de l'id Hotel
$id_hotel=Hotel::getEmployeHotel($db,$_SESSION['id_loc']);
if(isset($_POST['Hotel_pdg']) and $_POST['Hotel_pdg']!=0){
    //si le pdg change d'hotel
    $id_hotel = $_POST['Hotel_pdg'];
}
$hotel=Hotel::getNomHotel($db,$id_hotel);//on recupère le nom de l'hotel pour l'affichage
//formulaire de changement hotel du pdg
$changement_hotel="<form method=\"post\" action=\"Reservation_admin.php\" class=\"d-flex align-items-center gap-3 mb-4\">
                        <select name=\"Hotel_pdg\" class=\"form-select w-auto\">
                        <option value=\"0\" selected>Vous êtes sur l'hôtel ".$hotel."</option>
                        ".Hotel::getSelectHotels($db, $id_hotel)."
                        </select>
                        <button type=\"submit\" name=\"Valider\" class=\"btn btn-success\">Changer Hôtel</button>
                   </form>";

//lien auquelle l'employé a accés
$lien=lien::getLien($_SESSION['perm']);

if(!isset($_SESSION['id_loc']))
    echo"Probleme";
if (!$id_hotel) {
    echo "Erreur : aucun hôtel associé.";
    exit;
}


if (!isset($_SESSION['perm']) || !in_array(3, $_SESSION['perm']) && !in_array(1, $_SESSION['perm'])) { // perm 3 pour gestion reservation
    echo "pas la perm";
    exit;
}

// recuperer les réservations de cet hôtel
$reservations = \model\Reservation::getReservationsByHotel($db,$id_hotel);

require("Reservation_admin_vue.php");
?>