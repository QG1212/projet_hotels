<?php
require_once("Client_model.php");
session_start();
echo $_SESSION['user_id'];
require_once("Client_vue.php");