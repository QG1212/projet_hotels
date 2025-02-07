<?php


function makefile ($id) {
    billingController::generate($id);
    $file= fopen("bill-$id.txt","w") or die("Unable to open file!");;

     fwrite($file,"
<h1>Facture:</h1>

<h2><u>destinéee à</u></h2>
 Nom:".$nom.
        "Prenom:".$prenom.
        "Email:".$email.
        "tel".$tel.
        "<h3>Chambre d'hotel</h3>
    ");





foreach ($booking as $row){
    fwrite($file,"-------------------------------------
|date:".$row["date_debut"]."-".$row["date_fin"]."|
|chambre:".$row["numero_chambre"]."|
|prix nuitée:".$row["prix_nuitee"]."|
|prix total:".$row["prix_total"]."|
");}

fwrite($file,"</table>");

foreach ($consumptions as $row){
    fwrite($file,"<tr>
<td>date:".$row["date_debut"]."-".$row["date_fin"]."</td>
<td>chambre:".$row["numero_chambre"]."</td>
<td>prix nuitée:".$row["prix_nuitee"]."</td>
<td>prix total:".$row["prix_total"]."</td>
</tr>");}
fwrite($file,"</table>");
fclose($file);
    return $file;
};