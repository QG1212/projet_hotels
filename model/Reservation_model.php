<?php

namespace model;

class Reservation
{
    static function AddReservation($pdo,$idClient,$dateDebut,$dateFin,$idChambre){
        $stmt = $pdo->prepare("insert into reservation (id_sejour,id_chambre,date_debut,date_fin,date_arrivee,paiement,id_client) values(default,:chambre,:date_debut,:date_fin,null,null,:client);");
        $stmt->bindParam(":chambre",$idChambre);
        $stmt->bindParam(":date_debut",$dateDebut);
        $stmt->bindParam(":date_fin",$dateFin);
        $stmt->bindParam(":lient",$idClient);
        try {
            $stmt->execute();
            echo "Réservation réussie !";
            return true;
        } catch (PDOException $e) {
            die("Erreur lors de la Réservation: " . $e->getMessage());
            return false;
        }
    }
}