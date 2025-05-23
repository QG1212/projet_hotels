<?php
require_once("../../Serveur/database/constants.php");
require_once("../../Serveur/model/Employe_model.php");
require_once("../../Serveur/model/login_model.php");
require_once('../../Serveur/model/lien.php');

session_start();
$pdo=dbConnect();
if (!isset($_SESSION['perm'])) {
    echo "pas la perm";
    exit;
}
$id_employe = $_SESSION['employe_id'];
//var_dump($id_employe);

$nom = Employe::getEmployeName($pdo,$id_employe);
//var_dump($nom);

$tel = Employe::getEmployeTel($pdo,$id_employe);
//var_dump($tel);

$email = Employe::GetEmployeEmail2($pdo, $id_employe);
//var_dump($email);

$array_perm = Employe::GetEmployePermDenomination($pdo,$id_employe);
//var_dump($array_perm);

//lien auquelle l'employé a accés
$lien=lien::getLien($_SESSION['perm']);
require("admin_perm_vue.php");