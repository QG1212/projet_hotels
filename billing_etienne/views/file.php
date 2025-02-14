<?php


function makefile ($id) {
    billingController::generate($id);
    $file= fopen("bill-$id.txt","w") or die("Unable to open file!");;

    //données de l'utilisateur
     fwrite($file,"
Facture:



        Nom:".$nom.
        "Prenom:".$prenom.
        "Email:".$email.
        "tel".$tel);




//gère l'affichage du contenu de la facture
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

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename("bill-$id.txt"));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize("bill-$id.txt"));
    readfile("bill-$id.txt");


    exit;
};


