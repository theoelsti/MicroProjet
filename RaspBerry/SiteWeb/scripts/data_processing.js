
var hum = humraw
var temp = tempraw
var timeScale = timeScaleraw
var humday = humrawday.reverse()
var tempday = temprawday.reverse()
var timeScaleday = timeScalerawday.reverse()

// if the day is the same we only show the date on the first value
if(
        timeScaleraw[0].substring(0, 11) == timeScaleraw[1].substring(0, 11) 
        && timeScaleraw[1].substring(0, 11) == timeScaleraw[2].substring(0, 11)
        &&timeScaleraw[2].substring(0, 11) == timeScaleraw[3].substring(0, 11)
        &&timeScaleraw[3].substring(0, 11) == timeScaleraw[4].substring(0, 11)
        &&timeScaleraw[4].substring(0, 11) == timeScaleraw[5].substring(0, 11)
        &&timeScaleraw[5].substring(0, 11) == timeScaleraw[6].substring(0, 11)
        &&timeScaleraw[6].substring(0, 11) == timeScaleraw[7].substring(0, 11)
        &&timeScaleraw[7].substring(0, 11) == timeScaleraw[8].substring(0, 11)
        &&timeScaleraw[8].substring(0, 11) == timeScaleraw[9].substring(0, 11)
        )
        {
        for(let i=0; i<9; i++){
            timeScale[i] = timeScaleraw[i].substring(11)
        }
    }

/*
    Reverse des tableaux car on recupere les valeurs a l'envers
*/
var hum = hum.reverse();
var temp = temp.reverse();
var timeScale = timeScale.reverse();
// 24h
    var humday = humday.reverse();
    var tempday = tempday.reverse();
    var timeScaleday = timeScaleday.reverse();
// Jour/soir
var today = new Date();
var time = today.getHours();
var mainHello = document.getElementsByClassName("mainHello")[0]
if(time>17 || time < 7){
    mainHello.innerHTML = "Bonsoir,"
    mainHello.style.color = "#8712b6"
    mainHello.style.fontFamily = "robot"
}
else{
    mainHello.innerHTML = "Bonjour,"
    mainHello.style.color = "#FF6C11"
    mainHello.style.fontFamily = "robot"
}
// Dernieres valeurs
var lastField =  document.getElementsByClassName("dataText")[0];
var lastValuesField = document.getElementsByClassName("lastvalues")[0];

lastField.innerHTML = "les dernières valeurs relevées sont :"
lastValuesField.innerHTML = " <a id=\"tempid\" >" + lasttemp + "°C</a>" + "  |  <a id=\"humid\" >"+  lasthum + "% </a>"



