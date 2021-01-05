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




<body style="background-color: #1c0c28;">



<div style=" width:100%; height: 50px; display: flex;justify-content: center; text-align: center">
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
        <div class="menubutton active">
            <img src="./images/eye.png" style="width: 40px">
        </div>
    </a>
</div>

<div class="top">
<div class="sun"></div>

    <div class="title">
        Valeurs et données
    </div> 
    
<body onLoad="initClock()">

    <div id="timedate">
        <a id="d" style="font-size:40px">1</a><a style="font-size: 40px;">  :</a>
        <a id="mon" style="font-size:40px">Janvier</a><a style="font-size: 40px;">  :</a>
        <a id="y" style="font-size:40px">0</a></br>
        <a id="h" style="font-size:23px">12</a><a style="font-size: 23px;">  :</a>
        <a id="m" style="font-size:23px">00</a><a style="font-size: 23px;">  :</a>
        <a id="s" style="font-size:23px">00</a></br></br>
    </div>
<hr>
</div>

<div class="mainHello"></div>

<div class="moyenne">
    
</div>



<div class="lastvalues"></div>


<div style="width: 70%; margin-left: 15%;">
</div>

<div class="notbutton">

<div class="buttonX">
    <input name="minusmonth" type="submit" id="minusmonth" class="buttonl" value="aujourd'hui" /> 
    <input name="plusday" type="submit" id="minusday" class="buttonl" value="les 3 derniers jours" /> 
    <input name="minus" type="submit" id="minus" class="buttonl" value="les 7 derniers jours" /> 
</div>

<div class="buttonY">

    <input name="plus" type="submit" id="plus" class="buttonl" value="les 15 derniers jours" /> 
    <input name="plusday" type="submit" id="plusday" class="buttonl" value="les 31 derniers jours" /> 
    <input name="plusday" type="submit" id="plusday" class="buttonl" value="les 100 derniers jours" /> 
</div>  
</div>

<br><br><br>

<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=PLhLMYB8Um23XZlFXEuCjil1p6LJKTrd0v">
    <img alt="Qries" src="1200px-Octicons-mark-github.svg-ConvertImage.png"
    width=70" height="70">

</body>
</html>











