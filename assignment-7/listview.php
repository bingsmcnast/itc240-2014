<?php

foreach($book_result as $book){

?>
  <div class="info">
    	<div class="title">Title: <b><?= htmlentities($book["title"]) ?></b><br>
    					Author: <b><?= htmlentities($book["author"])?></b>
      </div>
    <div class="descrip">
    	Description:<?= htmlentities($book["description"]) ?> <br>
    	<!--.... <a href="edit.php?delete=<?= $book["id"] ?>">X</a>-->
    </div>
  </div>
	
</div>
<?php
}
?>