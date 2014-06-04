<?php


foreach($book_result as $book){

?>
<div class="info">
    	<div class="thumb">
        <img style="border:0;" src="<?= htmlentities($book["thumb"]) ?>">
    </div>
        <div class="title">Title: <b><?= htmlentities($book["title"]) ?></b><br>
    	Author: <b><?= htmlentities($book["author"])?></b>
    </div>
    
  </div>
	
</div>
<?php
}
?>