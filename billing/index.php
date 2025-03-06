<?php



require_once 'controller/billingController.php';



session_start();
BillingController::listing($_SESSION['id_client']);


$id = $_REQUEST["id"];

if (isset($_REQUEST["id"])) {
    BillingController::generate($id);
}