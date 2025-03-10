<?php
require_once("../model/Client_model.php");
require_once("../database/constants.php");

$pdo=dbConnect();
session_start();


require_once("Client_vue.php");