<?php 
include("index.html"); 

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


            echo "\n</script>";
            mysqli_free_result($result);
    }
    }
}
updateSQL();
include("./scripts/data_processing.html");
include("./scripts/mediancalc.html");
include("./scripts/chart.html"); 
?>