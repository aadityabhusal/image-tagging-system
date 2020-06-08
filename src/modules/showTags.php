<?php 
include '../class/ImageTagging.php';

if(isset($_POST['imgId']) && !empty($_POST['imgId'])){
	$items = new ImageTagging();
	$result = $items->showTags($_POST['imgId']);
	$data = $result->fetchAll();

	foreach ($data as $key => $value) {
		$gItem = $items->getTagItem($value['item_id']);
		$gUR = $gItem->fetch();
		echo '<div class="tag-box" style="top: '.$value["tag_y"].'px; left: '.$value["tag_x"].'px;" >
				<div class="tag">
					'.$gUR["name"].'
					<div class="tag-close" data-tagId='.$value["tag_id"].' onClick="removeTag(this)">x</div>
				</div>
			</div>';
	}
}



 ?>