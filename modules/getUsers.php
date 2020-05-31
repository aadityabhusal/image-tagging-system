<?php 
include __DIR__.'/../class/ImageTagging.php';

if(isset($_POST['userName']) && !empty(trim($_POST['userName']))){
	$users = new ImageTagging();
	$result = $users->getUsers($_POST['userName']);
	$data = $result->fetchAll();

	foreach ($data as $key => $value) {
		echo "<li class='tagNames' onClick='setTag(this)' data-userid='".$value['user_id']."'>".$value['name']."</li>";
	}
}

 ?>