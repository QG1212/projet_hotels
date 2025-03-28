<?php
require_once("../../Serveur/model/Client_model.php");
require_once("../../Serveur/database/constants.php");

$pdo=dbConnect();
session_start();


require_once("Client_vue.php");