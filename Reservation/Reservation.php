<?php
require_once("../model/Hotel_model.php");
require_once("../database/constants.php");
$pdo=dbConnect();
$hotel=Hotel::getSelectHotels($pdo);
$error="";
if($_POST["hotel"]==""){
    $error="<section id=\"errors\" class=\"container alert alert-danger mt-2\" >
        Il faut choisir un hotel
        </section>";
}
require "Reservation_vue.php";