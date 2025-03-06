'use strict'


function ajaxRequest(){
let xhr= new XMLHttpRequest();
xhr.open("POST","index.php");


//requête la création et le téléchargement du fichier factures quand le bouton y corresspondant est cliqué
xhr.onload = () =>{
    switch(xhr.status) {
        case 200:
            case 201:
                console.log("Request Successful");

        break;
    default:
        console.log("Error:"+xhr.status);
        break;
    }

    xhr.send(this.id);
}

}
 window.addEventListener("load",ajaxRequest)
