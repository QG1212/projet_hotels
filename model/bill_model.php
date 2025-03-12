<?php

class Bill
{
    /**
     * @param $db database
     * @param $booking id de la reservation
     * @return mixed les infos sur une réservation avec son id
     */
    static function room($db, $booking)
    {
        $request =
            "SELECT  c.numero_chambre, r.date_debut, r.date_fin, p.prix prix_nuitee , (r.date_fin - r.date_debut) * p.prix prix_total FROM Reservation r
            INNER JOIN Chambre c on c.id_chambre = r.id_chambre
            INNER JOIN Hotel h on h.id_hotel = c.id_hotel
            INNER JOIN Prix_chambre p on p.id_categorie=c.id_categorie
            INNER JOIN client cl on  cl.id_client = r.id_client
            AND p.id_classe = h.id_classe
            WHERE r.id_sejour=:id_resa;";
        $requested = $db->prepare($request);
        $requested->bindParam(':id_resa', $booking);
        $requested->execute();
        return $requested->fetch();
    }

    /**
     * @param $db database
     * @param $booking id de la réservation
     * @return mixed les consomations en lien d'une réservation
     */

    static function consumption($db, $booking)
    {
        $request = "select id_cc, conso_client.id_conso, conso_client.id_sejour, date_conso, nombre, prix_conso.prix,prix_conso.prix*nombre sous_total 
                    from conso_client 
                    inner join reservation using(id_sejour) 
                    inner join chambre on reservation.id_chambre=chambre.id_chambre
                    inner join prix_conso on prix_conso.id_conso=conso_client.id_conso and chambre.id_hotel=prix_conso.id_hotel
                    where id_sejour=:id_resa
                ;";
        $requested = $db->prepare($request);
        $requested->bindParam(':id_resa', $booking);
        $requested->execute();
        return $requested->fetchALL();
    }

    /**
     * @param $db database
     * @param $booking id du
     * @return mixed
     */

    static function info($db, $id_client)
    {

        $request = "SELECT cl.tel, cl.email, cl.nom , cl.prenom, cl.id_client FROM reservation r
                    INNER JOIN client cl on  cl.id_client = r.id_client
                    WHERE r.id_sejour=:id;";
        $requested = $db->prepare($request);
        $requested->bindParam(':id', $id_client);
        $requested->execute();
        return $requested->fetch();
    }

    /**
     * @param $db DatabaseObject
     * @param $data_client array-key un tableau contenant les infos des clients
     * @return string un text représentant l'entète de la facture avec les infos du client
     */
    static function GenererClientFacture($db, $data_client){
        return "";
    }

    /**
     * @param $db DatabaseObject
     * @param $data_reservation array-key les information ser la réservation (nb nuitée, date, prix, id..)
     * @return string un text représentant le prix de la chambre pour le nombre de nuit réservé
     */
    static function GenererReservationFacture($db, $data_reservation){
        return "";
    }

    /**
     * @param $db DatabaseObject
     * @param $data_consomation array-key les information ser les consomation (nombre, date, prix, id..)
     * @return string un text représentant la partie de la facture sur les consomation
     */
    static function GenererConsomationFacture($db, $data_consomation){
        return "";
    }

    /**
     * @param $db DatabaseObject
     * @param $data_total float prix total des nuitée plus consomation
     * @return string un text représantant le bas de la facture
     */
    static function GenererTotalFacture($db, $data_total)
    {
        return "";
    }



    /*Inutile, doublon avec la première
        static function bills($db,$client)
        {
            $request = "SELECT date_debut , date_fin , id_client, id_sejour FROM reservation r
                        WHERE id_client = :id_client;";
            $requested = $db->prepare($request);
            $requested->bindParam(':id_client', $client);
            $requested->execute();
            return $requested->fetch();
        }
    */
}