'use strict';

function ajaxRequest(type,url,callback,data=null){
    let xhr= new XMLHttpRequest();
    xhr.open(type,url);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload=()=>{
        switch(xhr.status){
            case 200:
            case 201://console.log(xhr.responseText+"oui");JSON.stringify(
                callback(JSON.parse(xhr.responseText));
                break;
            default:HTTPErrors(xhr.status);
        }
    };
    xhr.send("action="+callback);
}
function HTTPErrors(errorcode){
    let message={
        400:'Requète incorrecte',
        401:'Authentifiez vous',
        403:'Accès refusé',
        404:'Page non trouvée',
        500:'Erreur interne du serveur',
        503:'Service indisponible'
    }
    if(errorcode in message){
        $('#errors')
            .html("<i class=\"fa-solid fa-circle-exclamation\"></i>"+message[errorcode])
            .show();
    }
}
function load_sejour(reservation){
    console.log(reservation);
    let template=document.getElementById("template").children[0];
    let AllSejour=document.getElementById("ALL");
    console.log(template.innerHTML);
    reservation.forEach(sejour =>{
        let resa=template.cloneNode(true);
        resa.querySelector(".hotel").innerText="Hotel Blanc & Bleu - "+sejour["hotel"];
        resa.querySelector(".date-debut").innerText=sejour["date_debut"];
        resa.querySelector(".date-fin").innerText=sejour["date_fin"];
        resa.querySelector(".chambre").innerText=sejour["id_chambre"];
        resa.querySelector(".categorie").innerText=sejour["id_chambre"];
        resa.querySelector(".numero_resa").innerText=sejour["id_sejour"]
        let payer=resa.querySelector(".statut-paiement");
        if(sejour["paiement"]==null){
            payer.classList.remove("badge-paid");
            payer.classList.add("badge-unpaid");
            payer.innerText="Impayer";
        }
        else{
            payer.classList.add("badge-paid");
            payer.classList.remove("badge-unpaid");
            payer.innerText="Payer";
        }
        AllSejour.appendChild(resa);
    })
}
function main(){
    //const MyIntervall=setInterval(ajaxRequest,1000,"GET","php/timestamp.php",displayTimestamp);
    ajaxRequest("GET","request.php/sejour",load_sejour);
}

window.addEventListener("DOMContentLoaded",main ,false);