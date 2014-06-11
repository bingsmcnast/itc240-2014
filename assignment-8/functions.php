<?php



function out($in){
  return htmlentities($in);
}

function make_cookie($name, $value) {
 setcookie($name, $value, time()+60*60*24*30, "/");  
}

function delete_cookie($name){
 setcookie($name, "", 100, "/");
}

function get_request($param) {
  if(isset($_REQUEST[$param])){ 
    return ($_REQUEST[$param]);
  }
  return false;
}

function check_cookie($name){
	if(isset($_COOKIE[$name])){
		return true;
	}
	return false;
}

function get_name() {
	if(check_cookie('name')){
		return $_COOKIE['name'];
		 
	}elseif(isset($_REQUEST['name'])){
		make_cookie('name', get_request('name'));
		return get_request('name');
		
	}else{
		header("Location: name.php");
	}
}

//$name= get_name();

function add_item($item,$due_date,$user, $imp) {
  global $mysql;
  $prepared = $mysql->prepare('INSERT INTO todolist (item, dueby, name, important) VALUES (?, ?, ?, ?);');
  $prepared->bind_param("sssi", $item, $due_date, $user, $imp);
  $prepared->execute();
  
  header("Location: name.php");
  
} 

function get_todo (){
  global $mysql;
  $name = get_name();
  $prepared = $mysql->prepare('SELECT * FROM todolist WHERE name = ?;');
  $prepared->bind_param("s", $name);
  $prepared->execute();
  return $prepared->get_result(); 
}

function input ($name, $placeholder){
  $out = "<input name=$name placeholder=$placeholder></input>";
  return $out;
}

