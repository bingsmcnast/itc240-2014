<?php

include("passwords.php");


$calories = $_REQUEST["calories"];
$description = $_REQUEST["description"];

if (isset($_REQUEST["delete"])) {
  
  $delete_query = 'DELETE FROM fitness_log WHERE Id = ?;';
  $delete = $mysql->prepare($delete_query);
  $delete->bind_param("i", $_REQUEST["delete"]);
  $delete->execute();

  header("Location: index.php");

}elseif($calories == "" || $description == ""){
	$_REQUEST["message"] = "FILL IN ALL FIELDS SUCKA";
	header('Location: index.php?message=FILL IN ALL FIELDS SUCKA');
}else{
	$query = 'INSERT INTO fitness_log (calories, description, when_burned) VALUES (?, ?, NOW());';
	$prepared = $mysql->prepare($query);
	$prepared->bind_param("is", $calories, $description);
	$prepared->execute();

	header("Location: index.php");
  
}

