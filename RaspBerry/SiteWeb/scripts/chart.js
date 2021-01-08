Chart.defaults.global.defaultFontFamily ='Lato';
var ctx = document.querySelector('#meteoChart').getContext('2d');  
/*
  o__ __o                   o                  
 <|     v\                 <|>                 
 / \     <\                < >                 
 \o/       \o    o__ __o/   |         o__ __o/ 
  |         |>  /v     |    o__/_    /v     |  
 / \       //  />     / \   |       />     / \ 
 \o/      /    \      \o/   |       \      \o/ 
  |      o      o      |    o        o      |  
 / \  __/>      <\__  / \   <\__     <\__  / \ 
*/
var data = {
    labels: timeScale,
    datasets: [{
        label:'Température',
        backgroundColor: '#D4007810',
        borderColor: '#D40078',
        pointStrokeColor: "#F6019D",
        pointHighlightFill: "#F6019D",
        data: temp
    },
    {
        label:'Humidité',
        color:'#FFFFFF',
        backgroundColor: '#2DE2E610',
        borderColor: '#2DE2E6',
        data: hum
    }]}
var dataday = {
    labels: timeScaleday,
    datasets: [{
        label:'Température',
        backgroundColor: '#D4007810',
        borderColor: '#D40078',
        pointStrokeColor: "#F6019D",
        pointHighlightFill: "#F6019D",
        data: tempday
    },
    {
        label:'Humidité',
        color:'#FFFFFF',
        backgroundColor: '#2DE2E610',
        borderColor: '#2DE2E6',
        data: humday
    }]}
var dataweek = {
    labels: timeScaleweek,
    datasets: [{
        label:'Température moyenne',
        backgroundColor: '#D4007810',
        borderColor: '#D40078',
        pointStrokeColor: "#F6019D",
        pointHighlightFill: "#000000",
        data: tempweek
    },
    {
        label:'Humidité moyenne',
        color:'#FFFFFF',
        backgroundColor: '#2DE2E610',
        borderColor: '#2DE2E6',
        data: humweek
    }]}
if(param + 4464 < ((totalvalues-2) - 4464)){
var datamonth = {
labels: timeScalerawmonth.reverse(),
datasets: [{
    label:'Température moyenne',
    backgroundColor: '#D4007810',
    borderColor: '#D40078',
    pointStrokeColor: "#F6019D",
    pointHighlightFill: "#000000",
    data: tempmonth
},
{
    label:'Humidité moyenne',
    color:'#FFFFFF',
    backgroundColor: '#2DE2E610',
    borderColor: '#2DE2E6',
    data: hummonth
}]}
}
/*
      o__ __o                   o        o                                      
     /v     v\                 <|>     _<|>_                                    
    />       <\                < >                                              
  o/           \o   \o_ __o     |        o      o__ __o    \o__ __o       __o__ 
 <|             |>   |    v\    o__/_   <|>    /v     v\    |     |>     />  \  
  \\           //   / \    <\   |       / \   />       <\  / \   / \     \o     
    \         /     \o/     /   |       \o/   \         /  \o/   \o/      v\    
     o       o       |     o    o        |     o       o    |     |        <\   
     <\__ __/>      / \ __/>    <\__    / \    <\__ __/>   / \   / \  _\o__</   
                    \o/                                                         
                     |                                                          
                    / \                                                         
*/
var options = {
    title:{
        display:true,
        text:'Température et Humidité des 10 derniers relevés',
        fontSize:40,
        fontColor:'#FFFFFF',
        fontFamily:'robot'
    },
    legend:{
        position:'bottom'
    },
    scales:{
        yAxes: [{
        id: 'A',
        type: 'linear',
        position: 'left',
        ticks: {
          max: 100,
          min: 0,
          fontColor:'#F706CF',
          fontSize: 15
        }
      }, {
        id: 'B',
        type: 'linear',
        position: 'right',
        ticks: {
          max: 100,
          min: 0,
          fontColor:'#F706CF',
          fontSize: 15
        }
      }],
      xAxes:[{
        ticks: {
          fontColor:'#FD1D53',
          fontSize: 13
        }
      }]
}}
var optionsdays = {
title:{
    display:true,
    text:'Température et Humidité sur 24 heure',
    fontSize:40,
    fontColor:'#FFFFFF',
    fontFamily:'robot'
},
legend:{
    position:'bottom'
},
scales:{
    yAxes: [{
    id: 'A',
    type: 'linear',
    position: 'left',
    ticks: {
      max: 100,
      min: 0,
      fontColor:'#F706CF',
      fontSize: 15
    }
  }, {
    id: 'B',
    type: 'linear',
    position: 'right',
    ticks: {
      max: 100,
      min: 0,
      fontColor:'#F706CF',
      fontSize: 15
    }
  }],
  xAxes:[{
    ticks: {
      fontColor:'#FD1D53',
      fontSize: 13
    }
  }]
}}
var optionsweek = {
title:{
  display:true,
  text:'Température et Humidité moyenne sur 1 semaine',
  fontSize:40,
  fontColor:'#FFFFFF',
  fontFamily:'robot'
},
legend:{
  position:'bottom'
},
scales:{
  yAxes: [{
  id: 'A',
  type: 'linear',
  position: 'left',
  ticks: {
      max: 100,
      min: 0,
      fontColor:'#F706CF',
      fontSize: 15
  }
  }, {
  id: 'B',
  type: 'linear',
  position: 'right',
  ticks: {
      max: 100,
      min: 0,
      fontColor:'#F706CF',
      fontSize: 15
  }
  }],
  xAxes:[{
  ticks: {
      fontColor:'#FD1D53',
      fontSize: 13
  }
}]
}}   
var optionsmonth = {
title:{
  display:true,
  text:'Température et Humidité moyenne sur 31 jours',
  fontSize:40,
  fontColor:'#FFFFFF',
  fontFamily:'robot'
},
legend:{
  position:'bottom'
},
scales:{
  yAxes: [{
  id: 'A',
  type: 'linear',
  position: 'left',
  ticks: {
      max: 100,
      min: 0,
      fontColor:'#F706CF',
      fontSize: 15
  }
  }, {
  id: 'B',
  type: 'linear',
  position: 'right',
  ticks: {
      max: 100,
      min: 0,
      fontColor:'#F706CF',
      fontSize: 15
  }
  }],
  xAxes:[{
  ticks: {
      fontColor:'#FD1D53',
      fontSize: 13
  }
}]
}}
/*
      o__ __o                              o__ __o      o                          
     /v     v\                            /v     v\   _<|>_                        
    />       <\                          />       <\                               
  o/               o__ __o    \o__ __o   \o             o      o__ __o/      __o__ 
 <|               /v     v\    |     |>   |>_          <|>    /v     |      />  \  
  \\             />       <\  / \   / \   |            / \   />     / \     \o     
    \         /  \         /  \o/   \o/  <o>           \o/   \      \o/      v\    
     o       o    o       o    |     |    |             |     o      |        <\   
     <\__ __/>    <\__ __/>   / \   / \  / \           / \    <\__  < >  _\o__</   
                                                                     |             
                                                             o__     o             
                                                             <\__ __/>             
*/
var config = {
  type: 'line',
  data: data,
  options: options}
var config1 = {
  type: 'line',
  data: dataday,
  options: optionsdays}
var configweek = {
  type: 'line',
  data: dataweek,
  options: optionsweek}
var configmonth = {
type: 'line',
data: datamonth,
options: optionsmonth}

let chartmeteo = new Chart(ctx, config);

switch(show){
case 1:
  chartmeteo.destroy()
  var context2 = document.getElementById('meteoChart').getContext('2d');
  chartmeteo = new Chart(context2, config1);

  new ToasterBox({
    msg: `Tranche Horaire séléctionnée : </Br> ${timeScaleday[0]} ➡️ ${timeScaleday[24]}`,
    html: true,
    time: 10000,
    className: null,
    closeButton: false,
    maxWidth: 350,
    autoOpen: true,
    position: 'bottom-left', //'top-left', 'top-center', 'top-right', 'bottom-left', 'bottom-center', 'bottom-right', 
    backgroundColor: "#288CC0",
    closeIcon: false
  })
  break;
case 2:
  chartmeteo.destroy()
  var context3 = document.getElementById('meteoChart').getContext('2d');
  chartmeteo = new Chart(context3, configweek);
  new ToasterBox({
    msg: `Tranche Horaire séléctionnée : </Br> ${timeScaleweek[0]} ➡️ ${timeScaleweek[6]}`,
    html: true,
    time: 10000,
    className: null,
    closeButton: false,
    maxWidth: 220,
    autoOpen: true,
    position: 'bottom-left', //'top-left', 'top-center', 'top-right', 'bottom-left', 'bottom-center', 'bottom-right', 
    backgroundColor: "#288CC0",
    closeIcon: false
  })
  hideMinutesButtons()
  
  break;
case 3:
  if(param + 4464 < ((totalvalues-2) - 4464)){
  new ToasterBox({
    msg: `${timeScalerawmonth[0]} ➡️ ${timeScalerawmonth[30]}`,
    html: true,
    time: 10000,
    className: null,
    closeButton: false,
    maxWidth: 180,
    autoOpen: true,
    position: 'bottom-left', //'top-left', 'top-center', 'top-right', 'bottom-left', 'bottom-center', 'bottom-right', 
    backgroundColor: "#288CC0",
    closeIcon: false
  })
  }  
  chartmeteo.destroy()
  var context3 = document.getElementById('meteoChart').getContext('2d');
  chartmeteo = new Chart(context3, configmonth);
  hideHoursButtons()
  hideMinutesButtons()

  break
default:
  break
}
/*
         o            o__ __o      o__ __o      o                o                                               
        <|>          /v     v\    /v     v\   _<|>_             <|>                                              
        / \         />       <\  />       <\                    / >                                              
      o/   \o       \o           \o             o        __o__  \o__ __o       o__ __o/    o__ __o/    o__  __o  
     <|__ __|>       |>_          |>_          <|>      />  \    |     v\     /v     |    /v     |    /v      |> 
     /       \       |            |            / \    o/        / \     <\   />     / \  />     / \  />      //  
   o/         \o    <o>          <o>           \o/   <|         \o/     o/   \      \o/  \      \o/  \o    o/    
  /v           v\    |            |             |     \\         |     <|     o      |    o      |    v\  /v __o 
 />             <\  / \          / \           / \     _\o__</  / \    / \    <\__  / \   <\__  < >    <\/> __/> 
                                                                                                 |               
                                                                                         o__     o               
                                                                                         <\__ __/>               
*/
$("#10").on("click", function() {
  chartmeteo.destroy()
  var context1 = document.getElementById('meteoChart').getContext('2d');
  showHoursButtons()
  showMinutesButtons()
  show = 0;
  chartmeteo = new Chart(context1, config);});
$("#day").on("click", function() {
  chartmeteo.destroy()
  showHoursButtons()
  showMinutesButtons()
  var context2 = document.getElementById('meteoChart').getContext('2d');
  hideMinutesButtons()
  show = 1;
  chartmeteo = new Chart(context2, config1);});
$("#week").on("click", function() {
  chartmeteo.destroy()
  hideHoursButtons()
  hideMinutesButtons()
  var context3 = document.getElementById('meteoChart').getContext('2d');
  show = 2;
  chartmeteo = new Chart(context3, configweek);});
$("#month").on("click", function() {
  if((document.getElementById("month").style.cursor != "not-allowed")){
    chartmeteo.destroy()
    hideHoursButtons()
    hideMinutesButtons()
    var context3 = document.getElementById('meteoChart').getContext('2d');
    show = 3;
    chartmeteo = new Chart(context3, configmonth)
  }
  else{
    forbidAction()
  }
})
/* 
 ____o__ __o____    o                                     o__ __o                             o               
  /   \   /   \   _<|>_                                  /v     v\                           <|>              
       \o/                                              />       <\                          / \              
        |           o    \o__ __o__ __o     o__  __o   _\o____            __o__    o__ __o/  \o/    o__  __o  
       < >         <|>    |     |     |>   /v      |>       \_\__o__     />  \    /v     |    |    /v      |> 
        |          / \   / \   / \   / \  />      //              \    o/        />     / \  / \  />      //  
        o          \o/   \o/   \o/   \o/  \o    o/      \         /   <|         \      \o/  \o/  \o    o/    
       <|           |     |     |     |    v\  /v __o    o       o     \\         o      |    |    v\  /v __o 
       / \         / \   / \   / \   / \    <\/> __/>    <\__ __/>      _\o__</   <\__  / \  / \    <\/> __/>                                                                                              
*/



$("#minus").on("click", function() { 
  if(checkminus(6)){
    url = '?param=' + (parseInt(param)+ 6) + '&show=' + parseInt(show) + '#anchor'
    window.location.href = url;
  }
});

$("#plus").on("click", function() {   
if(param -6 <= -1){
  alert("Les valeurs affichées sont les plus récentes !")
}
else{
  url = '?param=' + (parseInt(param) - 6 )+ '&show=' + parseInt(show) + '#anchor'
  window.location.href = url;

}
});


$("#plusday").on("click", function() { 
url = '?param=' + (parseInt(param) -144)+ '&show=' + parseInt(show) + '#anchor'
if(param -144 <= -1){
  alert("Les valeurs affichées sont les plus récentes !")
}
else window.location.href = url;
});
$("#minusday").on("click", function() { 
if(checkminus(144)){
  url = '?param=' + (parseInt(param) + 144)+ '&show=' + parseInt(show) + '#anchor'
  window.location.href = url;
}

});



$("#plusmonth").on("click", function() { 
url = '?param=' + (parseInt(param) - 4464)+ '&show=' + parseInt(show) + '#anchor'
if(param - 4464 <= -1){
  alert("Les valeurs affichées sont les plus récentes !")
}
else window.location.href = url;
});
$("#minusmonth").on("click", function() { 
  if(checkminus(4464)){
  url = '?param=' + (parseInt(param) + 4464)+ '&show=' + parseInt(show) + '#anchor'
  window.location.href = url; 
  }
});


$("#minusminute").on("click", function() { 
  if(checkminus(1)){
  url = '?param=' + (parseInt(param)+ 1) + '&show=' + parseInt(show) + '#anchor'
  window.location.href = url;
  }
});
$("#plusminute").on("click", function() {   
if(param -1 <= -1){
  alert("Les valeurs affichées sont les plus récentes !")
}
else{
  url = '?param=' + (parseInt(param) - 1 )+ '&show=' + parseInt(show) + '#anchor'
  window.location.href = url;
}
});





$("#refresh").on("click", function() { 
document.getElementsByClassName("buttonre")[0].style.cursor = "not-allowed";
document.getElementsByClassName("buttonre")[0].style.backgroundColor = "#FF4365";
window.location.href = '?param=0'+ '&show=' + parseInt(show);
});

/*
  o__ __o__/_                                 o        o                                      
 <|    v                                     <|>     _<|>_                                    
 < >                                         < >                                              
  |         o__ __o    \o__ __o       __o__   |        o      o__ __o    \o__ __o       __o__ 
  o__/_    /v     v\    |     |>     />  \    o__/_   <|>    /v     v\    |     |>     />  \  
  |       />       <\  / \   / \   o/         |       / \   />       <\  / \   / \     \o     
 <o>      \         /  \o/   \o/  <|          |       \o/   \         /  \o/   \o/      v\    
  |        o       o    |     |    \\         o        |     o       o    |     |        <\   
 / \       <\__ __/>   / \   / \    _\o__</   <\__    / \    <\__ __/>   / \   / \  _\o__</   
                                                                                              
*/

function showHoursButtons(){
document.getElementById("plus").style.display = "block";
document.getElementById("minus").style.display = "block";

}
function hideHoursButtons(){
document.getElementById("plus").style.display = "none";
document.getElementById("minus").style.display = "none";
}

function hideMinutesButtons(){
  document.getElementById("plusminute").style.display = "none";
  document.getElementById("minusminute").style.display = "none";
}
function showMinutesButtons(){
  document.getElementById("plusminute").style.display = "block";
  document.getElementById("minusminute").style.display = "block";
}

function checkminus(minusValue){
  if(param + minusValue > ((totalvalues-2) - minusValue)){
    alert("Les valeurs affichées sont les plus anciennes !")
    return 0
  }
  else return 1
}
if(param + 4464 > ((totalvalues-2) - 4464)){
document.getElementById("month").style.cursor = "not-allowed  ";
}
function forbidAction(){
  new ToasterBox({
    msg: `⚠️ Action impossible !`,
    html: true,
    time: 5000,
    className: null,
    closeButton: false,
    maxWidth: 350,
    autoOpen: true,
    position: 'top-right', //'top-left', 'top-center', 'top-right', 'bottom-left', 'bottom-center', 'bottom-right', 
    backgroundColor: null,
    closeIcon: null
  })
}