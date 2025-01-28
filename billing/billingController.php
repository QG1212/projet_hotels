<?php

namespace billing;
class billingController
{
    static function generate()
    {
        require_once("database.php");
        $booking = bill->room;
        $consumptions = bill->consumption;
        require_once("file.php");
    }
}