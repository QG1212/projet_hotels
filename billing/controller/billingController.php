<?php

use model\bill;

require_once("../../model/bill.php");

require_once("../../database/constants.php");

require_once("../views/billList.php");



class BillingController{

    static function generate($id)
    {
        $pdo=dbConnect();

        $booking = bill::room($pdo,$id);
        $consumptions = bill::consumption($pdo,$id);
        $nom = bill::info($pdo,$id)[0]["nom"];
        $prenom = bill::info($pdo,$id)[0]["prenom"];
        $email = bill::info($pdo,$id)[0]["email"];
        $tel = bill::info($pdo,$id)[0]["tel"];
        $client = bill::info($pdo,$id)[0]["id_client"];
    }
    static function listing($pdo,$client){
        $listing= bill::bills($pdo,$client);
        $nom = bill::info($pdo,$client)[0]["nom"];
        $prenom = bill::info($pdo,$client)[0]["prenom"];
    }

}