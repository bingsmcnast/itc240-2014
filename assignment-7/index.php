<!doctype html>
<html>
	<head>
<?php

if (isset($_COOKIE['theme'])){
	switch ($_COOKIE['theme']) {
		case "Light":
		$theme_drop = "light.css";
		break;
		case "Dark":
		$theme_drop = "dark.css";
		break;
		default:
		$theme_drop = "light.css";
	}
}
?>	
	
	<link href="<?= $theme_drop ?>"type="text/css" rel="stylesheet"></head>
<body>
	
	<div class="content"> 
		
		<h1>Faux Library</h1>
		<form method="POST" action="edit.php">
			Sort By:<select name="sort">
				<option>Title</option>
				<option>Author</option>
			</select> 
			Theme<select name="theme">
				<option>Light</option>
				<option>Dark</option>
			</select> 
			View<select name="view">
				<option>Cover</option>
				<option>Listing</option>
			</select> 

			<!--<input placeholder="title" name="title"><br><br>
			<input placeholder="author" name="author"><br><br>
			<input placeholder="description" name="description"><br><br>
			<input placeholder="thumbnail" name="thumb"><br><br>-->
			<input class="button" type="submit" value="Submit Preferences">
		</form>

<?php

include("passwords.php");

if(isset($_COOKIE['sort'])){
	$sort = $_COOKIE['sort']; 
	$sort_list = ['Title' => 1,'Author' => 1];

	if (!isset($sort_list[$sort])) {
  	$sort = 'Title';
	}

	$query = "SELECT * FROM books ORDER BY $sort;";
	
}else {
	$query = 'SELECT * FROM books';
}

$prepared = $mysql->prepare($query);
$prepared->execute();
$book_result = $prepared->get_result();


if(isset($_COOKIE['view'])){
	$view = $_COOKIE['view'];
	if($view == 'Listing'){
		include ("listview.php");
	}else{
		include ("coverview.php");
	}
}
   
?>

		</div>
	</body>
</html>