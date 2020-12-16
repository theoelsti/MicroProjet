<?php 
include("index.html"); 
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
        echo "var temp  = [" ;
        for($i = 0; $i<sizeof($temp); $i++){
            echo $temp[$i];
            if($i<9){
                echo ',';  
            }
            
        }
        echo "];\n";

        //echo de l'humidité
        echo "var hum  = [" ;
        for($i = 0; $i<sizeof($hum); $i++){
            echo $hum[$i];
            if($i<9){
                echo ',';  
            }
            
        }
        echo "];\n";

        //echo de l'heure
        echo "var timeScale  = [" ;
        for($i = 0; $i<sizeof($hum); $i++){
            echo "'";
            echo $time[$i];
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
include("chart.html"); 
?>