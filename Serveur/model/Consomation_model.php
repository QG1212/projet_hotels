<?php

class Consomation
{
    static function get_consomation($db, $booking)
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
        return $requested->fetchALL();}

    static function set_consommation($db, $product,$prix,$hotel)
    {
            $request = "UPDATE prix_conso
                    SET prix=:prix
                    WHERE id_conso=:product AND id_hotel=:hotel";
        $requested = $db->prepare($request);
            $requested->bindParam(':product', $product);
            $requested->bindParam(':prix', $prix);
            $requested->bindParam(':hotel', $hotel);
            $requested->execute();
    }

    static function get_all_consomation($db,$hotel)
    {
        $request = "SELECT  p.prix, c.denomination
                    FROM prix_conso p
                    INNER JOIN conso c on c.id_conso= p.id_conso
                    WHERE p.id_hotel=:hotel
                    ;";
        $requested = $db->prepare($request);
        $requested->bindParam(':hotel', $hotel);
        $requested->execute();
        return $requested->fetchALL();}
}