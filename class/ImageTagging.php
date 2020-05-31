<?php 
class ImageTagging
{
	public $pdo;
	function __construct()
	{
		try {				
			$this->pdo = new PDO("mysql:host=localhost;dbname=imagetagging;charset=utf8", 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->pdo;
		} catch (PDOException $e) {
			echo "Connection Failed: ".$e->getMessage();
		}
	}

	public function getUsers($value){
		$sql = "SELECT user_id, name FROM users WHERE name LIKE '$value%' LIMIT 5";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function setTag($tagId, $imageId, $tagX, $tagY){
		$sql = "INSERT INTO tags(tag_id, user_id, image_id, tag_x, tag_y) VALUES('',$tagId, $imageId, $tagX, $tagY)";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function showTags($imgId){
		$sql = "SELECT * FROM tags WHERE image_id = $imgId";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function getTagUser($userId){
		$sql = "SELECT name FROM users WHERE user_id = $userId";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function removeTag($tagId){
		$sql = "DELETE FROM tags WHERE tag_id = $tagId";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
}

?>