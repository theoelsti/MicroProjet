let i = 0

setInterval(function(){
    if(i != totalvalues+1){
        document.getElementsByClassName('counter')[0].innerHTML = i;
    i++;}
    else{
        return
    }
},10)