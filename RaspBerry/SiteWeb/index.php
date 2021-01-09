<!DOCTYPE html>
<html>

<head>


<title>Station meteo</title>

<meta charset="utf-8"                                  />

<!--    Feuilles de style-->
<link rel="stylesheet" href="./styles/sidebar.css"      />
<link href="./styles/style.css" rel="stylesheet"        />
<link rel="stylesheet" href="./styles/notifs.css"       />
<link href="./styles/sun.css" rel="stylesheet"          />
<link rel="stylesheet" href="./styles/topnav.css"       />
<link href="./styles/time.css" rel="stylesheet"         />
<link rel="stylesheet" href="./styles/utils.css"       />
<!--    Scripts     -->
<script src="./scripts/clock.js">               </script>
<script src="./scripts/showTime.js">            </script>
<script src="./scripts/sidemenu.js">            </script>

<!--    Essential    -->


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
<link rel="shortcut icon" href="./images/sun.ico"   />
<body style="background-color: #261447;" 
onLoad="initClock()"
unselectable="on"
onselectstart="return false;" 
onmousedown="return false;"
>


<div style=" width:100%; height: 50px; display: flex;justify-content: center; text-align: center"> 
    <a href="./accueil.html" name='top'>
    <div class="menubutton" >
        <img src="./images/home.png" style="width: 40px">
    </div>
    </a>
    <a href="#meteoChart">
    <div class="menubutton active">
        <img src="./images/chart.png" style="width: 40px">
    </div>
    </a>
    <a href="median.html">
        <div class="menubutton">
            <img src="./images/eye.png" style="width: 40px">
        </div>
    </a>
</div>


<div class="top" >
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
            <a id="d">1                         </a>
            <a id="mon">Janvier                 </a>
            <a id="y">0                         </a>
            </br>
            <a id="h" style="font-size:30px">12</a>
            <a style="font-size: 30px;">  :    </a>
            <a id="m" style="font-size:30px">00</a>
            <a style="font-size: 30px;">  :    </a>
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
<div class="mainHello">                                            </div>

<div class="dataText">                                             </div>

<div class="lastvalues">                                           </div>

<div class="gauges">
    
        <div title="Température" class="display">
            <div  id="gaugetemp" class="gauge-container two">      </div>
        </div>

        <div title="Humidité" class="display">
            <div id="gaugehum" class="gauge-container two">        </div>
        </div>

        <div title="Température ressentie" class="display">
            <div id="gaugeres" class="gauge-container two">        </div>
        </div>
</div>
<div style="display:flex; justify-content:center">
<div class="selectors">
  <button class="openbtn" onclick="openNav()">Affichage            </button>
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
<div class='selectors'>
  <button class="openbtn jaugebutton" onclick="lastValues()">Jauges</button>
</div>

</div>
<div id="main" class="opentime">
  <button class="timebtn timebutton" onclick="showTime()">+ / - </button>
</div>

<div class="openbuttons">
    <div class="buttons">
        <input name="minusmonth" type="submit" id="minusmonth" class="buttonl" value="-1 M" /> 
        <input name="plusday" type="submit" id="minusday" class="buttonl" value="-1 J"      /> 
        <input name="minus" type="submit" id="minus" class="buttonl" value="-1 H"           /> 
        <input name="minusminute" type="submit" id="minusminute" class="buttonl" value="-10 M"     /> 
        <input name="plusminute" type="submit" id="plusminute" class="buttonl" value="+10 M"      /> 
        <input name="plus" type="submit" id="plus" class="buttonl" value="+1 H"             /> 
        <input name="plusday" type="submit" id="plusday" class="buttonl" value="+1 J"       /> 
        <input name="plusmonth" type="submit" id="plusmonth" class="buttonl" value="+1 M"   /> 
    </div>
</div>
<div style="width: 70%; margin-left: 15%;">
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="menubuttons">
            <div class="buttons"><input type="submit" id="month" class="button" value="Mois" /> </div>
            <div class="buttons"><input type="submit" id="week" class="button" value="7 J" />   </div>
            <div class="buttons"><input type="submit" id="day" class="button" value="24 H" />   </div>
            <div class="buttons"><input type="submit" id="10" class="button" value="10 last" /> </div>
        </div>
    </div>
    <div id="currentdate" style="text-align: center;">
    </div>
    <canvas id="meteoChart"></canvas>
    <button onclick="topFunction()" id="scrollBtn" title="Go to top">⬆️</button>
    <div id="anchor"></div>
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
    }}
    return sizeof($time);
}
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
            echo "// Variables essentielles au fonctionnement des données\n";
            if($param){echo 'let param ='  . $param . "\n";}
            else{echo "let param = 0 \n"; }
            echo "let show = " . $show . ";\n";

            while($row = mysqli_fetch_array($result)){
                    $time[] = $row['date'];
                    $temp[] = $row['temp'];
                    $hum[] = $row['hum'];
                    $res[] = $row['res'];
            }
            echo 'let totalvalues = ' . sizeof($time) . "; \n";
            $totalvalues = sizeof($time);
            echo 'let mostRecentDate = "' . $time[sizeof($time)-1] . '"; ' . "\n";
        // 10 Dernieres valeurs
                echo 'let lastres = ' . $res[sizeof($res)-1] . "\n";
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
            
                echo "\n</script>";
            mysqli_free_result($result);
            $tempday1  = array();
            $time = $temp  =$hum = $row = $tempsize = $humsize  = $timesize = 0;
                        
                        
            }
        
    }

}
updateSQL();
function month(){
    $param = $_GET['param'];
    $show = $_GET['show'];  
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
        
        $i = 0;
        $coma = 0;
        $oldstamp = "";
        $datesok = [];
       
        for($d = sizeof($date)-1; $d > sizeof($date)-4464; $d--){
            if($oldstamp == substr($date[$d-$param], 0, -9)){
                $oldstamp = substr($date[$d-$param], 0, -9);
            }
            else{
                $oldstamp = substr($date[$d-$param], 0, -9); // Nouvelle date
                array_push($datesok, $oldstamp);
            }
        }
        $datesize = sizeof($datesok)-1;
        echo "<script>";
        echo "timeScalerawmonth = ["; 
        for($da = $datesize; $da > 0; $da--){
            echo '"';
            echo $datesok[$da];
            echo '"';
            $coma++;
            if($coma < 31){
                echo ",";
            }
            

        }
        echo "]";
        $coma = 0;
        echo "\n";
        echo "temprawmonth   = [";
        for($d = $datesize; $d > $datesize-31; $d--){
         //1 nouveau jour unique
                    $sql = "SELECT * FROM pimeteo " . "where date like \"%" . $datesok[$d] . "%\";";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                
                            while($row = mysqli_fetch_array($result)){ 
                                $temp[] = $row['temp'];   
                            }
                            echo bcdiv(array_sum($temp) / count($temp), 1, 2);
                            if($coma < 30){
                                echo ',';
                                $coma++;
                            }
                        }
                    }
                    $temp = [];  
         }
         echo "] ";
        
        }
        $coma = 0;
        echo "\n";
        echo "humrawmonth   = [";
        for($d = $datesize; $d > $datesize-31; $d--){
         //1 nouveau jour unique
                    $sql = "SELECT * FROM pimeteo " . "where date like \"%" . $datesok[$d] . "%\";";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                
                            while($row = mysqli_fetch_array($result)){ 
                                $hum[] = $row['hum'];   
                            }
                            echo bcdiv(array_sum($hum) / count($hum), 1, 2);
                            if($coma < 31){
                                echo ',';
                                $coma++;
                            }
                        }
                    }
                    $hum = [];  
         }
         echo "] ";
        
        echo "</script>";
        $time = $temp  =$hum = $row = $tempsize = $humsize  = $timesize = 0;
    }
    
   
}
$param = $_GET['param'];
if($param + 4464 < getTotalValues()-2 - 4464){
    month();
}
function week(){
    $param = $_GET['param'];
    $show = $_GET['show'];  
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
        
        $i = 0;
        $coma = 0;
        $oldstamp = "";
        $datesok = [];
       
        for($d = sizeof($date)-1; $d > sizeof($date)-1008; $d--){
            if($oldstamp == substr($date[$d-$param], 0, -9)){
                $oldstamp = substr($date[$d-$param], 0, -9);
            }
            else{
                $oldstamp = substr($date[$d-$param], 0, -9); // Nouvelle date
                array_push($datesok, $oldstamp);
            }
        }
        $datesize = sizeof($datesok)-1;
        echo "<script>";
        echo "timeScalerawweek = ["; 
        for($da = $datesize; $da > 0; $da--){
            echo '"';
            echo $datesok[$da];
            echo '"';
            $coma++;
            if($coma < 7){
                echo ",";
            }
            

        }
        echo "]";
        $coma = 0;
        echo "\n";
        echo "temprawweek   = [";
        for($d = $datesize; $d > $datesize-7; $d--){
         //1 nouveau jour unique
                    $sql = "SELECT * FROM pimeteo " . "where date like \"%" . $datesok[$d] . "%\";";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                
                            while($row = mysqli_fetch_array($result)){ 
                                $temp[] = $row['temp'];   
                            }
                            echo bcdiv(array_sum($temp) / count($temp), 1, 2);
                            if($coma <  6){
                                echo ',';
                                $coma++;
                            }
                        }
                    }
                    $temp = [];  
         }
         echo "] ";
        
        }
        $coma = 0;
        echo "\n";
        echo "humrawweek   = [";
        for($d = $datesize; $d > $datesize-7; $d--){
         //1 nouveau jour unique
                    $sql = "SELECT * FROM pimeteo " . "where date like \"%" . $datesok[$d] . "%\";";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                
                            while($row = mysqli_fetch_array($result)){ 
                                $hum[] = $row['hum'];   
                            }
                            echo bcdiv(array_sum($hum) / count($hum), 1, 2);
                            if($coma < 6){
                                echo ',';
                                $coma++;
                            }
                        }
                    }
                    $hum = [];  
         }
         echo "] ";
        
        echo "</script>";
        $time = $temp  =$hum = $row = $tempsize = $humsize  = $timesize = 0;
    }
    
   
}
week();
function day(){
    $param = $_GET['param'];
    $show = $_GET['show'];  
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
        
        $i = 0;
        $coma = 0;
        $oldstamp = "";
        $datesok = [];
       
        for($d = sizeof($date)-1; $d > sizeof($date)-144; $d--){
            if($oldstamp == substr($date[$d-$param], 0, -6)){
                $oldstamp = substr($date[$d-$param], 0, -6);
            }
            else{
                $oldstamp = substr($date[$d-$param], 0, -6); // Nouvelle date
                array_push($datesok, $oldstamp);
            }
        }
        $datesize = sizeof($datesok)-1;
        echo "\n";
        echo "<script>";
        echo "timeScalerawday = ["; 
        for($da = $datesize; $da > 0; $da--){
            echo '"';
            echo $datesok[$da] . ":00";
            echo '"';
            $coma++;
            if($coma < 24){
                echo ",";
            }
            

        }
        echo "]";
        $coma = 0;
        echo "\n";
        echo "temprawday   = [";
        for($d = $datesize; $d > $datesize-24; $d--){
         //1 nouveau jour unique
                    $sql = "SELECT * FROM pimeteo " . "where date like \"%" . $datesok[$d] . "%\";";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                
                            while($row = mysqli_fetch_array($result)){ 
                                $temp[] = $row['temp'];   
                            }
                            echo bcdiv(array_sum($temp) / count($temp), 1, 2);
                            if($coma < 23){
                                echo ',';
                                $coma++;
                            }
                        }
                    }
                    $temp = [];  
         }
         echo "] ";
        
        }
        $coma = 0;
        echo "\n";
        echo "humrawday   = [";
        for($d = $datesize; $d > $datesize-24; $d--){
         //1 nouveau jour unique
                    $sql = "SELECT * FROM pimeteo " . "where date like \"%" . $datesok[$d] . "%\";";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                
                            while($row = mysqli_fetch_array($result)){ 
                                $hum[] = $row['hum'];   
                            }
                            echo bcdiv(array_sum($hum) / count($hum), 1, 2);
                            if($coma < 23){
                                echo ',';
                                $coma++;
                            }
                        }
                    }
                    $hum = [];  
         }
         echo "] ";
        
        echo "</script>";
        $time = $temp  =$hum = $row = $tempsize = $humsize  = $timesize = 0;
    }
    
   
}
day();
?>
<script src="./scripts/notifs.js">              </script>
<script src="./scripts/chartjs.js">             </script>
<script src="./scripts/jquery-3.5.1.js">        </script>
<script src="./scripts/data_processing.js">     </script>
<script src="./scripts/dataweek.js">            </script>
<script src="./scripts/datamonth.js">           </script>
<script src="./scripts/chart.js">               </script>
<script src="./scripts/counter.js">             </script>
<script src="./scripts/gauge.js">               </script>
<script src="./scripts/jauges.js">              </script>
<script src="./scripts/connectionchecker.js">   </script>

<script src="./scripts/goToTop.js">            </script>
</body>
</html>
<!-- 0xFadeath Copyrigthed this-->