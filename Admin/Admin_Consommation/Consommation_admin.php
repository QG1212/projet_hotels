<?php
require_once("../../Serveur/model/Consommation_model.php");
require_once("../../Serveur/model/Hotel_model.php");
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/lien.php");
session_start();
$db=dbConnect();

if (!isset($_SESSION['perm']) || !in_array(4, $_SESSION['perm']) && !in_array(1, $_SESSION['perm'])) { // perm 4 pour gestion consomation
    echo "pas la perm";
    exit;
}

//employe_id ne permet pas de savoir à quelle hotel il appartient à moins de faire une requete sql qui recupère sa localisation avec son id
//on récupère l'hotel grace à l'id localisation de l'employe
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

//totes les consomations d'un hotel
$consoList= Consomation::get_all_consommation($db,$id_hotel);
//lien auquelle l'employé a accés
$lien=lien::getLien($_SESSION['perm']);
foreach ($consoList as $conso){
    if (isset($_POST[$conso['id_conso']])){
        Consomation::set_consommation($db,$conso['id_conso'],$_POST[$conso['id_conso']],$id_hotel);
    }
    if (isset($_POST['delete'.$conso['id_conso']])){

    }
}
if (isset($_POST['deleted_consos'])) {//si des consos ont été suppr
    foreach ($_POST['deleted_consos'] as $id_conso_supprimee) {//on traverse la tableau des suppressions
        //ce tableau contient tous les ids des consos suppr
        Consomation::remove_consommation($db,$id_hotel,$id_conso_supprimee);
    }
}

if(isset($_POST['prix']) and isset($_POST['id_conso'])){
    Consomation::add_consommation($db,$id_hotel,$_POST['prix'],$_POST['id_conso'],$_POST['nom']);
}
$select=Consomation::getSelectConsommation($db,$id_hotel);

$consoList= Consomation::get_all_consommation($db,$id_hotel);
require "Consommation_Vue_Admin.php";