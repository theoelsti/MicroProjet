
var totalValuesField = document.getElementsByClassName("lastvalues")[0];
var dateField = document.getElementsByClassName("firstdate")[0];
let t = 0;
let humdone = false;

var totalFunction = self.setInterval(function () {countForTotal()}, 4);
function countForTotal(){    
    if(t <= totalvalues-1){
        
        if(t+121 > totalvalues-1){
            if(t+10 > totalvalues-1) t += 1;
            else t += 10;
        }
        else t += 121;
    totalValuesField.innerHTML = " <span title='Valeurs totales relevées' id=\"totalvalues\" >" + t + "</span>" ;
   
    }
    else{
        window.clearInterval(totalFunction);
    }
}

let t1 = 0
let t2 = 0
let t3 = 0

let splittedtab = mostoldDate.split("-")
let hourstab = splittedtab[2].split(" ")
let y = splittedtab[0]
let m = splittedtab[1]
let d = splittedtab[2].split(" ")[0]
let h = hourstab[1].split(":")[0]
let min = hourstab[1].split(":")[1]
var dateFunction = self.setInterval(function () {countDate()}, 4);
function countDate(){    
    if(t1 <= y-1){

    if(t1+10 > y-1) t1 ++;
    else t1 += 10;
    if(t2 < m) t2++
    if(t3 < d) t3++
    dateField.innerHTML = " <span title='Date du premier relevé' id=\"firstdate\" >" + t1 +"/"+ t2 + "/" + t3 + "</span>" ;
 
    }
    else{
        window.clearInterval(dateFunction);
    }
}



// 0xFadeath Copyrigthed this