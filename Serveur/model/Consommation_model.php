<?php

class Consomation
{
    /**
     * @param $booking int id de la réservation
     * @param $db DatabaseObject la base de données
     * @return array les consommations
     * donne toutes les consommations d'une réservation
     */
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

    /**
     * @param $db DatabaseObject la base de données
     * @param $product int id de la consommation
     * @param $hotel int l'id de l'hotel
     * @param $prix mixed le nouveau prix de la consommation
     * change le prix d'une consommation d'un hotel
     */
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
    /**
     * @param $db DatabaseObject la base de données
     * @param $hotel int id de l'hotel ou la conso est ajouté
     * @return array toutes les consos
     * renvoie toutes les consommations d'un hotel
     */
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

    /**
     * @param $db \mysql_xdevapi\DatabaseObject
     * @param $hotel int id de l'hotel ou la conso est ajouté
     * @param $price float nouveau prix de la conso
     * @param $id int id de la conso à ajouter, 0 si la conso est à crée
     * @param $name string nom de la conso si il faut la crée
     * @return void création de la conso
     */
    static function add_consommation($db,$hotel,$price,$id,$name){
        /*
        $query= "SELECT COUNT( id_conso) AS count FROM conso ";
        $queried= $db->query($query);
        $id= $queried->fetchColumn();// fetch column permet de recuperer l'id qui est insert
        //mais ici tu ne fais pas d'insert
        //Etape 1 : on regarde si la conso existe
        $request1 = "INSERT INTO conso(id_conso, denomination) VALUES($id,:name);";
                $requested1 = $db->prepare($request1);
        $requested1->bindParam(':name', $name);
        $requested1->execute();
        */
        if($id==0){
            //si la conso n'existe pas
            $AjoutConso=$db->prepare("INSERT INTO conso(id_conso, denomination) values (default,:name);");
            $AjoutConso->bindParam(':name', $name);
            $AjoutConso->execute();
            //récupération de l'id de la conso que l'on vient de créer
            $idConso=$db->lastInsertId();

        }
        else{
            $idConso=$id;
        }

        $request2 = "INSERT  INTO prix_conso(id_conso, id_hotel, prix) VALUES(:id,:hotel,:price);";
        $requested2 = $db->prepare($request2);
        $requested2->bindParam(':hotel', $hotel);
        $requested2->bindParam(':id', $idConso);
        $requested2->bindParam(':price', $price);
        $requested2->execute();
    }

    /**
     * @param $db DatabaseObject la base de données
     * @param $hotel int l'id de l'hotel où on enlève la consommation
     * @param $id int l'id de la conso qu'on souhaite retirer
     * sert à enlever une consommation précise dans un hotel précis
     */
    static function remove_consommation($db,$hotel,$id)
    {
        $request1 = "DELETE FROM prix_conso WHERE id_conso=:id AND id_hotel=:hotel;";
        $requested1 = $db->prepare($request1);
        $requested1->bindParam(':id', $id);
        $requested1->bindParam(':hotel', $hotel);
        $requested1->execute();
        /* A quoi sert cette suppression ?
        $request2 = "DELETE FROM conso WHERE id_conso=:id;";
        $requested2 = $db->prepare($request2);
        $requested2->bindParam(':id', $id);
        $requested2->bindParam(':hotel', $hotel);
        $requested2->execute();
        */
    }

    /**
     * @param $db \mysql_xdevapi\DatabaseObject
     * @param $hotel int id de l'hotel ou la requete est effectuer
     * @return string tous les selects des consos qui ne possede paas encore de prix dans l'hotel donnée
     */
    static function getSelectConsommation($db,$hotel){
        $stmt = $db->prepare("SELECT C.*
                                FROM Conso C
                                LEFT JOIN Prix_conso P ON C.id_conso = P.id_conso AND P.id_hotel = :hotel
                                WHERE P.prix IS NULL;");
        $stmt->bindParam(':hotel', $hotel);
        $stmt->execute();
        $select="";
        while($conso = $stmt->fetch()) {
            $select.="<option value=\"".$conso["id_conso"]."\">".$conso["denomination"]."</option>";
        }
        return $select;
    }
    /**
     * @param $date date la date de la consommation
     * @param $id_conso int l'id de la consommation
     * @param $id_sejour int l'id du sejour
     * @param $db DatabaseObject la base de données
     * assigne une consommation à un client donné, à une date et une réservation donnée
     */
    static function assign_consommation($db,$date,$id_conso,$id_sejour,$nombre){
            $request="INSERT INTO conso_client(id_conso,id_sejour,date_conso,nombre) VALUES(:id_conso,:id_sejour,:date,:nombre);";
            $requested = $db->prepare($request);
            $requested->bindParam(':id_conso', $id_conso);
            $requested->bindParam(':id_sejour', $id_sejour);
            $requested->bindParam(':date', $date);
            $requested->bindParam(':date', $nombre);
        }


}