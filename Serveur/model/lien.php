<?php


class lien
{
    /**
     * @param $droits non-empty-array les perms de l'employé
     * @return string tous les liens au quelle les perms de l'employé lui offre accée
     */
    static function getLien($droits){
        $lien="";
        $all_lien=[
                "Le droit 0 n'existe pas",
            
                "<a href=\"../Admin_Reservation/Reservation_admin.php\"><i class=\"bi bi-calendar2-week\"></i> Reservation</a>
                <a href=\"../Admin_Consommation/Consommation_admin.php\"><i class=\"bi bi-cup-straw\"></i> Prix Consomation</a>
                <a href=\"../formulaire_chambre/eddit_room.php\"><i class=\"fas fa-bed\"></i> Prix Chambre</a>
                <a href=\"../Admin_AchatConso/Admin_achat_conso.php\"><i class=\"bi bi-cart4\"></i> Ajout Consommation</a>",

                "<a href=\"../Admin_Reservation/Reservation_admin.php\"><i class=\"bi bi-calendar2-week\"></i> Reservation</a>
                <a href=\"../Admin_Consommation/Consommation_admin.php\"><i class=\"bi bi-cup-straw\"></i> Prix Consommation</a>
                <a href=\"../Admin_AchatConso/Admin_achat_conso.php\"><i class=\"bi bi-cart4\"></i>Ajout Consommation</a>",

                "<a href=\"../Admin_Reservation/Reservation_admin.php\"><i class=\"bi bi-calendar2-week\"></i> Reservation</a>",

                "<a href=\"../Admin_Consommation/Consommation_admin.php\"><i class=\"bi bi-cup-straw\"></i> Prix Consommation</a>
                <a href=\"../Admin_AchatConso/Admin_achat_conso.php\"><i class=\"bi bi-cart4\"></i> Ajout Consommation</a>",

                ""
        ];
        foreach($droits as $droit){
            $lien.=$all_lien[$droit];
        }
        return $lien;
    }
}