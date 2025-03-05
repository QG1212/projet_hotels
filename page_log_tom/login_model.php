<?php
require_once('constants.php');
class connexion
{
function isEmailValid($pdo,$email)
{
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM Client WHERE email = :email"); //vérification si email existe déjà
    $stmt->execute(['email' => $email]);
    if ($stmt->fetchColumn()) {
        die("Un utilisateur avec cet email existe déjà.");
    }
}
}