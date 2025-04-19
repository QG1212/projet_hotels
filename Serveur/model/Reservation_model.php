<?php

namespace model;

class Reservation
{
    static function AddReservation($pdo,$idClient,$dateDebut,$dateFin,$idChambre){
        $stmt = $pdo->prepare("insert into reservation (id_sejour,id_chambre,date_debut,date_fin,date_arrivee,paiement,id_client) values(default,:chambre,:date_debut,:date_fin,null,null,:client);");
        $stmt->bindParam(":chambre",$idChambre);
        $stmt->bindParam(":date_debut",$dateDebut);
        $stmt->bindParam(":date_fin",$dateFin);
        $stmt->bindParam(":client",$idClient);
        try {
            $stmt->execute();
            //echo "Réservation réussie !";
            return true;
        } catch (PDOException $e) {
            die("Erreur lors de la Réservation: " . $e->getMessage());
            return false;
        }
    }
    static function GetReservations($pdo,$idClient)
    {
        $stmt = $pdo->prepare("select id_sejour,id_chambre,date_debut,date_fin,paiement,hotel.nom hotel from reservation
                                inner join chambre using(id_chambre)
                                inner join hotel using(id_hotel)
                                where id_client=:client 
                                order by date_debut desc;");
        $stmt->bindParam(":client",$idClient);
        try {
            $stmt->execute();
            //echo "Recherche de réservation du client :".$idClient."<br>";
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Erreur lors de la Réservation: " . $e->getMessage());
        }

    }
    static function GetReservation($pdo,$idReservation)
    {
        $stmt = $pdo->prepare("select * from reservation where id_sejour=:client;");
        $stmt->bindParam(":client",$idReservation);
        try {
            $stmt->execute();
            //echo "Recherche de la réservation numero : :".$idReservation."<br>";
            return $stmt->fetch();
        } catch (PDOException $e) {
            die("Erreur lors de la Réservation: " . $e->getMessage());
        }

    }
    static function getReservationsByHotel($pdo,$id_hotel){
        $stmt = $pdo->prepare("SELECT r.*, u.nom, u.email
                                FROM reservation r
                                JOIN client u ON r.id_client = u.id_client
                                JOIN chambre c ON r.id_chambre = c.id_chambre
                                WHERE c.id_hotel =:id_hotel;");
        $stmt->bindParam(":id_hotel",$id_hotel);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}