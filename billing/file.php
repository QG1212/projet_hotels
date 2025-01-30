<?php
require_once("bill.php");


$file= fopen("bill.txt","w");

$fwrite = fwrite($file,"
facture 
<table>");

