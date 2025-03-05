<?php
class Client_Model{
    /**
     * @param $email email du client rechercher
     * @param $pdo database connecter
     * @return user Le client qui possede l'email ( toutes ses datas)
     */
    static function GetClientEmail($email,$pdo){
        $stmt = $pdo->prepare("SELECT id_client, fleure FROM Client WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    /**
     * @param $pdo database
     * Les Informations du client
     * @param $email
     * @param $nom
     * @param $prenom
     * @param $password
     * @param $confirm_password
     * @param $tel
     * @return insert dans la bdd le nouveau client et hash le mdp
     */
    static function AddClient($pdo,$email, $nom, $prenom, $password,$confirm_password, $tel)
    {
        if ($password !== $confirm_password) {
            die("Les mots de passe ne correspondent pas.");
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