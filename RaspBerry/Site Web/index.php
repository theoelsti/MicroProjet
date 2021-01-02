<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="./images/sun.ico">
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
<div id="location" class="location"> </div>
<div class="buttons">
    <input type="submit" id="year" class="button" value="Année" /> 
    <input type="submit" id="month" class="button" value="Mois" /> 
    <input type="submit" id="week" class="button" value="7 J" /> 
    <input type="submit" id="day" class="button" value="24 H" /> 
    <input type="submit" id="10" class="button" value="10 last" /> 
</div>
<div class="buttons">
    <input name="minus" type="submit" id="minus" class="button" value="-1 H" /> 
    <input name="plus" type="submit" id="plus" class="button" value="+1 H" /> 
</div>
<div style="width: 70%; margin-left: 15%;">
<canvas id="meteoChart"></canvas>
</div>

<?php 


// http://localhost:4000/index.php?param=x


function updateSQL(){
    $param = $_GET['param'];

    $link = mysqli_connect("localhost:3306", "root", "", "releves");
    if ($link->connect_errno) {
        echo "Echec lors de la connexion à mysqli : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT * FROM pimeteo;" ;
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<script language=\"javascript\" type=\"text/javascript\"> \n";
            echo 'let param = ' . $param . "\n";

            while($row = mysqli_fetch_array($result)){
                    $time[] = $row['date'];
                    $temp[] = $row['temp'];
                    $hum[] = $row['hum'];
                    
            }
    //10 Dernieres valeurs
           
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
                echo $time[$i-$param];
                echo "'";
                if($i>$timesize-9){
                    echo ',';  
                }
                
            }
            echo "];\n";


    // Valeurs de la journée
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

    // Valeurs de la semaine (moyennes)
    // Valeurs de l'heure sur la semaine
        $tempsize = sizeof($time)-1;
        echo "var timeScalerawweek  = [" ;
        $ok = TRUE;
        $tab = 0;
        $day = 24;
        $k = 0;
        while($ok){
            for($i = $timesize; $i>$timesize-(168); $i-=24){
                $timeday1[$tab] = $time[$i];
                $tab++;
            }
            echo "'" . $timeday1[$k] . "'";
            $k++;
            $day += 24;
            
            if($day > 168){
                $ok = !$ok;
            }
            else{
                echo ",";
            }
            
        }
        echo "];\n";
    
        //echo de l'humidité sur la semaine
            $humsize = sizeof($hum)-1;
            echo "var humrawweek  = [" ;
            $ok = TRUE;
            $tab = 0;
            $day = 24;
            $humday1 = [];
            while($ok){
                for($i = $humsize; $i>$humsize-$day; $i--){
                    array_push($humday1,$hum[$i]);
                    $tab++;
                }
                echo bcdiv(array_sum($humday1) / count($humday1), 1, 2);
                $day += 24;
                
                if($day > 168){
                    $ok = !$ok;
                }
                else{
                    echo ",";
                }
                
            }
            echo "];\n";
            
        //echo de la temperature sur la semaine
            $tempsize = sizeof($temp)-1;
            echo "var temprawweek  = [" ;
            $ok = TRUE;
            $tab = 0;
            $day = 24;
            while($ok){
                for($i = $tempsize; $i>$tempsize-$day; $i--){
                    $tempday1[$tab] = $temp[$i];
                    $tab++;
                }
                echo bcdiv(array_sum($tempday1) / count($tempday1), 1, 2);
                $day += 24;
                
                if($day > 168){
                    $ok = !$ok;
                }
                else{
                    echo ",";
                }
                
            }
            echo "];\n";
            


    // //Valeurs du mois

    //     $timesize = sizeof($time)-1;
    //     echo "var timeScalerawmonth  = [" ;
    //     for($i = $timesize; $i>$timesize-720; $i--){
    //         echo "'";
    //         echo $time[$i];
    //         echo "'";
    //         if($i>$timesize-719){
    //             echo ',';  
    //         }
            
    //     }
    //     echo "];\n";

    //     //echo de l'humidité sur la semaine
    //     $humsize = sizeof($hum)-1;
    //     echo "var humrawmonth  = [" ;
    //     for($i = $humsize; $i>$humsize-720; $i--){
    //         echo $hum[$i];
    //         if($i>$tempsize-719){
    //             echo ',';  
    //         }
            
    //     }
    //     echo "];\n";
    //     //echo de la temperature sur la semaine
    //     $tempsize = sizeof($temp)-1;
    //     echo "var temprawmonth  = [" ;
    //     for($i = $tempsize; $i>$tempsize-720; $i--){
    //         echo $temp[$i];
    //         if($i>$tempsize-719){
    //             echo ',';  
    //         }
            
    //     }
    //     echo "];\n";
        echo "\n</script>";
        mysqli_free_result($result);
        }

    }

    
    
   

       
}
updateSQL();
include("./scripts/data_processing.html");
include("./scripts/dataweek.html");
include("./scripts/mediancalc.html");
include("./scripts/chart.html");
?>

</body>
</html>
