<?php 
include '../class/ImageTagging.php';

if(isset($_POST['itemName']) && !empty(trim($_POST['itemName']))){
	$items = new ImageTagging();
	$result = $items->getListItems($_POST['itemName']);
	$data = $result->fetchAll();

	foreach ($data as $key => $value) {
		echo "<li class='tagNames' onClick='setTag(this)' data-itemid='".$value[$items->tablePK]."'>".$value['name']."</li>";
	}
}

 ?>