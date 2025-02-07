<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Client</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
<h1>Salut les petits loups</h1>
<?php

//connexion bdd
$host = 'localhost';
$dbname = 'projet_hotel';
$user = 'dev';
$password = 'isen';
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

//gestion formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //pour connexion
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); //filtrage pour vérifier que conforme pas de balise ou autre
        $password = $_POST['password'];
        $stmt = $pdo->prepare("SELECT id_client, fleure FROM Client WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['fleure'])) { //si utilisateur existe et mdp correct
            session_start(); //démarre session
            $_SESSION['user_id'] = $user['id_client']; //stockage de l'ID utilisateur dans la session
            echo "Connexion réussie !";

            echo '<script>setTimeout(function() {window.location.href = "https://www.booking.com/index.fr.html?aid=2311236;label=fr-fr-booking-desktop-DCpBIW3k2*WIo8XuzMdB9AS652796013276:pl:ta:p1:p2:ac:ap:neg:fi:tikwd-65526620:lp9060737:li:dec:dm;ws=&gad_source=1&gclid=CjwKCAiAneK8BhAVEiwAoy2HYYXoIxUZ7ANuyvsyp45feB-S8wGJa550TdOFEYvbaKDVXFuzzCR5gRoCHNQQAvD_BwE";}, 2000);</script>';
        } else {
            echo "Email ou mot de passe incorrect.";
        }

        //pour inscription
    } elseif (isset($_POST['action']) && $_POST['action'] === 'signup') {
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if ($password !== $confirm_password) {
            die("Les mots de passe ne correspondent pas.");
        }
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM Client WHERE email = :email"); //vérification si email existe déjà
        $stmt->execute(['email' => $email]);
        if ($stmt->fetchColumn()) {
            die("Un utilisateur avec cet email existe déjà.");
        }
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); //hachage du mot de passe
        $stmt = $pdo->prepare("INSERT INTO Client (email, nom, prenom, fleure, tel) VALUES (:email, :nom, :prenom, :fleure, :tel)");
        try {
            $stmt->execute(['email' => $email, 'nom' => $nom, 'prenom' => $prenom, 'fleure' => $hashedPassword, 'tel' => $tel]);
            echo "Inscription réussie !";
        } catch (PDOException $e) {
            die("Erreur lors de l'inscription : " . $e->getMessage());
        }
    }
}
?>

</body>
</html>
