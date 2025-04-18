<?php

if ($hotel==""){
    echo "ERROR: hotel was not found";
}
else{
    echo "Prix des consommation de l'hotel de".$hotel.":";
    echo"<br><form>";
    foreach ($consoList as $conso ){
        echo $conso["denomination"]."<br>";
        echo "<input type='number' value=".$conso["prix"]."></input>"." €";
    }
    echo "<button type='submit'>Valider les modifications</button> </form>";
}