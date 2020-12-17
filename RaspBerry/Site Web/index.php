<?php 
include("index.html"); 

function updateSQL(){
    $link = mysqli_connect("localhost:3306", "root", "root", "releves");
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
            $factor = 5;
            //echo des temperature
            echo "var tempraw  = [" ;
            for($i = 0; $i<10; $i++){
                echo $temp[$i+$factor];
                if($i<9){
                    echo ',';  
                }
                
            }
            echo "];\n";

            //echo de l'humidité
            echo "var humraw  = [" ;
            for($i = 0; $i<10; $i++){
                echo $hum[$i+$factor];
                if($i<9){
                    echo ',';  
                }
                
            }
            echo "];\n";

            //echo de l'heure
            echo "var timeScaleraw  = [" ;
            for($i = 0; $i<10; $i++){
                echo "'";
                echo $time[$i+$factor];
                echo "'";
                if($i<9){
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
include("./scripts/chart.html"); 
?>