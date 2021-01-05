var pad = function(tar) {}
let digits = false
var gaugetemp = Gauge(
document.getElementById("gaugetemp"),
    {
    min: 0,
    max: 60,
    dialStartAngle: 180,
    dialEndAngle: 0,
    value: 1,
    viewBox: "0 0 100 57",
    color: function(value) {
    if(value<10){
        return "#2DE2E6";
    }
    else if(value < 20) {
        return "#CC6C11";
    }else if(value < 30) {
        return "#FF6C11";
    }else if(value < 60) {
        return "#f7aa38";
    }else {
        return "#ef4655";
    }
    }
}
);
var gaugehum = Gauge(
    document.getElementById("gaugehum"),
        {
        min: 0,
        max: 100,
        value:1,
        dialStartAngle: 180,
        dialEndAngle: 0,
        viewBox: "0 0 100 57",
        color: function(value) {
        if(value<90){
            return "#2067d1";
        }
        else {
            return "#ef4655";
        }
        }
    }
    );

function lastValues(){
    if(digits) showGauges()
    else showDigits()
    digits = !digits
}
function showGauges(){
    gaugehum.setValueAnimated(lasthum, 3);
    gaugetemp.setValueAnimated(lasttemp, 3);
    document.getElementsByClassName("jaugebutton")[0].innerHTML = "Valeurs numériques";
    document.getElementsByClassName("gauges")[0].style.display = "flex";
    document.getElementsByClassName("lastvalues")[0].style.display = "none";
  }
function showDigits(){
document.getElementsByClassName("jaugebutton")[0].innerHTML = "Jauges";
document.getElementsByClassName("gauges")[0].style.display = "none";
document.getElementsByClassName("lastvalues")[0].style.display = "block";
}
lastValues()