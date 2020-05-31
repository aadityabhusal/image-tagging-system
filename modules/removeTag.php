<?php 

include __DIR__.'/../class/ImageTagging.php';


if(isset($_POST['tagId']) && !empty($_POST['tagId'])){
	$delete = new ImageTagging();
	$remove = $delete->removeTag($_POST['tagId']);
}

 ?>