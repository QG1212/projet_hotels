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
$hotel=Hotel::getEmployeHotel($db,$_SESSION['id_loc']);
//nom de l'hotel pour l'affichage
$nomHotel=Hotel::getNomHotel($db,$hotel);
//totes les consomations d'un hotel
$consoList= Consomation::get_all_consommation($db,$hotel);
//lien auquelle l'employé a accés
$lien=lien::getLien($_SESSION['perm']);
foreach ($consoList as $conso){
    if (isset($_POST[$conso['id_conso']])){
        Consomation::set_consommation($db,$conso['id_conso'],$_POST[$conso['id_conso']],$hotel);
    }
    if (isset($_POST['delete'.$conso['id_conso']])){

    }
}
if (isset($_POST['deleted_consos'])) {//si des consos ont été suppr
    foreach ($_POST['deleted_consos'] as $id_conso_supprimee) {//on traverse la tableau des suppressions
        //ce tableau contient tous les ids des consos suppr
        Consomation::remove_consommation($db,$hotel,$id_conso_supprimee);
    }
}

if(isset($_POST['prix']) and isset($_POST['id_conso'])){
    Consomation::add_consommation($db,$hotel,$_POST['prix'],$_POST['id_conso'],$_POST['nom']);
}
$select=Consomation::getSelectConsommation($db,$hotel);

$consoList= Consomation::get_all_consommation($db,$hotel);
require "Consommation_Vue_Admin.php";