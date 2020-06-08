<?php 
include '../class/ImageTagging.php';

if(isset($_POST['tagId']) && !empty($_POST['tagId']) && isset($_POST['imageId']) && !empty($_POST['imageId']) && isset($_POST['tagX']) && !empty($_POST['tagX']) && isset($_POST['tagY']) && !empty($_POST['tagY'])){
	$items = new ImageTagging();
	$checkItem = $items->getTagItem($_POST['tagId']);
	if($checkItem->rowCount() == 1){
		$result = $items->setTag($_POST['tagId'], $_POST['imageId'], $_POST['tagX'], $_POST['tagY']);
	}
	
}

 ?>