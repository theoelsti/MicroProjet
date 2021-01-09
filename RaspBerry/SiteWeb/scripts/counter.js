let i = 0
var lastValuesField = document.getElementsByClassName("lastvalues")[0];
let t = 0.0;
let h = 0.0;
let r = 0.0;
let humdone = false;
setInterval(function(){
    if(h <= lasthum){
        if(r < lastres)r+=0.1
        if(t < lasttemp) t += 0.1;
        if(h < lasthum)  h += 0.1;
        lastValuesField.innerHTML = " <span title='Température brute' id=\"tempid\" >" + t.toFixed(1) + "°C</span>" + "  |  <span title='Humidité' id=\"humid\" >"+  h.toFixed(1) + "% </span> | <span title='Temperature ressentie' id=\"resid\">"+  r.toFixed(1) + "°C</span>" ;
    i++;}
    else{
        return
    }
},6)
// 0xFadeath Copyrigthed this