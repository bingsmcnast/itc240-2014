<?php

include("passwords.php");

function make_cookie($name, $value) {
 setcookie($name, $value, time()+60*60*24*2, "/");  
}

function delete_cookie($name){
 setcookie($name, "", 100, "/");
}

if(isset($_REQUEST["sort"])){
	$sort = $_REQUEST["sort"];
	make_cookie("sort", $sort);
}

if(isset($_REQUEST["theme"])){
	$theme = $_REQUEST["theme"];
	make_cookie("theme", $theme);
}

if(isset($_REQUEST["view"])){
	$view = $_REQUEST["view"];
	make_cookie("view", $view);
}

//$title = $_REQUEST["title"];
//$author = $_REQUEST["author"];
//$description = $_REQUEST["description"];
//$thumb = $_REQUEST["thumb"];

//if (isset($_REQUEST["delete"])) {
  
//  $delete_query = 'DELETE FROM books WHERE id = ?;';
//  $delete = $mysql->prepare($delete_query);
//  $delete->bind_param("i", $_REQUEST["delete"]);
//  $delete->execute();

  header("Location: index.php");

//}else{
//	$query = 'INSERT INTO books (title, author, description, thumb) VALUES (?, ?, ?, ?);';
//	$prepared = $mysql->prepare($query);
//	$prepared->bind_param("ssss", $title, $author, $description, $thumb);
//	$prepared->execute();

//	header("Location: index.php");
  
//}

