<!DOCTYPE html>
<html>
    <link rel='stylesheet' type='text/css' href='style.php'/>
    <body>
        <h1>The Ultimate Tiny List of Drummers One Specific Dude Really Likes</h1><br>
        <strong>Filter By:  </strong>
        
        <form method = "post">
          
            <input type="checkbox" name='genre' value= "unchecked" >Genre
            <input type="checkbox" name='name' value= "unchecked" >Name
            <input type="checkbox" name='age' value= "unchecked" >Age
            <input type= "Submit" Name = "sor5t" value = "SORT / RESET"><br><br>
            <input type="checkbox" name='favorite' value= "unchecked" >Highlight Favorites
        </form>
        
        
<?php 
  
$div = "<div>";
?>

<table>
<?php
foreach ($result as $row) {
?>
	<tr> 
		<td><?= <img src= " . $row["image"]" ?>
		<td><?= $row["style"] ?>
<?php
}
?>
</table>
        
    </body>
</html>

