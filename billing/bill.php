<?php

require_once("../database/constants.php");
require_once("../model/bill_model.php");

session_start();
if(empty($_SESSION["user_id"])){
    //si personne n'est connecté, renvoie sur la page de connection
    header("location:../login/login.php");
}
$pdo=dbConnect();
$error="";
if(isset($_POST["id_reservation"])){
    // 1.On récupère les datas de la bdd
    $data_client=Bill::info($pdo,$_POST["id_reservation"]);
    //mieux vaut utiliser le model client et récupérer ses datas avec son id dans la session
    $data_book=Bill::room($pdo,$_POST["id_reservation"]);
    $data_consomations=Bill::consumption($pdo,$_POST["id_reservation"]);

    // 2. Définir le contenu du fichier
    $content = "Sejour hotel Blanc et Bleu.\n";
    $content.="Vous etes la réservation : ".$_POST["id_reservation"]."\n";
    //on génère les différents contenue de la réservations :
    $content.=Bill::GenererClientFacture($data_client);
    $content.=Bill::GenererReservationFacture($data_book);
    $content.=Bill::GenererConsomationFacture($data_consomations);
    $prix_total=$data_book["prix_total"];
    foreach ($data_consomations as $prix){
        $prix_total+=$prix["prix_total"];
        //calcule du prix total somme de la chambre et des consomations
    }
    $content.=Bill::GenererTotalFacture($prix_total);


    // 3. Définir le nom du fichier
    $filename = "Reservation_B&B_".$_POST["id_reservation"].".txt";

    // 4. Envoyer les en-têtes HTTP pour le téléchargement
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . strlen($content));

    // 5. Afficher le contenu (téléchargement immédiat)
    echo $content;
    exit; // Important : arrêter l'exécution après l'envoi du fichier

    //echo $_POST["id_reservation"];
}
else {
    //si l'envoie des datas n'a pas fonctionner message d'erreur
    $error = "<section id=\"errors\" class=\"container alert alert-danger mt-2\" >
                    Echec de la génération de la facture veillez réssayer
                  </section>";
}


require("bill_vue.php");
/*
if (isset($_REQUEST["id"])) {
    BillingController::generate($_REQUEST["id"]);
}
*/