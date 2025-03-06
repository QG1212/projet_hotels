
<?php
$title="invoice list" ?>
<?php require_once "file.php"?>



<h2>Liste des factures de <?php echo($nom)?> <?php echo($prenom)?></h2>


<table>
    <?php

    if (isset($listing)&&$listing != NULL) {

        print "a";
        foreach($listing as $row){
            echo "<tr>";
                echo "<td>".$listing['date_debut']."-".$listing['date_fin']."</td>";
                echo "<td><button id='".$row['id_sejour']."'></td>";
            echo "</tr>";
        }}
    else {
        echo "error: invoices not found";
    }

    ?>
</table>




