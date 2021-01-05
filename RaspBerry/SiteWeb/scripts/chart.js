  Chart.defaults.global.defaultFontFamily ='Lato';
  var ctx = document.querySelector('#meteoChart').getContext('2d');  
  
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
      labels: timeScaleweek.reverse(),
      datasets: [{
          label:'Température moyenne',
          backgroundColor: '#D4007810',
          borderColor: '#D40078',
          pointStrokeColor: "#F6019D",
          pointHighlightFill: "#000000",
          data: tempweek.reverse()
      },
      {
          label:'Humidité moyenne',
          color:'#FFFFFF',
          backgroundColor: '#2DE2E610',
          borderColor: '#2DE2E6',
          data: humweek.reverse()
      }]}
var datamonth = {
  labels: timeScalemonth.reverse(),
  datasets: [{
      label:'Température moyenne',
      backgroundColor: '#D4007810',
      borderColor: '#D40078',
      pointStrokeColor: "#F6019D",
      pointHighlightFill: "#000000",
      data: tempmonth.reverse()
  },
  {
      label:'Humidité moyenne',
      color:'#FFFFFF',
      backgroundColor: '#2DE2E610',
      borderColor: '#2DE2E6',
      data: hummonth.reverse()
}]}
var options = {
      title:{
          display:true,
          text:'Température et Humidité des 10 derniers relevés',
          fontSize:25,
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
      fontSize:25,
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
    fontSize:25,
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
    text:'Température et Humidité moyenne sur 1 mois (1 jour/2)',
    fontSize:25,
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
    break;
  case 2:
    chartmeteo.destroy()
    var context3 = document.getElementById('meteoChart').getContext('2d');
    chartmeteo = new Chart(context3, configweek);
    break;
  case 3:
    chartmeteo.destroy()
    var context3 = document.getElementById('meteoChart').getContext('2d');
    chartmeteo = new Chart(context3, configmonth);
    hideHoursButtons()

    break
  default:
    break
}
$("#10").on("click", function() {
    chartmeteo.destroy()
    var context1 = document.getElementById('meteoChart').getContext('2d');
    showHoursButtons()

    show = 0;
    chartmeteo = new Chart(context1, config);});
$("#day").on("click", function() {
    chartmeteo.destroy()
    showHoursButtons()
    var context2 = document.getElementById('meteoChart').getContext('2d');
    show = 1;
    chartmeteo = new Chart(context2, config1);});
$("#week").on("click", function() {
    chartmeteo.destroy()
    hideHoursButtons()
    var context3 = document.getElementById('meteoChart').getContext('2d');
    show = 2;
    chartmeteo = new Chart(context3, configweek);});
$("#month").on("click", function() {
  chartmeteo.destroy()
  hideHoursButtons()
  var context3 = document.getElementById('meteoChart').getContext('2d');
  show = 3;
  chartmeteo = new Chart(context3, configmonth);});
$("#minus").on("click", function() { 
    url = '?param=' + (parseInt(param)+ 1) + '&show=' + parseInt(show)
    window.location.href = url;
});
$("#plus").on("click", function() {   
  if(param -1 <= -1){
    alert("Les valeurs affichées sont les plus récentes !")
  }
  else{
    console.log(parseInt(show))
    url = '?param=' + (parseInt(param)-1 )+ '&show=' + parseInt(show)
  window.location.href = url;

  }
});
$("#plusday").on("click", function() { 
  url = '?param=' + (parseInt(param) -24)+ '&show=' + parseInt(show)
  if(param -24 <= -1){
    alert("Les valeurs affichées sont les plus récentes !")
  }
  else window.location.href = url;
});
$("#minusday").on("click", function() { 
  url = '?param=' + (parseInt(param) + 24)+ '&show=' + parseInt(show)
  window.location.href = url;
});
$("#plusmonth").on("click", function() { 
  url = '?param=' + (parseInt(param) -744)+ '&show=' + parseInt(show)
  if(param -744 <= -1){
    alert("Les valeurs affichées sont les plus récentes !")
  }
  else window.location.href = url;
});
$("#minusmonth").on("click", function() { 
  url = '?param=' + (parseInt(param) + 744)+ '&show=' + parseInt(show)
  window.location.href = url;
});
$("#refresh").on("click", function() { 
  document.getElementsByClassName("buttonre")[0].style.cursor = "not-allowed";
  document.getElementsByClassName("buttonre")[0].style.backgroundColor = "#FF4365";
  window.location.href = '?param=0'+ '&show=' + parseInt(show);

});

function showHoursButtons(){
  document.getElementById("plus").style.display = "block";
  document.getElementById("minus").style.display = "block";
}
function hideHoursButtons(){
  document.getElementById("plus").style.display = "none";
  document.getElementById("minus").style.display = "none";
}