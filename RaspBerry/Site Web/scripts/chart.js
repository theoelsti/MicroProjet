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
  var data1 = {
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
  var options = {
      title:{
          display:true,
          text:'Température et Humidité en fonction du temps',
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
  var config = {
      type: 'line',
      data: data,
      options: options}
  var config1 = {
      type: 'line',
      data: data1,
      options: options}
  var configweek = {
      type: 'line',
      data: dataweek,
      options: optionsweek}

      let chartmeteo = new Chart(ctx, config);


  $("#10").on("click", function() {
      chartmeteo.destroy()
      var context1 = document.getElementById('meteoChart').getContext('2d');
      chartmeteo = new Chart(context1, config);});
  $("#day").on("click", function() {
      chartmeteo.destroy()
      var context2 = document.getElementById('meteoChart').getContext('2d');
      chartmeteo = new Chart(context2, config1);});
  $("#week").on("click", function() {
      chartmeteo.destroy()
      var context3 = document.getElementById('meteoChart').getContext('2d');
      chartmeteo = new Chart(context3, configweek);});

  $("#minus").on("click", function() { 
      url = '?param=' + (parseInt(param)+ 1)
      window.location.href = url;
    });
  $("#plus").on("click", function() {   
    if(param -1 <= -1){
      alert("Les valeurs affichées sont les plus récentes !")
    }
    else{
      url = '?param=' + (parseInt(param)-1 )
    window.location.href = url;

    }
  });
  $("#plusday").on("click", function() { 
    url = '?param=' + (parseInt(param) -24)
    if(param -24 <= -1){
      alert("Les valeurs affichées sont les plus récentes !")
    }
    else window.location.href = url;
  });
  $("#minusday").on("click", function() { 
    url = '?param=' + (parseInt(param) + 24)
    window.location.href = url;
  });
  $("#plusmonth").on("click", function() { 
    url = '?param=' + (parseInt(param) -744)
    if(param -744 <= -1){
      alert("Les valeurs affichées sont les plus récentes !")
    }
    else window.location.href = url;
  });
  $("#minusmonth").on("click", function() { 
    url = '?param=' + (parseInt(param) + 744)
    window.location.href = url;
  });
  $("#refresh").on("click", function() { 
    window.location.href = '?param=0';
  });

