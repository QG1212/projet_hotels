<?php
require_once("../../Serveur/model/Consommation_model.php");
require_once("../../Serveur/model/Hotel_model.php");
require_once("../../Serveur/database/constants.php");
session_start();
$db=dbConnect();

if (!isset($_SESSION['perm']) || !in_array(4, $_SESSION['perm']) && !in_array(1, $_SESSION['perm'])) { // perm 4 pour gestion consomation
    echo "pas la perm";
    exit;
}

//employe_id ne permet pas de savoir à quelle hotel il appartient à moins de faire une requete sql qui recupère sa localisation avec son id
/*
switch ($_SESSION['employe_id']){
    case 5:
    $hotel= "Caen";
        break;
    case 7:
    $hotel= "Brest";
        break;
    case 8:
    $hotel= "Paris";
        break;
    case 6:
    $hotel= "Nantes";
        break;

    default:
        $hotel="";
            break;
}
*/
//on récupère l'hotel grace à l'id localisation de l'employe
$hotel=Hotel::getEmployeHotel($db,$_SESSION['id_loc']);

$consoList= Consomation::get_all_consommation($db,$hotel);

foreach ($consoList as $conso){
    if (isset($_POST[$conso['id_conso']])){
        Consomation::set_consommation($db,$conso['id_conso'],$_POST[$conso['id_conso']],$hotel);
    }
    if (isset($_POST[$conso['delete'.$conso['id_conso']]])){
        Consomation::remove_consommation($db,$hotel,$conso['id_conso']);
    }
}

if(isset($_POST['nom']) && isset($_POST['prix'])){
    Consomation::add_consommation($db,$hotel,$_POST['nom'],$_POST['prix']);
}


$consoList= Consomation::get_all_consommation($db,$hotel);
require "Consommation_Vue_Admin.php";