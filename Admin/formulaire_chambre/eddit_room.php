<?php
require_once "../../Serveur/model/Chambre.php";


$id_chambre = Chambre::GetSelectChambre();
$nom_categorie = Chambre::GetSelectCategorie();
$id_classe = Chambre::GetSelectClass();





?>