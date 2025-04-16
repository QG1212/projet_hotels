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
    static function GetEmployeEmail($db,$email){
        $stmt = $db->prepare("SELECT id_employe, fleure FROM employe WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    static function GetEmployePerm($db,$id_employe){
        $stmt=$db->prepare("select id_perm,id_employe,denomination from employe_perm
                            inner join employe using(id_employe)
                            inner join perm using(id_perm)
                            where id_employe=:id_employe;");
        $stmt->bindParam(':id_employe',$id_employe);
        $stmt->execute();
        $perm=[];
        while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
            $perm[] = $user['id_perm'];
        }
        return $perm;
    }

}