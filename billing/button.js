
function makeBill(){
    let b= this;
    ajaxRequest('GET','views/file.php',console.log("file for"+b.id+" should be generated"),b.id)
}



window.addEventListener("load",function (){
    let b= document.getElementsByTagName("button")
    b.addEventListener("click",makeBill)
})