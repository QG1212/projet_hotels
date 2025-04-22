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

    static function get_all_consommation($db,$hotel)
    {
        $request = "SELECT  p.prix, c.denomination,c.id_conso
                    FROM prix_conso p
                    INNER JOIN conso c on c.id_conso= p.id_conso
                    WHERE p.id_hotel=:hotel
                    ;";
        $requested = $db->prepare($request);
        $requested->bindParam(':hotel', $hotel);
        $requested->execute();
        return $requested->fetchALL();}

    static function add_consommation($db,$hotel,$price,$name)
    {
        $request1 = "INSERT  INTO prix_conso(id_conso, id_hotel, prix) VALUES(default,:hotel,:price);";

        $requested1 = $db->prepare($request1);
        $requested1->bindParam(':hotel', $hotel);
        $requested1->bindParam(':price', $price);
        $requested1->execute();

        $request2 = "INSERT INTO conso(id_conso, denomination) VALUES(default,:name);";
        $requested2 = $db->prepare($request2);
        $requested2->bindParam(':name', $name);
        $requested2->execute();
    }

    static function remove_consommation($db,$hotel,$id)
    {
        $request1 = "DELETE FROM prix_conso WHERE id_conso=:id AND id_hotel=:hotel;";
        $requested1 = $db->prepare($request1);
        $requested1->bindParam(':id', $id);
        $requested1->bindParam(':hotel', $hotel);
        $requested1->execute();

        $request2 = "DELETE FROM conso WHERE id_conso=:id;";
        $requested2 = $db->prepare($request2);
        $requested2->bindParam(':id', $id);
        $requested2->bindParam(':hotel', $hotel);
        $requested2->execute();
        ;}
}