<?php
class Hotel
{
    /**
     * @param $pdo database de l'hotel
     * @return string un code html qui contient tous les hotels sous forme d'option
     * A mettre par la suite dans un select
     */
 static function getSelectHotels($pdo,$id=0): string
 {
     if($id!=0){
         $stmt = $pdo->prepare("select id_hotel, nom, classe.denomination from hotel natural join classe where id_hotel!=:id;");
         $stmt->bindParam(":id",$id);
     }
     else{
         $stmt = $pdo->prepare("select id_hotel, nom, classe.denomination from hotel natural join classe;");
     }

     $stmt->execute();
     $select="";
     while($hotel = $stmt->fetch()) {
         $select.="<option value=\"".$hotel["id_hotel"]."\">Hôtel Bleu & Blanc - ".$hotel["nom"]." ".$hotel["denomination"]."</option>";
     }
     return $select;
 }

    /**
     * @param $pdo \mysql_xdevapi\DatabaseObject la bdd
     * @param $id_localistaion int l'id de la localisation de l'employe
     * @return int l'id de l'hotel associé à l'employe
     * Si l'employé est associée au siege la fonction renvoi l'hotel de Caen
     *
     */
 static function getEmployeHotel($pdo,$id_localisation): int
 {
     if($id_localisation==1){
         return 1;
     }
     else{
         $stmt = $pdo->prepare("select id_hotel from hotel where id_localisation=:loc;");
         $stmt->bindParam(":loc",$id_localisation);
         try {
             $stmt->execute();
             return $stmt->fetch()[0];
         } catch (PDOException $e) {
             die("Erreur lors de la recherche de l'hotel: " . $e->getMessage());
         }
     }
 }

    /**
     * @param $pdo
     * @param $id_localisation int localisation de l'hotel
     * @return string nom de l'hotel
     */
 static function getNomHotel($pdo,$id_hotel): string
 {
     $stmt = $pdo->prepare("select nom from hotel 
                                where id_hotel=:loc;");
     $stmt->bindParam(":loc",$id_hotel);
     $stmt->execute();
     return $stmt->fetch()[0];
 }

}