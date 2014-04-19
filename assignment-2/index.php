<!DOCTYPE html>
<html>
<head>
	<style>
  
    body{
        text-align:center;
        
        font-family:Georgia;
        background-color:#006699;
    }
    .box{
        background-color:#66CC99;
        border:5px solid #FF9933;
        border-color:#FF6600;
        padding-top:10px;
        padding-bottom:10px;
        margin-left:100px;
        margin-right:100px;
    }
    </style>
    <title>Mad libs!</title>
</head>
<body>
<h1>Please enter in the following words and numbers</h1>
<?php

$method = $_SERVER["REQUEST_METHOD"];    
// echo ($method);

if ($method =="GET"){

?>
    <form method="post">
        <input name="noun" placeholder="a noun"><br><br>
        <input name="verb" placeholder="a verb"><br><br>
        <input name="adjective" placeholder="an adjective"><br><br>
        <input name="number_1" placeholder="a number"><br><br>
        <input name="number_2" placeholder="another number"><br><br>
        <input name="noun2" placeholder="another noun"><br><br>
        <button>VOODOO MAGIC</button>
        
    </form>
<?php
}


if ($method === "POST") {
    
    $noun = $_REQUEST["noun"];
    $verb = $_REQUEST["verb"];
    $adj = $_REQUEST["adjective"];
    $num1 = $_REQUEST["number_1"];
    $num2 = $_REQUEST["number_2"];
    $noun2 = $_REQUEST["noun2"];
    
    if($num1 > 10){
        $num1 = "a boatload of";
    }
    if($num2 == 1){
        $num2 = "too many";
    }
    
    if($adj == "" || $verb == "" || $noun == "" || $num1 == "" || $num2 == ""){
        echo "Come on man! put in ALL the different words and numbers!";                                                                                                                                                                    
      
?>
    <form action="index.php">
    <input type="submit" value="TRY AGAIN">
    </form>
<?php    
    }else{ 
        
        
?>
  <?php // print_r($_REQUEST); ?>  
    
    <p class="box">There once was a <?= htmlentities($adj) ?> man from spain.<br> 
        He really liked to <?= htmlentities($verb) ?> with his <?= htmlentities($noun) ?>.<br>
        He had <?= htmlentities($num1) ?> wives, with <?= htmlentities($num2) ?> knives.<br>
        So he had <?= htmlentities($noun2) ?>s in the back of his head.
        </p>
    
       <br>
    <form action="index.php">
    <input type="submit" value="CLEAR AND TRY AGAIN">
    </form>
<?php
    }
}
?>	
 
    
</body>
</html>
