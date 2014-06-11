<?php
include("passwords.php");
include("functions.php");

$name = get_name();
$item = get_request('item');
$dueby = get_request('dueby');
$to_delete = get_request('delete');
$imp = get_request('important');

if (isset($_REQUEST["delete"])) {
  
  $delete_query = 'DELETE FROM todolist WHERE id = ?;';
  $delete = $mysql->prepare($delete_query);
  $delete->bind_param("i", $to_delete);
  $delete->execute();

  header("Location: index.php");
}elseif(isset($_REQUEST["update"])){

}else{
	add_item($item, $dueby, $name, $imp);
  header("Location: index.php");
}

if(isset($_REQUEST['logout'])){
	delete_cookie('name');
}

echo ($to_delete);
echo ($_REQUEST['delete']);
?>