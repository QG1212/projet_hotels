<?php

use billing\controller\BillingController;

require_once 'controller/billingController.php';




BillingController::listing($_SESSION['id_user']);


$id = $_REQUEST["id"];

if (isset($_REQUEST["id"])) {
    BillingController::generate($id);
}