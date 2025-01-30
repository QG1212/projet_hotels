<?php

namespace billing;
class billingController
{
    static function generate($id)
    {
        require_once("bill.php");
        $booking = bill::room($id);
        $consumptions = bill::consumption($id);
        $nom = bill::info($id)[0]["nom"];
        $prenom = bill::info($id)[0]["prenom"];
        $email = bill::info($id)[0]["email"];
        $tel = bill::info($id)[0]["tel"];
        require_once("file.php");
    }
}