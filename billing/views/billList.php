<?php
if (isset($_POST['download'])) {
    // 1. Définir le contenu du fichier
    $content = "Bonjour, ceci est un fichier généré en PHP.\n";

    // 2. Définir le nom du fichier
    $filename = "fichier_generé.txt";

    // 3. Envoyer les en-têtes HTTP pour le téléchargement
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . strlen($content));

    // 4. Afficher le contenu (téléchargement immédiat)
    echo $content;
    exit; // Important : arrêter l'exécution après l'envoi du fichier
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Télécharger un fichier</title>
</head>
<body>
<form method="post">
    <button type="submit" name="download">Télécharger le fichier</button>
</form>
</body>
</html>




