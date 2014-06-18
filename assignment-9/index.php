<!doctype html>
<html>
<head>
	<title>Pop Quiz Hotshot</title>
</head>
<body>
<h1>Pop Quiz Hotshot</h1>
<?php
include("bus.php");

$bus_33 = new Bus();

$bus_33->status();

//bus starts at 20 mph
$bus_33->setSpeed(20);
$bus_33->status();

//increase speed to 55 mph
$bus_33->setSpeed(55);
$bus_33->status();
//increase speed to 80 mph for bus jumping awesomeness
$bus_33->setSpeed(80);
$bus_33->status();
//bus slows to 30 mph
$bus_33->setSpeed(30);
$bus_33->status();
//set exploded back to false
$bus_33->exploded = false;
$bus_33->status();
//Dennis Hopper trigger
$bus_33->trigger();
$bus_33->status();
?>

</body>
</html>

