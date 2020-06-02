<?php 
class ImageTagging
{
	public $pdo;
	public $host = 'localhost';
	public $dbname = 'imagetagging';
	public $user = 'root';
	public $password = '';
	public $table = 'ourusers';
	
	function __construct()
	{
		try {
			$this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8", $this->user, $this->password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->setTablePK();
			return $this->pdo;
		} catch (PDOException $e) {
			echo "Connection Failed: ".$e->getMessage();
		}
	}

	public function setTablePK(){
		$stmt = $this->pdo->prepare("SHOW KEYS FROM ".$this->table." WHERE Key_name = 'PRIMARY'");
		$stmt->execute();
		$this->tablePK =  $stmt->fetch()['Column_name'];
	}

	public function getUsers($value){
		$sql = "SELECT ".$this->tablePK.", name FROM ".$this->table." WHERE name LIKE '$value%' LIMIT 5";
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
		$sql = "SELECT name FROM ".$this->table." WHERE ".$this->tablePK." = $userId";
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