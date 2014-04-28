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

if(isset($_POST['genre'])){

    $genre = array();
    foreach ($drummers as $key => $row){
        $genre[$key] = $row['style'];
    }
    
    array_multisort($genre, SORT_ASC, $drummers);
}

if(isset($_POST['name'])){

    $name = array();
    foreach ($drummers as $key => $row){
        $name[$key] = $row['last_name'];
    }
    
    array_multisort($name, SORT_ASC, $drummers);
}

if(isset($_POST['age'])){

    $age = array();
    foreach ($drummers as $key => $row){
        $age[$key] = $row['age'];
    }
    
    array_multisort($age, SORT_ASC, $drummers);
}


foreach($drummers as $drummer){
    if(isset($_POST['favorite'])){
    
        if($drummer['favorite'] == true){
            $div = "<div id='favorite'>";
            include('info.php');
        }else{
            $div = "<div>";
            include('info.php');
        }
    }else{
        include('info.php');
    }
}    
?>
        
    </body>
</html>

