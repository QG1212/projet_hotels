<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Employe_model.php");
require_once("../../Serveur/model/login_model.php");

session_start();
$pdo=dbConnect();

$id_employe = $_SESSION['employe_id'];

$nom = Employe::getEmployeName($pdo,$id_employe);

$tel = Employe::getEmployeTel($pdo,$id_employe);

$email = Employe::GetEmployeEmail2($pdo, $id_employe);

$array_perm = Employe::GetEmployePerm($pdo,$id_employe);

require("admin_perm_vue.php");