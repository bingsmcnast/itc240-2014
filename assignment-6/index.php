<!doctype html>
<html>
	<head>
		<link href="style.css" type="text/css" rel="stylesheet"> 
	</head>
<body>
	
	<div class="content"> 
		<div class="midBox">
			<h1>Fitness Tracker</h1>
			<form method="POST" action="edit.php">
				<input placeholder="Activity" name="description"><br><br>
				<input placeholder="calories" name="calories"><br><br>
				<input class="button"type="submit" value="ENTER">
			</form>

<?php

include("passwords.php");

$prepared = $mysql->prepare("SELECT * FROM fitness_log ORDER BY when_burned DESC");
$prepared->execute();
$table_result = $prepared->get_result();

$sumQuery = $mysql->prepare('SELECT SUM(calories) AS sum FROM fitness_log;');
$sumQuery->execute();
$sumResult = $sumQuery->get_result();
$sum = $sumResult->fetch_array();

$maxQuery = $mysql->prepare('SELECT MAX(calories) AS max FROM fitness_log;');
$maxQuery->execute();
$maxResult = $maxQuery->get_result();
$max = $maxResult->fetch_array();

?>
  		<div class="functionBox">
  			<div class="functionOut">
    			Total<br><?= htmlentities($sum["sum"]) ?> Cal
  			</div>

  			<div class="functionOut">
  				Most Cal Burned<br><?= htmlentities($max["max"]) ?> Cal
  			</div>
  		</div>
  	</div>
  
<?php
if(isset($_REQUEST["message"])){
	echo "<h2>" . htmlentities($_REQUEST["message"]) . "</h2>";

} 
?>
	
	<table>
		<thead>
			<tr>
				<th>Calories</th>
				<th>Activity</th>
				<th>Date</th>
				<th>Delete</th>
		</thead>
    <tbody>

<?php


$i=0;
foreach($table_result as $row){
$i++;

if($i%2==0){
  echo '<tr class="even">';
}else{
  echo '<tr class="odd">';
  
}
?>
      <td><b><?= htmlentities($row["calories"]) ?></b>
      <td><?= htmlentities($row["description"])?>
      <td><?= htmlentities($row["when_burned"]) ?>
      <td><a href="edit.php?delete=<?= $row["Id"] ?>"><img style="border:0;" src="delete.png"></a>  
    </tr>
   
<?php    
}  

?>

		</div>
	</body>
</html>


