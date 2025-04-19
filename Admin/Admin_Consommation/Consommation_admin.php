<?php
require "../../Serveur/model/Consomation_model.php";

$db=dbConnect();

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
$consoList= Consomation::get_all_consomation($db,$hotel);

foreach ($consoList as $conso){
    if (isset($_GET['conso_id'])){
        Consomation::set_consommation($db,$conso,$_GET['conso_id'],$hotel);
    }
}

require "Consommation_Vue_Admin.php";