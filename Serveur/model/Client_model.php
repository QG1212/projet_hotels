<?php


class Client_Model{

    static function GetClient($id_client){
        $pdo = dbConnect();
        $stmt = $pdo->prepare("SELECT prenom, nom, email, tel FROM Client WHERE id_client = id_client");
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
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

    /** permet d'obtenir les coordonnées d'un client
     * @param $id id du client
     * @param $pdo base de données où on se connecte
     * @return user Le client correspondant
     */
    static function GetCoordsFromId($id_client,$pdo){
        $stmt = $pdo->prepare("SELECT id_client, email, tel FROM Client WHERE id_client = :id_client");
        $stmt->bindValue(':id_client', $id_client);
        $stmt->execute();
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