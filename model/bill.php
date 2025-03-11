<?php

class bill
{
    /**
     * @param $db database
     * @param $booking id de la reservation
     * @return mixed les information de la réservation
     */
    static function room($db,$booking)
    {
        $request =
            "SELECT  c.numero_chambre, r.date_debut, r.date_fin, p.prix prix_nuitee , (r.date_fin - r.date_debut) * p.prix prix_total FROM Reservation r
            INNER JOIN Chambre c on c.id_chambre = r.id_chambre
            INNER JOIN Hotel h on h.id_hotel = c.id_hotel
            INNER JOIN Prix_chambre p on p.id_categorie=c.id_categorie
            INNER JOIN client cl on  cl.id_client = r.id_client
            AND p.id_classe = h.id_classe
            WHERE r.id_sejour=:nom;";
        $requested = $db->prepare($request);
        $requested->bindParam(':nom', $booking);
        $requested->execute();
        return $requested->fetch();
    }

    /**
     * @param $db database
     * @param $booking id de la réservation
     * @return mixed les consomations en lien d'une réservation
     */

    static function consumption($db,$booking)
    {
        $request = "SELECT * FROM conso_client WHERE id_sejour=:nom";
        $requested = $db->prepare($request);
        $requested->bindParam(':nom', $booking);
        $requested->execute();
        return $requested->fetch();
    }

    /**
     * @param $db database
     * @param $booking id du
     * @return mixed
     */

    static function info($db,$booking)
    {

        $request = "SELECT cl.tel, cl.email, cl.nom , cl.prenom, cl.id_client FROM reservation r
                    INNER JOIN client cl on  cl.id_client = r.id_client
                    WHERE r.id_sejour=:id;";
        $requested = $db->prepare($request);
        $requested->bindParam(':id', $booking);
        $requested->execute();
        return $requested->fetch();
    }

    static function bills($db,$client)
    {
        $request = "SELECT date_debut , date_fin , id_client, id_sejour FROM reservation r
                    WHERE id_client = :id_client;";
        $requested = $db->prepare($request);
        $requested->bindParam(':id_client', $client);
        $requested->execute();
        return $requested->fetch();
    }
}