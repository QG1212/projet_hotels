<?php


class lien
{
    /**
     * @param $db \mysql_xdevapi\DatabaseObject
     * @param $droit non-empty-array les perms de l'employé
     * @return string tous les liens au quelle les perms de l'employé lui offre accée
     */
    static function getLien($db,$droit){
        $lien="";
        $all_lien=[
                "<a href=\"../Admin_Reservation/Reservation_admin.php\"><i class=\"bi bi-calendar2-week\"></i> Reservation</a>
                <a href=\"../Admin_Consommation/Consommation_admin.php\"><i class=\"bi bi-cup-straw\"></i> Prix Consomation</a>
                <a href=\"../formulaire_chambre/eddit_room.php\"><i class=\"fas fa-bed\"></i> Prix Chambre</a>",

                "<a href=\"../Admin_Reservation/Reservation_admin.php\"><i class=\"bi bi-calendar2-week\"></i> Reservation</a>
                <a href=\"../Admin_Consommation/Consommation_admin.php\"><i class=\"bi bi-cup-straw\"></i> Prix Consomation</a>",

                "<a href=\"../Admin_Reservation/Reservation_admin.php\"><i class=\"bi bi-calendar2-week\"></i> Reservation</a>"
        ];

        return $lien;
    }
}