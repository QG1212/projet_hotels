<?php

namespace billing\controller;
use billing\model\bill;

class billingController
{
    static function generate($id)
    {
        require_once("model/bill.php");
        $booking = bill::room($id);
        $consumptions = bill::consumption($id);
        $nom = bill::info($id)[0]["nom"];
        $prenom = bill::info($id)[0]["prenom"];
        $email = bill::info($id)[0]["email"];
        $tel = bill::info($id)[0]["tel"];
        $client = bill::info($id)[0]["id_client"];

        require_once("views/file.php");
    }
    static function listing($client){
        require_once("model/bill.php");
        $listing= bill::bills($client);
        require_once("views/billList.php");
    }

}