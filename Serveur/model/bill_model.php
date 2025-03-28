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
            "SELECT  c.numero_chambre, r.date_debut, r.date_fin, p.prix prix_nuitee , (r.date_fin - r.date_debut) * p.prix prix_total , h.nom hotel, cat.denomination categorie FROM Reservation r
            INNER JOIN Chambre c on c.id_chambre = r.id_chambre
            INNER JOIN Hotel h on h.id_hotel = c.id_hotel
            INNER JOIN Prix_chambre p on p.id_categorie=c.id_categorie AND h.id_classe=p.id_classe
            INNER JOIN client cl on  cl.id_client = r.id_client 
            INNER JOIN Categorie cat ON cat.id_categorie=c.id_categorie
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
        $request = "select id_cc, conso_client.id_conso, conso_client.id_sejour, date_conso, nombre, prix_conso.prix,prix_conso.prix*nombre sous_total, conso.denomination
                    from conso_client
                    inner join reservation using(id_sejour)
                    inner join chambre on reservation.id_chambre=chambre.id_chambre
                    inner join prix_conso on prix_conso.id_conso=conso_client.id_conso and chambre.id_hotel=prix_conso.id_hotel
                    inner join conso on conso.id_conso = conso_client.id_conso
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
     * @param $data_client array-key un tableau contenant les infos des clients
     * @return string un text représentant l'entète de la facture avec les infos du client
     */
    static function GenererClientFacture($data_client){
        $content="_______________________________________________________________\n";
        $content.="Nom :".$data_client['nom']."\n";
        $content.="Prenom :".$data_client['prenom']."\n";
        $content.="Tel :".$data_client['tel']."\n";
        $content.="Email :".$data_client['email']."\n";
        return $content;
    }

    /**
     * @param $data_reservation array-key les information ser la réservation (nb nuitée, date, prix, id..)
     * @return string un text représentant le prix de la chambre pour le nombre de nuit réservé
     */
    static function GenererReservationFacture($data_reservation){
        $content="_____________________________________________________________\n";
        $content.="Reservation à l'hotel ".$data_reservation["hotel"]."\n\n";
        $content.="Chambre N°".$data_reservation["numero_chambre"]."                                        | Prix   \n";
        $content.="___________________________________________________|________\n";
        $line=$data_reservation["categorie"];
        $line.=str_repeat(" ",51-strlen($line));//on essaie de tout aligner les prix
        //51 =nombre de _ jusque le |
        $line.="|".$data_reservation["prix_nuitee"]."\n";
        $content.=$line;
        $line="  ".$data_reservation["date_debut"]." - ".$data_reservation["date_fin"];//15 caractère
        $line.=str_repeat(" ",51-strlen($line));
        $line.="|".$data_reservation["prix_total"]."\n";
        $content.=$line;
        return $content;
    }

    /**
     * @param $data_consomation array-key les information ser les consomation (nombre, date, prix, id..)
     * @return string un text représentant la partie de la facture sur les consomation
     */
    static function GenererConsomationFacture($data_consomation){
        return "";
    }

    /**
     * @param $db DatabaseObject
     * @param $data_total float prix total des nuitée plus consomation
     * @return string un text représantant le bas de la facture
     */
    static function GenererTotalFacture($data_total)
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