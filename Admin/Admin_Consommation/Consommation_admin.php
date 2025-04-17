<?php
require "../../Serveur/model/Consomation_model.php";

$db=dbConnect();
$consoList= Consomation::get_all_consomation();







require "Consommation_Vue_Admin.php";