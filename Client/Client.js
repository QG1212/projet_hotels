let global_reservation;
function load_sejour(reservation){
    //console.log(reservation);
    let template=document.getElementById("template").children[0];
    let AllSejour=document.getElementById("ALL");
    //console.log(template.innerHTML);
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
        let t=resa.querySelector(".id_reservation");
        t.setAttribute("value",sejour["id_sejour"])
        AllSejour.appendChild(resa);
    })
}
function main(){
    //const MyIntervall=setInterval(ajaxRequest,1000,"GET","php/timestamp.php",displayTimestamp);
    ajaxRequest("GET","../database/request.php/sejour",load_sejour);
}

window.addEventListener("DOMContentLoaded",main ,false);