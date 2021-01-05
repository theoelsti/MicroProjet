<!DOCTYPE html>
<html>

<head>
<link rel="shortcut icon" href="./images/sun.ico">

<title>Station meteo</title>

<meta charset="utf-8">
<!--Feuilles de style-->
<link rel="stylesheet" href="./styles/sidebar.css">
<link href="./styles/style.css" rel="stylesheet"/>
<link rel="stylesheet" href="./styles/notifs.css">
<link href="./styles/sun.css" rel="stylesheet"/>
<!--    Scripts     -->
<script src="./scripts/clock.js"></script>
<script src="./scripts/connectionchecker.js"></script>
<script src="./scripts/sidemenu.js"></script>

<!--    Essential    -->
<script src="./scripts/chartjs.js"></script>
<script src="./scripts/jquery-3.5.1.js"></script>

<!--
  o__ __o                         o              
 <|     v\                       <|>             
 / \     <\                      < \             
 \o/     o/    o__ __o      o__ __o/   o      o  
  |__  _<|    /v     v\    /v     |   <|>    <|> 
  |       \  />       <\  />     / \  < >    < > 
 <o>      /  \         /  \      \o/   \o    o/  
  |      o    o       o    o      |     v\  /v   
 / \  __/>    <\__ __/>    <\__  / \     <\/>    
                                          /      
                                         o       
                                      __/>       

    -->
</head>

<body style="background-color: #261447;" onLoad="initClock()">
<script src="./scripts/notifs.js"></script>

<div style=" width:100%; height: 50px; display: flex;justify-content: center; text-align: center">

    <div class="menubutton">
    <img src="./images/home.png" style="width: 40px">
    </div>

    <div class="menubutton">
    <img src="./images/chart.png" style="width: 40px">
    </div>


</div>


<div class="top">
<div class="sun"></div>
<!--        
      o         o                                                    
 <|>       <|>                                                   
 < >       < >                                                   
  |         |     o__  __o    o       o   \o__ __o     o__  __o  
  o__/_ _\__o    /v      |>  <|>     <|>   |     |>   /v      |> 
  |         |   />      //   < >     < >  / \   < >  />      //  
 <o>       <o>  \o    o/      |       |   \o/        \o    o/    
  |         |    v\  /v __o   o       o    |          v\  /v __o 
 / \       / \    <\/> __/>   <\__ __/>   / \          <\/> __/> 
                                                                 
       -->
<div id="location" class="state"> </div>
    <div class="title">
        Station Méteo
    </div>

    <div id="timedate">
        <a id="d">1</a>
        <a id="mon">Janvier</a>
        <a id="y">0</a></br>
        <a id="h" style="font-size:30px">12</a><a style="font-size: 30px;">  :</a>
        <a id="m" style="font-size:30px">00</a><a style="font-size: 30px;">  :</a>
        <a id="s" style="font-size:30px">00</a>
    </div>
<hr>


<div class="toolsbuttons">

<button type = "submit" name="refresh"class="buttonre" id="refresh">
    <img src="./images/refresh.png" class="refreshico"/>
</button>

</div>
<!--

 ____o__ __o____                       o                  
  /   \   /   \                       <|>                 
       \o/                            < >                 
        |        o__  __o   \o    o/   |        o__  __o  
       < >      /v      |>   v\  /v    o__/_   /v      |> 
        |      />      //     <\/>     |      />      //  
        o      \o    o/       o/\o     |      \o    o/    
       <|       v\  /v __o   /v  v\    o       v\  /v __o 
       / \       <\/> __/>  />    <\   <\__     <\/> __/> 
                                                          
                                                          
                                                          

-->
<div class="mainHello"></div>

<div class="dataText"></div>

<div class="lastvalues"></div>

<div class="gauges">
    
        <div class="display">
            <div id="gaugetemp" class="gauge-container two"></div>
        </div>

        <div class="display">
            <div id="gaugehum" class="gauge-container two"></div>
        </div>
</div>
<div style="display:flex; justify-content:center">
<div id="main">
  <button class="openbtn" onclick="openNav()">Affichage</button>
</div>
<div id="main">
  <button class="openbtn jaugebutton" onclick="lastValues()">Jauges</button>
</div>
</div>
<!--
  o__ __o                               o                                        
 <|     v\                             <|>                                       
 / \     <\                            < >                                       
 \o/     o/    o__ __o     o       o    |        o__ __o    \o__ __o       __o__ 
  |__  _<|    /v     v\   <|>     <|>   o__/_   /v     v\    |     |>     />  \  
  |       \  />       <\  < >     < >   |      />       <\  / \   / \     \o     
 <o>      /  \         /   |       |    |      \         /  \o/   \o/      v\    
  |      o    o       o    o       o    o       o       o    |     |        <\   
 / \  __/>    <\__ __/>    <\__ __/>    <\__    <\__ __/>   / \   / \  _\o__</   
                                                                                 
                                                                                 
                                                                                 
-->
<div class="buttons">
    <input name="minusmonth" type="submit" id="minusmonth" class="buttonl" value="-1 M" /> 
    <input name="plusday" type="submit" id="minusday" class="buttonl" value="-1 J" /> 
    <input name="minus" type="submit" id="minus" class="buttonl" value="-1 H" /> 
    <input name="plus" type="submit" id="plus" class="buttonl" value="+1 H" /> 
    <input name="plusday" type="submit" id="plusday" class="buttonl" value="+1 J" /> 
    <input name="plusmonth" type="submit" id="plusmonth" class="buttonl" value="+1 M" /> 
</div>

<div style="width: 70%; margin-left: 15%;">
<div id="mySidebar" class="sidebar">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>


    <div class="menubuttons">
        <div class="buttons"><input type="submit" id="year" class="button" value="Année" /></div>
        <div class="buttons"><input type="submit" id="month" class="button" value="Mois" /></div>
        <div class="buttons"><input type="submit" id="week" class="button" value="7 J" /></div>
        <div class="buttons"><input type="submit" id="day" class="button" value="24 H" /> </div>
        <div class="buttons">  <input type="submit" id="10" class="button" value="10 last" /> </div>
    </div>
</div>


<canvas id="meteoChart"></canvas>
</div>

<!--

  o__ __o     o         o    o__ __o   
 <|     v\   <|>       <|>  <|     v\  
 / \     <\  < >       < >  / \     <\ 
 \o/     o/   |         |   \o/     o/ 
  |__  _<|/   o__/_ _\__o    |__  _<|/ 
  |           |         |    |         
 <o>         <o>       <o>  <o>        
  |           |         |    |         
 / \         / \       / \  / \        
                                       
                                       
                                       

-->

<?php 


// http://localhost:42069/index.php&param=0&show=0

function updateSQL(){
    $param = $_GET['param'];
    $show = $_GET['show'];
    $link = mysqli_connect("localhost:3306", "root", "root", "releves");
    if ($link->connect_errno) {
        echo "Echec lors de la connexion à mysqli : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $sql = "SELECT * FROM pimeteo;" ;
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<script language=\"javascript\" type=\"text/javascript\"> \n";
            echo "// Variables essentielles au fonctionnement des moyennes etc\n";
            if($param){echo 'let param ='  . $param . "\n";}
            else{echo "let param = 0 \n"; }
            echo "let show = " . $show . ";\n";

            while($row = mysqli_fetch_array($result)){
                    $time[] = $row['date'];
                    $temp[] = $row['temp'];
                    $hum[] = $row['hum'];
                    
            }
            echo 'let totalvalues = ' . sizeof($time) . "; \n";
            echo 'let mostRecentDate = "' . $time[$param] . '"; ' . "\n";
    //10 Dernieres valeurs
            echo 'let lasttemp = ' . $temp[sizeof($temp)-1] . "\n";
            echo 'let lasthum = ' . $hum[sizeof($hum)-1] . "\n";
            //echo des temperature
            echo "//Stockage des resultats \n";
            $tempsize = sizeof($temp)-1;
            echo "var tempraw  = [" ;
            for($i = $tempsize; $i>$tempsize-10; $i--){
                echo $temp[$i-$param];
                if($i>$tempsize-9){
                    echo ',';  
                }
                
            }
            echo "];\n";
            //echo de l'humidité
            $humsize = sizeof($hum)-1;
            echo "var humraw  = [" ;
            for($i = $humsize; $i>$humsize-10; $i--){
                echo $hum[$i-$param];
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
            echo $time[$i-$param];
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
            echo $hum[$i-$param];
            if($i>$tempsize-24){
                echo ',';  
            }
            
        }
        echo "];\n";
        //echo de la temperature sur la journée
        $tempsize = sizeof($temp)-1;
        echo "var temprawday  = [" ;
        for($i = $tempsize; $i>$tempsize-25; $i--){
            echo $temp[$i-$param];
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
                    $timeday1[$tab] = $time[$i-$param];
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
                    array_push($humday1,$hum[$i-$param]);
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
                    $tempday1[$tab] = $temp[$i-$param];
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
            


    
            //Valeurs du mois

    
    
            //     $timesize = sizeof($time)-1;

    // Valeurs du mois (moyennes)
        // Valeurs de l'heure sur le mois

        $tempsize = sizeof($time)-1;
        echo "var timeScalerawmonth  = [" ;
        $ok = TRUE;
        $tab = 0;   
        $day = 48;
        $k = 0;
        while($ok){
            for($i = $timesize; $i>$timesize-(744); $i-=48){
                $timeday1[$tab] = substr($time[$i-$param], 0, -8);
                $tab++;
            }
            echo "'" . $timeday1[$k] . "'";
            $k++;
            $day += 48;
            
            if($day > 744){
                $ok = !$ok;
            }
            else{
                echo ",";
            }
            
        }
        echo "];\n";
    
    //echo de l'humidité sur le mois
        $humsize = sizeof($hum)-1;
        echo "var humrawmonth  = [" ;
        $ok = TRUE;
        $tab = 0;
        $day = 48;
        $humday1 = [];
        while($ok){
            for($i = $humsize; $i>$humsize-$day; $i--){
                array_push($humday1,$hum[$i]);
                $tab++;
            }
            echo bcdiv(array_sum($humday1) / count($humday1), 1, 2);
            $day += 24;
            
            if($day > 744){
                $ok = !$ok;
            }
            else{
                echo ",";
            }
            
        }
        echo "];\n";
        
    // //echo de la temperature sur le mois
        $tempsize = sizeof($temp)-1;
        echo "var temprawmonth  = [" ;
        $ok = TRUE;
        $tab = 0;
        $day = 48;
        while($ok){
            for($i = $tempsize; $i>$tempsize-$day; $i--){
                $tempday1[$tab] = $temp[$i];
                $tab++;
            }
            echo bcdiv(array_sum($tempday1) / count($tempday1), 1, 2);
            $day += 48;
            
            if($day > 745.5){
                echo $day;
                $ok = !$ok;
            }
            else{
                echo ",";
            }
            
        }
        echo "];\n";
        
            echo "\n</script>";
        mysqli_free_result($result);
        }

    
    }

    
    
   

       
}
updateSQL();

?>

<script src="./scripts/data_processing.js"></script>
<script src="./scripts/dataweek.js">       </script>
<script src="./scripts/datamonth.js">      </script>
<script src="./scripts/chart.js">          </script>
<script src="./scripts/counter.js">        </script>
<script src="./scripts/gauge.js">          </script>
<script src="./scripts/jauges.js">         </script>

</body>
</html>
