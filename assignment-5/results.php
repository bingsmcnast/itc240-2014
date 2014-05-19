<!doctype html>
<html>

<?php
include("passwords.php");
?>

$select = 'SELECT total_cost, where_spent, when_spent, description FROM expenses;';

$select_prep = $mysql->prepare($select);
//bind
$select_prep->execute();

$receipts = $select_prep->get_result();

foreach($receipts as $receipt){
?>
<div class="output">
    Amount: <b>$<?= $receipt["total_cost"] ?></b><br>
    Location: <?= $receipt["where_spent"] ?><br>
    Date: <?= $receipt["when_spent"]?><br>
    Description: <?= $receipt["description"] ?>

<?php    
    }  

    ?>
</div>
</html>