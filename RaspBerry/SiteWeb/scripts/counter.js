let i = 0
var lastValuesField = document.getElementsByClassName("lastvalues")[0];
let t = 0.0;
let h = 0.0;
let humdone = false;
setInterval(function(){
    if(h <= lasthum){
        if(t < lasttemp) t += 0.1;
        if(h < lasthum)  h += 0.1;
        lastValuesField.innerHTML = " <a id=\"tempid\" >" + t.toFixed(1) + "°C</a>" + "  |  <a id=\"humid\" >"+  h.toFixed(1) + "% </a>";
    i++;}
    else{
        return
    }
},5)
// 0xFadeath Copyrigthed this