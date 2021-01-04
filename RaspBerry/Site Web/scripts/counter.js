let value = 45
let i = 0
document.getElementsByClassName('counter')[0].innerHTML = "0"; // el vaudra null !

setInterval(function(){
    if(i != value+1){
        document.getElementsByClassName('counter')[0].innerHTML = i;
    i++;}
    else{
        return
    }
},10)