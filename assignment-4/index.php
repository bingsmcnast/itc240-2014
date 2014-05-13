<?php

include("passwords.php");

$mysql = new mysqli("localhost", "dayers01", $mysql_pass, "dayers01");

include("filter.php");

include("resultspage.php");

?>

