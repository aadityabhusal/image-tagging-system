<?php 

include __DIR__.'/../class/ImageTagging.php';

if(isset($_POST['tagId']) && !empty($_POST['tagId']) && isset($_POST['imageId']) && !empty($_POST['imageId']) && isset($_POST['tagX']) && !empty($_POST['tagX']) && isset($_POST['tagY']) && !empty($_POST['tagY'])){
	$users = new ImageTagging();
	$checkUser = $users->getTagUser($_POST['tagId']);
	if($checkUser->rowCount() == 1){
		$result = $users->setTag($_POST['tagId'], $_POST['imageId'], $_POST['tagX'], $_POST['tagY']);
	}
	
}

 ?>