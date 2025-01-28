<?php

namespace billing;

require "Db.php";

class bill
{
    static function room($booking)
    {
        $db = Db::connexionBD();
        $request =
            "SELECT r.nom_client, c.numero_chambre, r.date_debut, r.date_fin, p.prix prix_nuitee , (r.date_fin–r.date_debut) * p.prix prix_total FROM Reservation r
            INNER JOIN Chambre c on c.id_chambre = r.id_chambre
            INNER JOIN Hotel h on h.id_hotel = c.id_hotel
            INNER JOIN Prix_chambre p on p.id_categorie=c.id_categorie
            AND p.id_classe = h.id_classe
            WHERE r.id_sejour=:nom;";
        $requested = $db->prepare($request);
        $requested->bindParam(':nom', $booking);
        $requested->execute();
        return $requested->fetch();
    }

    static function consumption($booking)
    {
        $db = Db::connexionBD();
        $request = "SELECT * FROM conso_client WHERE id_sejour=:nom";
        $requested = $db->prepare($request);
        $requested->bindParam(':nom', $booking);
        $requested->execute();
        return $requested->fetch();
    }
}