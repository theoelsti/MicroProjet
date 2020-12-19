<!DOCTYPE html>
<html>
<head>

<title>Station meteo</title>

<meta charset="utf-8">
<link rel="icon" src="./images/pepe.jpeg">
<link href="./styles/style.css" rel="stylesheet"/>
<script src="./scripts/script.js">      </script>
<script src="./scripts/chartjs.js">     </script>
<script src="./scripts/jquery-3.5.1.js"></script>
</head>

<div class="top">
<div class="sun"></div>


<body style="background-color: #261447;">
    <div class="title">
        Station Méteo
    </div>
    
<body onLoad="initClock()">

    <div id="timedate">
        <a id="d">1</a>
        <a id="mon">Janvier</a>
        <a id="y">0</a></br>
        <a id="h" style="font-size:30px">12</a><a style="font-size: 30px;">  :</a>
        <a id="m" style="font-size:30px">00</a><a style="font-size: 30px;">  :</a>
        <a id="s" style="font-size:30px">00</a>
    </div>
<hr>
</div>

<div class="mainHello"></div>
<div class="dataText"></div>
<!-- A ajouter sur la page des mesures
<div class="mediantempField"></div>
<div class="medianhumField"></div>
-->

<div class="lastvalues"></div>
<div class="buttons">
    <input type="submit" id="year" class="button" value="Année" /> 
    <input type="submit" id="month" class="button" value="Mois" /> 
    <input type="submit" id="week" class="button" value="Semaine" /> 
    <input type="submit" id="day" class="button" value="Jour" /> 
    <input type="submit" id="10" class="button" value="10 last" /> 
</div>
<div style="width: 70%; margin-left: 15%;">
<canvas id="meteoChart"></canvas>
</div>

<?php 
function updateSQL(){
    $link = mysqli_connect("localhost:3306", "root", "", "releves");
    if ($link->connect_errno) {
        echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT * FROM pimeteo;" ;
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<script language=\"javascript\" type=\"text/javascript\"> \n";
            $time;
            $temp;
            $hum;

            while($row = mysqli_fetch_array($result)){
                    $time[] = $row['date'];
                    $temp[] = $row['temp'];
                    $hum[] = $row['hum'];
                    
            }
    //Valeurs de l'heure derniere
           
            //echo des temperature
            $tempsize = sizeof($temp)-1;
            echo "var tempraw  = [" ;
            for($i = $tempsize; $i>$tempsize-10; $i--){
                echo $temp[$i];
                if($i>$tempsize-9){
                    echo ',';  
                }
                
            }
            echo "];\n";
            

            //echo de l'humidité
            $humsize = sizeof($hum)-1;
            echo "var humraw  = [" ;
            for($i = $humsize; $i>$humsize-10; $i--){
                echo $hum[$i];
                if($i>$tempsize-9){
                    echo ',';  
                }
                
            }
            echo "];\n";


            //echo de l'heure
            $timesize = sizeof($time)-1;
            echo "var timeScaleraw  = [" ;
            for($i = $timesize; $i>$timesize-10; $i--){
                echo "'";
                echo $time[$i];
                echo "'";
                if($i>$timesize-9){
                    echo ',';  
                }
                
            }
            echo "];\n";



            //echo de l'heure sur la journée
            $timesize = sizeof($time)-1;
            echo "var timeScalerawday  = [" ;
            for($i = $timesize; $i>$timesize-25; $i--){
                echo "'";
                echo $time[$i];
                echo "'";
                if($i>$timesize-24){
                    echo ',';  
                }
                
            }
            echo "];\n";

            //echo de l'humidité sur la journée
            $humsize = sizeof($hum)-1;
            echo "var humrawday  = [" ;
            for($i = $humsize; $i>$humsize-25; $i--){
                echo $hum[$i];
                if($i>$tempsize-24){
                    echo ',';  
                }
                
            }
            echo "];\n";
            //echo de la temperature sur la journée
            $tempsize = sizeof($temp)-1;
            echo "var temprawday  = [" ;
            for($i = $tempsize; $i>$tempsize-25; $i--){
                echo $temp[$i];
                if($i>$tempsize-24){
                    echo ',';  
                }
                
            }
            echo "];\n";


            //echo de l'heure sur la semaine
            $timesize = sizeof($time)-1;
            echo "var timeScalerawweek  = [" ;
            for($i = $timesize; $i>$timesize-168; $i--){
                echo "'";
                echo $time[$i];
                echo "'";
                if($i>$timesize-167){
                    echo ',';  
                }
                
            }
            echo "];\n";

            //echo de l'humidité sur la semaine
            $humsize = sizeof($hum)-1;
            echo "var humrawweek  = [" ;
            for($i = $humsize; $i>$humsize-168; $i--){
                echo $hum[$i];
                if($i>$tempsize-167){
                    echo ',';  
                }
                
            }
            echo "];\n";
            //echo de la temperature sur la semaine
            $tempsize = sizeof($temp)-1;
            echo "var temprawweek  = [" ;
            for($i = $tempsize; $i>$tempsize-168; $i--){
                echo $temp[$i];
                if($i>$tempsize-167){
                    echo ',';  
                }
                
            }
            echo "];\n";



            echo "\n</script>";
            mysqli_free_result($result);
        }


    }
    // valeurs de la semaine : 
        // echo un tableau avec les valeurs entieres de la semaine, en faire 2 tableaux avec valeur minimale et max, et les ranger dans un tableau

}
updateSQL();

include("./scripts/data_processing.html");
include("./scripts/dataweek.html");
include("./scripts/mediancalc.html");
?>
<script>
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
        labels: timeScaleweekdays,
        datasets: [{
            label:'Température moyenne',
            backgroundColor: '#D4007810',
            borderColor: '#D40078',
            pointStrokeColor: "#F6019D",
            pointHighlightFill: "#F6019D",
            data: tempweekaverage
        },
        {
            label:'Humidité moyenne',
            color:'#FFFFFF',
            backgroundColor: '#2DE2E610',
            borderColor: '#2DE2E6',
            data: humweekaverage
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


    let chartmeteo = new Chart(ctx, config);</script>

</body>
</html>
