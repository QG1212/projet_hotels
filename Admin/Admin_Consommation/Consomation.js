function removeConso(id) {
    // Cacher la ligne
    let row = document.getElementById("conso_" + id);
    row.style.display = "none";//disparission de la ligne

    // Créer un input hidden qui permet d'informer le back quel elmt a été supprimer
    let hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden";//le form n'apparaitra pas sur la page
    hiddenInput.name = "deleted_consos[]";//les crochets permet d'indiquer que c'est un tableau
    //si plusieurs delete en meme temps tous les id seront save dedans
    hiddenInput.value = id;

    // L'ajouter au formulaire
    document.getElementById("consoForm").appendChild(hiddenInput);
}