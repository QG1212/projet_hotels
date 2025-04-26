<?php


class Client_Model{
    /**
     * @param $id_client id du client qu'on recherche
     * @return mixed data du client
     *
     */
    static function getClient($id_client,$pdo){
        $stmt = $pdo->prepare("SELECT prenom, nom, email, tel FROM Client WHERE id_client = :id_client;");
        $stmt->bindParam(":id_client", $id_client);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    /**
     * Modifie les datas d'un client
     *
     * @param $pdo DatabaseObject
     * @param $id_client int id du client dont on modifie ses datas
     * @param $nom string nouveau nom
     * @param $prenom string nouveau prenom
     * @param $tel string nouveau numero de tel
     * @param $mail string nouveau mail
     * @return void
     */
    static function UpdateClient($pdo, $id_client, $nom, $prenom, $tel,$email){
        $stmt=$pdo->prepare("UPDATE Client 
                                SET prenom = :prenom, 
                                    nom = :nom, 
                                    email = :mail, 
                                    tel = :tel 
                                WHERE id_client = :id_client;");
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':mail', $email);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':id_client', $id_client);
        $stmt->execute();
    }

    /**
     * @param $date date la date où on fait la recherche
     * @param $id_hotel int l'id de l'hotel où on fait la recherche
     * @param $pdo DatabaseObject la base de données
     * @return array la liste des clients
     * retourne la liste des clients dans un hotel précis à une date précise
     */
    function getallClient($pdo, $id_hotel, $date) {
        $request= "SELECT * FROM Client c
         INNER JOIN reservation r ON r.id_client = c.id_client
         INNER JOIN chambre ch ON r.id_chambre = ch.id_chambre
         WHERE id_hotel = :hotel AND :date BETWEEN r.date_debut AND r.date_fin;";
        $requested=$pdo->prepare($request);
        $requested->bindParam(':hotel', $id_hotel);
        $requested->bindParam(':date', $date);
        $requested->execute();
        return $requested->fetchAll(PDO::FETCH_ASSOC);
    }
    }
?>