<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Employe_model.php");
require_once("../../Serveur/model/login_model.php");

session_start();
$pdo=dbConnect();

if (!isset($_SESSION['perm']) || !in_array(2, $_SESSION['perm'])) { // perm 2 pour gestion hotel
    echo "pas la perm";
    exit;
}

require("admin_perm_vue.php");