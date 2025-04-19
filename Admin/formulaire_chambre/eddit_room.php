<?php
require_once "../../Serveur/model/Chambre_model.php";
require_once("../../Serveur/database/constants.php");

$db=dbConnect();
session_start();

$id_chambre = Chambre::GetSelectChambre($db);
$nom_categorie = Chambre::GetSelectCategorie($db);
$id_classe = Chambre::GetSelectClass($db);


require_once("eddit_room_vue.php");