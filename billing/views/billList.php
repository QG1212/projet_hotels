
<?php $title="invoice list" ?>
<?php require_once "file.php"?>

<?php ob_start(); ?>
<h2>Liste des factures</h2>

<table>
    <?php
        foreach($listing as $row){
            echo "<tr>";
                echo "<td>".$listing['date_debut']."-".$listing['date_fin']."</td>";
                echo "<td><a href='' download></a></td>";
            echo "</tr>";
        }
    ?>
</table>

<?php $content = ob_get_clean() ?>

<?php include 'page.php' ?>
