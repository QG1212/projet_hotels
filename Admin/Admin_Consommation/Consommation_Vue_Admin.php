<?php

if ($hotel==""){
    echo "ERROR: hotel was not found";
}
else{
    echo "Prix des consommations de l'hotel de".$hotel.":";
    echo"<br><form action='Consommation_Vue_Admin.php' method='get'>";
    foreach ($consoList as $conso ){
        echo $conso["denomination"]."<br>";
        echo "<input type='number' value=".$conso["prix"]."name=".$conso["conso_id"]." ></input>"." €";
    }
    echo "<button type='submit'>Valider les modifications</button> </form>";
}