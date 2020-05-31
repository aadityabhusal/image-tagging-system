<?php 

include __DIR__.'/../class/ImageTagging.php';

if(isset($_POST['imgId']) && !empty($_POST['imgId'])){
	$users = new ImageTagging();
	$result = $users->showTags($_POST['imgId']);
	$data = $result->fetchAll();

	foreach ($data as $key => $value) {
		$gUser = $users->getTagUser($value['user_id']);
		$gUR = $gUser->fetch();
		echo '<div class="tag-box" style="top: '.$value["tag_y"].'px; left: '.$value["tag_x"].'px;" >
				<div class="tag">
					'.$gUR["name"].'
					<div class="tag-close" data-tagId='.$value["tag_id"].' onClick="removeTag(this)">x</div>
				</div>
			</div>';
	}
}



 ?>