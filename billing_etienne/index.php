<?php

require_once 'controller/billingController.php';




\billing\controller\billingController::generate($_SESSION['id_user']);


$id = $_REQUEST["id"];

if (isset($_REQUEST["id"])) {
    \billing\controller\billingController::generate($id);
}