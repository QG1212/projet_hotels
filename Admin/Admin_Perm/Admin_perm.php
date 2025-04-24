<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Employe_model.php");
require_once("../../Serveur/model/login_model.php");

session_start();
$pdo=dbConnect();

if (!isset($_SESSION['perm'])) {
    echo "pas la perm";
    exit;
}

require("admin_perm_vue.php");