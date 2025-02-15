<!Doctype html>
<html lang="fr">
<?php require 'billList.php'?>
<head>
    <title> <?php echo $title; ?> </title>

</head>
<body>

    <script src="../ajax.js"></script>

    <div class="container">
    <nav> ...</nav>
    Liste des Factures:
    <div class="container">

        <?php echo $content; ?>
    </div>
    <script src="../ajax.js"></script>
</body>
</html>