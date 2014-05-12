<table>
<?php
foreach ($result as $row) {
?>
<tr>
        
        <td><img src="<?= $row["image"] ?>">
        <td class="info">Name: <?= $row["first_name"] . " " . $row["last_name"]?> <br>
        Age: <?= $row["age"] ?><br>
        Style: <?= $row["style"] ?><br>
        
        <a href="<?= $row["website"] ?>">Website</a>
    </tr>   
<?php
}
?>
</table>
        
    </body>
</html>

