'use strict'


function ajaxRequest(type, url, callback, data = null){
let xhr= new XMLHttpRequest();
    url += '?' + data;
    xhr.open(type, url);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onload = () =>{
    switch(xhr.status) {
        case 200:
            case 201:
                console.log(xhr.responseText);
                callback(xhr.responseText)
        break;
    default:
        console.log("Error:"+xhr.status);
        break;
    }

    xhr.send(this.id);
}

}
 window.addEventListener("load",ajaxRequest)
