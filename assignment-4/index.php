<?php

include("passwords.php");

$mysql = new mysqli("localhost", "dayers01", $mysql_pass, "dayers01");

include("filter.php");

$query->execute();

$result = $query->get_result();

include("resultspage.php");

?>

