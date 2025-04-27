<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Hôtel Bleu & Vert</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <link rel="stylesheet" href="../Css/admin_log.css">

</head>

<body>
<!-- Barre latérale -->
<div class="sidebar">
    <h4>Admin Panel</h4>
    <a href="../../index.php"><i class="bi bi-person-badge"></i> Accueil Client</a>
    <a href="../Admin_log/admin_log.php"><i class="bi bi-box-arrow-in-left"></i> Deconnexion </a>
    <a href="../Admin_Perm/Admin_perm.php"><i class="bi bi-house-door"></i> Permissons</a>
    <?php
    echo $lien;
    ?>
</div>

<!-- Contenu principal -->
<div class="main-content flex-column m-1">
    <div class="form-container mb-1 p-4">
        <h1 >Ajouter une consommation à un client</h1>
<?php
if ($id_hotel == null) {
    echo "ERROR: hotel was not found";
}
else{
    echo "<h2>".$nomHotel."</h2>";
    echo "<form method='POST' action='Admin_achat_conso.php'>
    <!-- demande la date à laquelle la conso doit etre ajoutée-->
            <h3>Date:</h3>
            <input required type='date' name='date' ";
    if (isset($_POST["date"])){echo"value='".$_POST["date"]."'" ;}
    echo">";
    if(isset($_POST['date'])){
        echo "<h3>Client:</h3>";
    if($clients== NULL){

        echo "<h4>erreur: pas de client à cette date</h4>";
    }
    else {
        echo"<select required name='client'";
        if (isset($_POST["client"])){
            echo"value='".$_POST["client"]."'" ;
        }
        echo ">";
        foreach ($clients as $client) {
            echo "<option value='".$client['id_client']."'>".$client["prenom"]." ".$client["nom"]."</option>";}
            echo "</select>";
            if (isset($_POST['client'])) {
                echo "<h3>Reservation:</h3>
        <select required name='reservation''>";
        foreach ($reservations as $reservation) {
            echo "<option value='".$reservation["id_sejour"]."'>".date("d m y",strtotime($reservation["date_debut"]))." - ".date("d m y",strtotime($reservation["date_fin"]))."</option>";
        }
                echo "</select>";

                echo "<h3>Consommation:</h3>
        <select  required name='conso'>";
                foreach ($consommations as $consommation) {
                    echo "<option value='".$consommation["id_conso"]."'>".$consommation["denomination"]."</option>";
                }
                echo "</select>";
                echo "<h4>Nombre:</h4>";
                echo "<input required type='number' name='nombre'> ";
            }
    }}
    echo "<br><br><input type='submit'></form>";
    if (isset($_POST['conso']) && isset($_POST['reservation'])&& isset($_POST['nombre']) && isset($_POST['date']) && isset($_POST['client'])) {
        echo "<h4>Données valides, les consommations devraient etre ajoutée au client</h4>";
    }
}
echo $oui;

