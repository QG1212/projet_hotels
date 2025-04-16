<?php


class Employe
{
    /**
     * @return array-key Les datas des secretaires
     */
    static function GetSecretaires($db)
    {
        $request = "select metier.denomination as metier,localisation.denomination as localisation,email,tel from employe
                    inner join metier using(id_metier) 
                    inner join localisation using(id_localisation)
                    where metier.denomination='Secretère';";
        $requested = $db->prepare($request);
        $requested->execute();
        return $requested->fetchALL();
    }

}