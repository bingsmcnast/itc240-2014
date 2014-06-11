<?php
include("passwords.php");
include("functions.php");

$name = get_name();
$results = get_todo();
$item = get_request('item');
$dueby = get_request('dueby');
$delete = get_request('delete');
$imp = get_request('important');


//print_r($_REQUEST);
//print_r($results);
//echo(get_request('delete'));
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Virtual to do</title>
    <link href="style.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <h1><?=$name?><br> To Do List</h1><br>
    <a href="update.php?logout=indeed"><h3>Sign in as different user</h3></a>
    <form action="update.php">
      <!--<input name="item" placeholder="Enter To-Do Item"></input>-->
      <?= input("item", "Enter To-Do Item") ?>
      <!--<input name="dueby" placeholder="Due Date"></input>-->
      <?= input("dueby", "Due Date") ?>
      <button>Add Item</button>
      <input type="checkbox" name="important" value="1"></input>Important
      
    </form>

    <table>
    <thead>
      <tr>
         <th>Item</th>
         <th>Due Date</th>
         <th></th>
      </tr>
    </thead>

<?php
foreach ($results as $result) {
  if($result['important']){	
?>
   <tr class="highlight">
<?php
  }else{
?>
   <tr>
<?php
  }
?> 
        <td><?= out($result['item']) ?>
        <td><?= out($result['dueby']) ?>
        <td>
          <form>
            <!--<input type="submit" value="Delete">-->
            <a href="update.php?delete=<?= $result["id"] ?>">Delete</a>
          </form> 
      </tr>

<?php
}
?>
</table>
</body>
</html>