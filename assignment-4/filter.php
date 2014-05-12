<!DOCTYPE html>
<html>
    <link rel='stylesheet' type='text/css' href='style.php'/>
    <body>
        
        
        <h1>The Ultimate Tiny List of Drummers One Specific Dude Really Likes</h1><br>
        
        
        <div>
        <strong>Filter By:  </strong>
        <form method="post">
            <select class="sort" name="sort_drop">
                <option value="none">None</option>
                <option value="name">Name</option>
                <option value="age">Age</option>
                <option value="style">Style</option>
            </select><br>
            <input class="sort" type= "Submit" Name = "sort" value = "Sort"><br>
            <input class="check" type="checkbox" name='alive' value= "unchecked" ><strong>Living Drummers Only</strong>
        </form>
        </div>
<?php 

$method = $_SERVER["REQUEST_METHOD"];

$query = $mysql->prepare("SELECT * FROM drummers;");

$sql_root = "SELECT * FROM drummers";
$sort_age = "ORDER BY age ASC";
$sort_name = "ORDER BY last_name ASC";
$sort_style = "ORDER BY style ASC";
$filter_alive = "where alive = true";

if(isset($_POST["sort_drop"])){

    switch ($_POST["sort_drop"]){
        case "name":
            $query = $mysql->prepare("SELECT * FROM drummers ORDER BY last_name ASC;");
            break;
        case "age":
            $query = $mysql->prepare("SELECT * FROM drummers ORDER BY age ASC;");
            break;
        case "style":
            $query = $mysql->prepare("SELECT * FROM drummers ORDER BY style ASC;");
            break;
        default:
            $query = $mysql->prepare("SELECT * FROM drummers;");
            break;
    }
}

$alive_sort = "";

if(isset($_POST['alive'])) {
    $query = $mysql->prepare("SELECT * FROM drummers where alive = true;");

}


?>