<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Employe_model.php");
require_once("../../Serveur/model/login_model.php");

session_start();
$pdo=dbConnect();
require("admin_perm_vue.php");