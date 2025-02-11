'use strict'


let buttons= document.querySelector("button");
let xhr= new XMLHttpRequest();
xhr.open("POST","index.php");




//requête la création et le téléchargement du fichier factures quand le bouton y corresspondant est cliqué
xhr.onload = () =>{
    switch(xhr.status) {
        case 200:
            case 201: buttons.addEventListener("click",function () {
                console.log("Request Successful");
            })
        break
    default:
        console.log("Error:"+xhr.status);
        break
    }

    xhr.send(this.id);
}
