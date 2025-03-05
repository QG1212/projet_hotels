<?php
class Hotel
{
    /**
     * @param $pdo database de l'hotel
     * @return string un code html qui contient tous les hotels sous forme d'option
     * A mettre par la suite dans un select
     */
 static function getSelectHotels($pdo){
     $stmt = $pdo->prepare("select id_hotel, nom, classe.denomination from hotel natural join classe;");
     $stmt->execute();
     $select="";
     while($hotel = $stmt->fetch()) {
         $select.="<option value=\"".$hotel["id_hotel"]."\">Hôtel Bleu & Blanc - ".$hotel["nom"]." ".$hotel["denomination"]."</option>";
     }
     return $select;
 }

}