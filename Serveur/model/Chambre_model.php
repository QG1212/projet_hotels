<?php

class Chambre
{
    /**
     * @param $pdo database de l'hotel
     * @return string le code html à afficher pour avoir toutes les chambres en option pour mettre dans un select
     */
    static function GetSelectChambre($pdo)
    {
        $stmt = $pdo->prepare("Select id_chambre,id_hotel,categorie.denomination from chambre natural join categorie;");
        $stmt->execute();
        $select = "";
        while ($chambre = $stmt->fetch()) {
            if ($chambre["id_hotel"] == 1) {
                $select .= "<option value=\"" . $chambre["id_chambre"] . "\" class='Hotel-" . $chambre["id_hotel"] . "'>" . $chambre["denomination"] . " Chambre  " . $chambre["id_chambre"] . "</option>";
            } else {
                //si ça ne fait pas partie de l'hotel 1 qui est afficher par défault on ajoute la classe disparu dans les chambres pour ne pas les affichers
                $select .= "<option value=\"" . $chambre["id_chambre"] . "\" class='disparu Hotel-" . $chambre["id_hotel"] . "'>" . $chambre["denomination"] . " Chambre  " . $chambre["id_chambre"] . "</option>";
            }

        }
        return $select;
    }

    /**
     * @param $pdo database
     * @return string La liste des catégories de chaque hotel
     */
    static function GetSelectCategorie($pdo)
    {
        $stmt = $pdo->prepare("Select distinct id_categorie,id_hotel,categorie.denomination from chambre natural join categorie;");
        $stmt->execute();
        $select = "";
        while ($chambre = $stmt->fetch()) {
            if ($chambre["id_hotel"] == 1) {
                $select .= "<option value=\"" . $chambre["id_categorie"] . "\" class='Hotel-" . $chambre["id_hotel"] . "'>" . $chambre["denomination"] . "</option>";
            } else {
                //si ça ne fait pas partie de l'hotel 1 qui est afficher par défault on ajoute la classe disparu dans les chambres pour ne pas les affichers
                $select .= "<option value=\"" . $chambre["id_categorie"] . "\" class='disparu Hotel-" . $chambre["id_hotel"] . "'>" . $chambre["denomination"] . "</option>";
            }

        }
        return $select;
    }

    /**
     * @param $pdo database
     * @param $idChambre Chambre dont on cherche le prix
     * @param int $nbJour Nombre de jour par default 1
     * @return mixed Le prix de la chambre
     */
    static function GetPrixChambre($pdo, $idChambre, $nbJour = 1)
    {
        $stmt = $pdo->prepare("Select prix_chambre.prix, chambre.id_chambre from chambre
                            inner join hotel using(id_hotel)
                            inner join categorie using(id_categorie)
                            inner join classe on hotel.id_classe=classe.id_classe
                            inner join prix_chambre on classe.id_classe=prix_chambre.id_classe and categorie.id_categorie=prix_chambre.id_categorie
                            where chambre.id_chambre=:ID;");
        $stmt->bindParam(":ID", $idChambre);
        $stmt->execute();
        return $stmt->fetch()["prix"] * $nbJour;
    }

    /**
     * @param $pdo database
     * @param $idCategorie categorie dont on cherche le prix
     * @param int $nbJour Nombre de jours par default 1
     * @param $idHotel int l'id de l'hotel
     * @return mixed Le prix de la chambre
     * donne le prix d'une categorie ans un hotel pour un sejour d'un certain nombre de jours
     */
    static function GetPrixCategorie($pdo, $idCategorie, $idHotel, $nbJour = 1)
    {
        $stmt = $pdo->prepare("Select prix from prix_chambre
                                inner join hotel on hotel.id_classe=prix_chambre.id_classe
                                where hotel.id_hotel=:hotel
                                and prix_chambre.id_categorie=:categorie;");
        $stmt->bindParam(":hotel", $idHotel);
        $stmt->bindParam(":categorie", $idCategorie);
        $stmt->execute();
        return $stmt->fetch()["prix"] * $nbJour;
    }

    static function GetSelectChambreDisponible($pdo, $idHotel, $date_debut, $date_fin)
    {
        $stmt = $pdo->prepare("Select hotel.nom, id_chambre ,categorie.denomination,prix_chambre.prix
                                from chambre
                                inner join categorie using(id_categorie)
                                inner join hotel using(id_hotel)
                                inner join classe on hotel.id_classe=classe.id_classe
                                inner join prix_chambre on classe.id_classe=prix_chambre.id_classe and categorie.id_categorie=prix_chambre.id_categorie
                                where hotel.id_hotel= :hotel and id_chambre not in (
                                select id_chambre from reservation
                                inner join chambre using(id_chambre)
                                where date_debut<=:date_debut and
                                date_fin>:date_fin);");

        $stmt->bindParam(":hotel", $idHotel);
        $stmt->bindParam(":date_debut", $date_debut);
        $stmt->bindParam(":date_fin", $date_fin);
        $stmt->execute();
        $select = "";
        $debut = new DateTime($date_debut);
        $fin = new DateTime($date_fin);
        while ($chambre = $stmt->fetch()) {
            $select .= "<option value=\"" . $chambre["id_chambre"] . "\">" . $chambre["denomination"] . " -- " . " Chambre  n° " . $chambre["id_chambre"] . " - " . $chambre["prix"] * ($debut->diff($fin))->days . " €</option>";
        }
        return $select;
    }

    static function GetSelectClass($pdo)
    {
        $stmt = $pdo->prepare("Select distinct classe, id_hotel,classe.denomination from chambre natural join classe;");
        $stmt->execute();
        $select = "";
        while ($chambre = $stmt->fetch()) {
            if ($chambre["id_hotel"] == 1) {
                $select .= "<option value=\"" . $chambre["classe"] . "\" class='Hotel-" . $chambre["id_hotel"] . "'>" . $chambre["denomination"] . "</option>";
            } else {
                //si ça ne fait pas partie de l'hotel 1 qui est afficher par défault on ajoute la classe disparu dans les chambres pour ne pas les affichers
                $select .= "<option value=\"" . $chambre["classe"] . "\" class='disparu Hotel-" . $chambre["id_hotel"] . "'>" . $chambre["denomination"] . "</option>";
            }

        }
        return $select;
    }
    /**
     * @param $pdo \mysql_xdevapi\DatabaseObject
     * change la classse d'une chambre
     */
    static function UpdateClass($pdo)
    {
        $select = self::GetSelectClass();
        $chambre = self::GetSelectChambre();
        $stmt = $pdo->prepare("UPDATE chambre SET id_hotel=$select WHERE id_chambre=:$chambre;");
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * @param $pdo \mysql_xdevapi\DatabaseObject
     * change la categorie d'une chambre
     */
    static function UpdateCategorie($pdo)
    {
        $select = self::GetSelectCategorie();
        $chambre = self::GetSelectChambre();
        $stmt = $pdo->prepare("UPDATE chambre SET id_categorie=$select WHERE id_chambre=:$chambre;");
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * @param $pdo \mysql_xdevapi\DatabaseObject
     * @param $id_class int id de la classe (nb d'*) d'ou il faut changer le prix
     * @param $id_categorie int id de la categorie simple,double,double avec sdb
     * @param $nouveau_prix float nouveau prix
     * @return bool réussite de l'update
     */
    static function UpdatePrice($pdo, $id_class, $id_categorie, $nouveau_prix)
    {
        $stmt = $pdo->prepare("UPDATE prix_chambre 
                                SET prix=:nouveau_prix 
                                WHERE id_classe=:id_class 
                                AND id_categorie=:id_categorie;");
        $stmt->bindParam(":id_class", $id_class);
        $stmt->bindParam(":id_categorie", $id_categorie);
        $stmt->bindParam(":nouveau_prix", $nouveau_prix);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * @param $pdo \mysql_xdevapi\DatabaseObject
     * @return bool le prix
     * donne le prix de toutes les chambre par classe et categorie
     */
    static function price($pdo)
    {
        $stmt = $pdo->prepare("SELECT prix FROM prix_chambre
                                ORDER BY id_classe,id_categorie;");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}