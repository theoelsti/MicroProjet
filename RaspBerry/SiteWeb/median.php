<!DOCTYPE html>
<html>

<head>


<title>Station meteo</title>
<link rel="shortcut icon" href="./images/sun.ico">

<meta charset="utf-8">
<link href="./styles/stylemedian.css" rel="stylesheet"/>
<script src="./scripts/clock.js"></script>
<link rel="stylesheet" href="./styles/topnav.css"      />

</head>

<style>
    body{
        background: rgb(159,48,152);
        background: linear-gradient(90deg, rgba(159,48,152,1) 0%, rgba(96,31,125,1) 35%, rgba(14,65,168,1) 100%);
    }

    

</style>


<div style=" width:100%; height: 5 0px; display: flex;justify-content: center; text-align: center">
    <a href="./accueil.html">
    <div class="menubutton" >
        <img src="./images/home.png" style="width: 40px">
    </div>
    </a>
    <a href="index.php?param=0&show=0">
    <div class="menubutton ">
        <img src="./images/chart.png" style="width: 40px">
    </div>
    </a>
    <a href="#">
        <div class="menubutton">
            <img src="./images/eye.png" style="width: 40px">
        </div>
    </a>
</div>

<div class="top">
    <div class="sun-container">
        <div class="sun"></div>
    </div>
    
    <div class="title">
        Valeurs et données
    </div> 
    
<body unselectable="on"
onselectstart="return false;" 
onmousedown="return false;">

   
<hr>

<br><br>

</div>
<div class="buttonX">
    <div class="buttonXpos">
        <div id="total" class="values-container" > 
            <div>Valeurs relevées</div>
            <div class="number-container lastvalues">1234235</div>
        </div>
        <div id="startdate" class="values-container" >
            <div>Date du premier relevé</div>
            <div class="number-container firstdate">21/01/2002</div>
        </div>
    </div>
</div>

<br><br>

<div class="texte3">
    Moyennes des valeurs sur...
</div>

<br>

<div class="buttonX">
    <div class ="buttonXpos">
        </div> 
        <div id="humday"  class="values-container temperature" > 7 jours</div>
        <div id="resday"  class="values-container humidity" > 31 jours</div>
    </div>
</div>  
<br>
<div class="buttonY">
    <div class ="buttonYpos">
        </div> 
        <div id="humday"  class="values-container temperature" > Temperature</div>
        <div id="resday"  class="values-container humidity" > Temperature</div>
    </div>
</div>  
<br>
<div class="buttonW"> 
    <div class ="buttonYpos">
        <div  id="tempweek" class="values-container temperature"> Temperature ressenti</div>
        <div  id="humweek"  class="values-container humidity" > Temperature ressenti</div>
    </div>
</div>  
<br>
<div class="buttonZ"> 
    <div class ="buttonYpos">
        <div  id="tempweek" class="values-container temperature"> Humidite</div>
        <div  id="humweek"  class="values-container humidity" > Humidite</div>
    </div>
</div>


<br><br><br>


    <hr/>

    <script>
<?php
function getTotalValues(){
    $link = mysqli_connect("localhost:3306", "root", "root", "releves");
    if ($link->connect_errno) {
        echo "Echec lors de la connexion à mysqli : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT * FROM pimeteo;" ;
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $time[] = $row['date'];
        }
        echo "\n";
        echo 'let mostoldDate = "' . $time[0] . '"; ' . "\n";
    }}
    
    echo "let totalValues  = " . sizeof($time);
}
function day(){
    $link = mysqli_connect("localhost:3306", "root", "root", "releves");
    if ($link->connect_errno) {
        echo "Echec lors de la connexion à mysqli : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
        
    $query = "SELECT * FROM pimeteo;";
    $sql =  $query ;
    $temp = [];
    $hum = [];
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $date[] = $row['date']; 
            }
        
        
        
        $oldstamp = "";
        $datesok = [];
        
        for($d = sizeof($date)-1; $d > sizeof($date)-144; $d--){
            if($oldstamp == substr($date[$d], 0, -6)){
                $oldstamp = substr($date[$d], 0, -6);
            }
            else{
                $oldstamp = substr($date[$d], 0, -6); // Nouvelle date
                array_push($datesok, $oldstamp);
            }
        }
        
        $datesize = sizeof($datesok)-1;
        
        
        $temptab = [];
        echo "\n";
        echo "temprawday   = ";
        for($d = $datesize; $d > $datesize-24; $d--){
            //1 nouveau jour unique
                    $sql = "SELECT * FROM pimeteo " . "where date like \"%" . $datesok[$d] . "%\";";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                
                            while($row = mysqli_fetch_array($result)){ 
                                $temp[] = $row['temp'];   
                            }
                            array_push($temptab, bcdiv(array_sum($temp) / count($temp), 1, 2));
                        }
                    }
                    $temp = [];  
            }
            echo bcdiv(array_sum($temptab) / count($temptab), 1, 2);
            echo "; ";
        
        }
        
        echo "\n";
        $humtab = [];
        echo "humrawday  = ";
        for($d = $datesize; $d > $datesize-24; $d--){
            //1 nouveau jour unique
                    $sql = "SELECT * FROM pimeteo " . "where date like \"%" . $datesok[$d] . "%\";";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                
                            while($row = mysqli_fetch_array($result)){ 
                                $hum[] = $row['hum'];   
                            }
                            array_push($humtab,bcdiv(array_sum($hum) / count($hum), 1, 2));
                            
                        }
                    }
                    $hum = [];  
            }
            echo bcdiv(array_sum($humtab) / count($humtab), 1, 2);
            echo ";";


            
            echo "\n";
            $restab = [];
            echo "resrawday   = ";
            for($d = $datesize; $d > $datesize-24; $d--){
            //1 nouveau jour unique
                        $sql = "SELECT * FROM pimeteo " . "where date like \"%" . $datesok[$d] . "%\";";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                    
                                while($row = mysqli_fetch_array($result)){ 
                                    $res[] = $row['res'];   
                                }
                                array_push($restab,bcdiv(array_sum($res) / count($res), 1, 2));
                                
                            }
                        }
                        $res = [];  
            }
            echo(bcdiv(array_sum($restab) / count($restab), 1, 2));
            echo "; ";
        $time = $temp  =$hum = $row = $tempsize = $humsize  = $timesize = $res = 0;
    }
    
    
}
day();
getTotalValues()
?>


    </script>


<div class="footer">
    <a href="url">discord</a>
    <br>
    <a href="url">liens</a>
    <br>
    <a href="url">repository</a>
    <br>
    <a href="url">accueil</a>
    <br>
    <a href="url">station meteo</a>
    <br>
    <div class="footer-inside">
        <div class="footer-about-us"></div>
        <div class="footer-link-us"></div>
        <div class="footer-things">
            © 2021 Copyright - 7x Météo
        </div>
    </div>

    <div class="footer-bottom">
  
    </div>
</div>
<script src="./scripts/medianjs.js">   </script>
</body>

</html>