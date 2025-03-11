<?php



require_once 'controller/billingController.php';



session_start();
BillingController::listing($_SESSION['id_client']);




if (isset($_REQUEST["id"])) {
    BillingController::generate($_REQUEST["id"]);
}