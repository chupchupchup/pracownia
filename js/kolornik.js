// Obs³uga zdarzeñ pól danych wej¶ciowych.
window.onload=function(){

    var vit = document.getElementById("vita");
    if(vit != null){
        vit.onclick=function(){generateList(this);  };}

     var mif = document.getElementById("mifam");
    if(mif != null){
        mif.onclick=function(){generateList(this);  };}

     var wie = document.getElementById("wiedent");
    if(wie != null){
        wie.onclick=function(){generateList(this);  };}

     var ivo = document.getElementById("ivoclar");
    if(ivo != null){
        ivo.onclick=function(){generateList(this);  };}

     var wievit = document.getElementById("wiedentvita");
    if(wievit != null){
        wievit.onclick=function(){generateList(this);  };}

}

function generateList(obj){
    if (obj == null ) { return; }
    if(obj.checked) {
      
		if(obj.value=="vita"){
        var objt = ["A1","A2","A3","A3,5","A4","B1","B2","B3","B4","C1","C2","C3","C4","D2","D3","D4"]//tablica;
        createOptions(objt);
      }  
      if(obj.value=="mifam"){
        var objt = ["A1","A2","B1","B2","B3","G1","G2","G3","N2","N3","N5","R1","R2","R3","R5","C3"]//tablica;
        createOptions(objt);
      }  
      if(obj.value=="wiedent"){
        var objt = ["G1","G2","G3","A1","A2","B2","B","R1","R3","R5","N2","N3","N5"]//tablica;
        createOptions(objt);
      }  
      if(obj.value=="ivoclar"){
        var objt = ["01(110)","1A(120)","2A(130)","1C(140)","2B(210)","1D(220)","1E(230)","2C(240)","3A(310)","5B(320)","2E(330)","3E(340)","4A(410)","6B(420)","4B(430)","6C(440)","6D(510)","4C(520)","3C(530)"]//tablica;
        createOptions(objt);
      }  
      if(obj.value=="wiedentvita"){
        var objt = ["A1V","A2V","A3V","A3,5V","A4V","B1V","B2V","B3V","B4V","C1V","C2V","C3V","C4V","D2V","D3V","D4V"]//tablica;
        createOptions(objt);
      }  

    }
}

function createOptions(objt) {
    // Zmienna _options jest tablic± ci±gów tekstowych, które przedstawiaj± warto¶ci
    // listy select, jakie s± w ka¿dym elemencie option listy. 
    // sel jest obiektem select.

    //var sel = document.createElement("b");
    //sel.setAttribute("id","tekst");
    //document.getElementById("tekst").innerHTML = "WYBÓR KOLORU:";

    var opt = null;
    var sel = document.createElement("select");
    sel.setAttribute("name","kolor");
                        
    for(var i = 0; i < objt.length; i++) {
        opt = document.createElement("option");
        opt.appendChild(document.createTextNode(objt[i]));
        sel.appendChild(opt);
    }
 
    var newsel = document.getElementById("newsel");
    reset(newsel);
    newsel.innerHTML = '<b style="font-size:12px;">WYBÓR KOLORU:</b><br />';
    newsel.appendChild(sel);
}

// Usuniêcie wszystkich istniej±cych elementów potomnych z obiektu Element.
function reset(elObject){
    if(elObject != null && elObject.hasChildNodes()){
        for(var i = 0; i < elObject.childNodes.length; i++){
            elObject.removeChild(elObject.firstChild);
        }
    }
}
