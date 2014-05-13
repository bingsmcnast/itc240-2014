<!DOCTYPE html>
<html>
    <link rel='stylesheet' type='text/css' href='style.css'/>
    <body>
        
        <h1>The Ultimate Tiny List of Drummers One Specific Dude Really Likes</h1><br>
        
        
        <div>
        <strong>Filter By:</strong>
        <form method="post">
            <select class="sort" name="sort_drop">
                <!--<option value="none">None</option> -->
                <option value="last_name">Name</option>
                <option value="age">Age</option>
                <option value="style">Style</option>
            </select>
            <input class="sort" type= "Submit" Name = "sort" value = "Sort"><br>
            <input class="check" type="checkbox" name='filter_alive' value='checked'><strong>Living Drummers Only</strong>
        </form>
        </div>
<?php 

if(!isset($_POST["filter_alive"])){
  $_POST["filter_alive"] = "unchecked";
  $alive = $_POST["filter_alive"];
  }else{
    $alive = $_POST["filter_alive"];
  }

if(isset($_POST["sort_drop"])){
    $acceptableSortValues = ['last_name', 'age', 'style'];
    $sort_on = $_POST["sort_drop"];
    
    if(in_array($sort_on, $acceptableSortValues) && $alive == "checked"){
      $prepared = $mysql->prepare("SELECT * FROM drummers WHERE alive = true ORDER BY $sort_on ASC");
      } else{
          $prepared = $mysql->prepare("SELECT * FROM drummers ORDER BY $sort_on ASC;");
      }
}else{
    $_POST["sort_drop"] = "name";
    $prepared = $mysql->prepare("SELECT * FROM drummers ORDER BY last_name ASC;");
}

//print_r($_POST);

$prepared->execute();
$result = $prepared->get_result();

?>