<?php
include("passwords.php");

$form_cost = "";
$form_where = "";
$form_when = "";
$form_what = "";
$form_id = "";
$val = 'value="';
$prepop_cost = "";
$prepop_where = "";
$prepop_when = "";
$prepop_what = "";
$prepop_update_id = "";

if (isset($_REQUEST["update"])){
  $header = "Edit Receipt Helper 3.7";
  $get_edit = 'SELECT * FROM expenses where id = ?;';
  $edit_select = $mysql->prepare($get_edit);
  $edit_select->bind_param("i", $_REQUEST["update"]);
  $edit_select->execute();
  $edit_result = $edit_select->get_result();
  $edit_array = $edit_result->fetch_array();
    
    $form_cost = $edit_array["total_cost"];
    $form_where = $edit_array["where_spent"];
    $form_when = $edit_array["when_spent"];
    $form_what = $edit_array["description"];
    $form_id = $edit_array["id"];
    
    $prepop_cost = $val . round($form_cost, 2) . ' "';
    $prepop_where = $val . $form_where . ' "';
    $prepop_when = $val . $form_when . ' "';
    $prepop_what = $val . $form_what . ' "';
    $prepop_update_id = $val . $form_id . ' "';

}elseif (isset($_REQUEST["delete"])) {
  $header = "Receipt Helper 6.9";
  $delete_query = 'DELETE FROM expenses WHERE id = ?;';
  $delete = $mysql->prepare($delete_query);
  $delete->bind_param("i", $_REQUEST["delete"]);
  $delete->execute();
  $header = "Receipt Helper 2.4";

}else{
  $header = "Receipt Helper 2.0";
  
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Receipt Tracking</title>
<link href="css/redmond/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui-1.10.4.custom.js"></script>
<script src="js/script.js"></script>
<link href="style.css" type="text/css" rel="stylesheet">

</head>	
  <body>
    <div class='content'>
    <h1><?= $header ?></h1>
    <form action="index.php" method="post">
      <br>
      <div class='left'>
      	<input name="cost" placeholder="Total Cost" <?= $prepop_cost ?>><br><br>
      	<input name="where" placeholder="Where Spent" <?= $prepop_where ?>><br><br>
        <input name="when" id="datepicker" placeholder="Date"<?= $prepop_when ?>><br><br>
      	<input name="what" placeholder="Description" class ='textbox' <?= $prepop_what ?>></textarea>
  	    <input name="update_id" type="hidden" <?= $prepop_update_id ?>>  
      </div>
      <div class="right">
      	<input class ='button' type="submit" value="Submit"><br>
      	<select name= 'month_sort'>
      		<option value="0" selected>Choose Month</option>
          <option value="100">All</option>
          <option value="1">January</option>
      		<option value="2">February</option>
      		<option value="3">March</option>
      		<option value="4">April</option>
      		<option value="5">May</option>
      		<option value="6">June</option>
      		<option value="7">July</option>
      		<option value="8">August</option>
      		<option value="9">September</option>
      		<option value="10">October</option>
      		<option value="11">November</option>
      		<option value="12">December</option>
      </select>
      </div>
    </form>
  
<?php

if(isset($_REQUEST["month_sort"])){

$month = $_REQUEST["month_sort"];

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cost = $_REQUEST["cost"];
  $where = $_REQUEST["where"];
  $when = $_REQUEST["when"];
  $what = $_REQUEST["what"];
  $id = $_REQUEST["update_id"];
  if($cost == "" || $where == "" || $when == "" || $what == ""){
    if($month =="0"){
      echo "<h2>Please fill in all fields</h2>";
    }
  }else{ 

    if ($id) {
      $query = 'UPDATE expenses SET total_cost=?, where_spent=?, when_spent=?, description=? WHERE id=?';
    
      $update = $mysql->prepare($query);
      $update->bind_param("dsssi", $cost, $where, $when, $what, $id);
      $update->execute();
  
    }else{
      $query = 'INSERT INTO expenses (total_cost, where_spent, when_spent, description) VALUES (?, ?, ?, ?);';

      $prepared = $mysql->prepare($query);
      $prepared->bind_param("dsss", $cost, $where, $when, $what);
      $prepared->execute();

    }
  }   
}

if(isset($month) && $month !=="0" && $month !=="100"){
  $select = 'SELECT total_cost, where_spent, when_spent, description, id FROM expenses where MONTH(when_spent) = ? ;';
  $select_prep = $mysql->prepare($select);
  $select_prep->bind_param("s", $_REQUEST["month_sort"]);	
}else{
  $select = 'SELECT total_cost, where_spent, when_spent, description, id FROM expenses;';
  $select_prep = $mysql->prepare($select);
}

$select_prep->execute();

$receipts = $select_prep->get_result();
?>
  <table class="output2">
    <thead>
      <tr>
        <th>Amount</th>
        <th>Location</th>
        <th>Date</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php

$i=0;
foreach($receipts as $receipt){
$i++;

if($i%2==0){
  echo '<tr class="even">';
}else{
  echo '<tr class="odd">';
  
}
?>
      <td><b>$<?= round($receipt["total_cost"],2) ?></b>
    	<td><?= $receipt["where_spent"] ?>
    	<td>Date: <?= $receipt["when_spent"]?>
    	<td><?= $receipt["description"] ?>
      <td><a href="?update=<?= $receipt["id"] ?>"><img style="border:0;" src="edit.png"></a>
      <td><a href="?delete=<?= $receipt["id"] ?>"><img style="border:0;" src="delete.png"></a>  
    </tr>
   
<?php    
    }  

    ?>

  </div>
  </div>
 </body>

</html>