
var totalValuesField = document.getElementsByClassName("lastvalues")[0];
var dateField = document.getElementsByClassName("firstdate")[0];
var tempWeekField = document.getElementsByClassName("tempweek")[0]
var humWeekField = document.getElementsByClassName("humweek")[0]
var resWeekField = document.getElementsByClassName("resweek")[0]
var tempMonthField = document.getElementsByClassName("tempmonth")[0]
var humMonthField = document.getElementsByClassName("hummonth")[0]
var resMonthField = document.getElementsByClassName("resmonth")[0]
let t = 0;
let humdone = false;

var totalFunction = self.setInterval(function () {countForTotal()}, 4);
function countForTotal(){    
    if(t <= totalValues-1){
        
        if(t+121 > totalValues-1){
            if(t+10 > totalValues-1) t += 1;
            else t += 10;
        }
        else t += 121;
    totalValuesField.innerHTML = " <span title='Valeurs totales relevées' class=\"totalvalues\" >" + t + "</span>" ;
   
    }
    else{
        window.clearInterval(totalFunction);
    }
}
// Compte jusqu'a la premiere date
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


let tw = 0.0
let hw = 0.0
let resw = 0.0
// Compte pour la semaine
    // week
        var TempweekFunction = self.setInterval(function () {countForTempWeek()}, 4);
        function countForTempWeek(){    
            if(tw <= tempMedian){

                tw += 0.1;
                tempWeekField.innerHTML = " <span title='Température moyenne de la semaine' class=\"totalvalues\" >" + tw.toFixed(1) +" °C </span>" ;

            }else{

                window.clearInterval(TempweekFunction);
            }
        }
        var humweekFunction = self.setInterval(function () {countForhumWeek()}, 4);
        function countForhumWeek(){    
            if(hw <= humMedian){

                hw += 0.1;
                humWeekField.innerHTML = " <span title='Humidité moyenne de la semaine' class=\"totalvalues\" >" + hw.toFixed(1) +" % </span>" ;

            }else{

                window.clearInterval(TempweekFunction);
            }
        }
        var resweekFunction = self.setInterval(function () {countForresWeek()}, 4);
        function countForresWeek(){    
            if(resw <= resMedian){

                resw += 0.1;
                resWeekField.innerHTML = " <span title='Humidité moyenne de la semaine' class=\"totalvalues\" >" + resw.toFixed(1) +" °C </span>" ;

            }else{

                window.clearInterval(TempweekFunction);
            }
        }



let tm = 0.0
let hm = 0.0
let resm = 0.0
    //Mois
        // Month
    var TempMonthFunction = self.setInterval(function () {countForTempMonth()}, 4);
    function countForTempMonth(){    
        if(tm <= tempMonthMedian){

            tm += 0.1;
            tempMonthField.innerHTML = " <span title='Température moyenne de la semaine' class=\"totalvalues\" >" + tm.toFixed(1) +" °C </span>" ;

        }else{

            window.clearInterval(TempMonthFunction);
        }
    }
    var humMonthFunction = self.setInterval(function () {countForhumMonth()}, 4);
    function countForhumMonth(){    
        if(hm <= humMonthMedian){
            hm += 0.1;
            humMonthField.innerHTML = " <span title='Humidité moyenne de la semaine' class=\"totalvalues\" >" + hm.toFixed(1) +" % </span>" ;

        }else{

            window.clearInterval(TempMonthFunction);
        }
    }
    var resMonthFunction = self.setInterval(function () {countForresMonth()}, 4);
    function countForresMonth(){    
        if(resm <= resMonthMedian){
            resm += 0.1;
            resMonthField.innerHTML = " <span title='Humidité moyenne de la semaine' class=\"totalvalues\" >" + resm.toFixed(1) +" °C </span>" ;

        }else{

            window.clearInterval(TempMonthFunction);
        }
    }


// 0xFadeath Copyrigthed this