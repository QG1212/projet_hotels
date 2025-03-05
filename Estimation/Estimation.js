'use strict'
function main(){
    // Sélection du <select>
    const selectElement = document.getElementById('hotel');
    //récupère toutes les chambres en fonctions de leurs hotels
    let chambres_Hotel1=document.getElementsByClassName('Hotel-1');
    let chambres_Hotel2=document.getElementsByClassName('Hotel-2');
    let chambres_Hotel3=document.getElementsByClassName('Hotel-3');
    let chambres_Hotel4=document.getElementsByClassName('Hotel-4');
    //tableau qui contient tous les tableaux de chambres
    let allChambres=[chambres_Hotel1,chambres_Hotel2,chambres_Hotel3,chambres_Hotel4];
// Écoute de l'événement 'change'
    selectElement.addEventListener('change', function() {
        //on fait disparaitre toutes les chambres
        for(let C1 of chambres_Hotel1){//pour chaque chambre de la categorie on ajoute le class disparue
            C1.classList.add("disparu")
        }for(let C1 of chambres_Hotel2){
            C1.classList.add("disparu")
        }for(let C1 of chambres_Hotel3){
            C1.classList.add("disparu")
        }for(let C1 of chambres_Hotel4){
            C1.classList.add("disparu")
        }
        //on enlève le display none des chambres de l'hotel que l'on vient de selectionner
        for(let C1 of allChambres[this.value-1]){
            C1.classList.remove("disparu")
        }

    });
    /* Tentative de mettre un message d'erreur quand la date de fin n'est pas possible vis à vis de la date du debut
    let debut=document.getElementById("date-debut");
    let fin = document.getElementById("date-fin");

    document.getElementById("ValiderEstimation").addEventListener("click",()=>{
        console.log(fin.value);
        let date1=Date(debut.value);
        let date2=Date(fin.value);
        if(debut>=fin){
            document.getElementById("errors").innerText="Il faut un date de fin APRES celle du début";
        }
    })
     */
}
window.addEventListener("DOMContentLoaded",main);//quant le document est chargée