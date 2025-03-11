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
