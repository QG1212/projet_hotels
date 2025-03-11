<?php

use model\bill;










class BillingController{

    static function generate($id)
    {
        require_once("../../database/constants.php");
        $pdo=dbConnect();
        require_once("../../model/bill.php");
        $info=bill::info($pdo,$id);
        $booking = bill::room($pdo,$id);
        $consumptions = bill::consumption($pdo,$id);
        $nom = $info[0]["nom"];
        $prenom = $info[0]["prenom"];
        $email = $info[0]["email"];
        $tel = $info[0]["tel"];
        $client = $info[0]["id_client"];
        require_once("../views/File.php");
    }
    static function listing($client){
        $pdo=dbConnect();
        require_once("../../database/constants.php");
        require_once("../../model/bill.php");
        $info= bill::info($pdo,$client);
        $listing= bill::bills($pdo,$client);
        $nom = $info[0]["nom"];
        $prenom = $info[0]["prenom"];
        require_once("../views/billList.php");
    }
}