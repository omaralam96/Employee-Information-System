<?php
	include_once('database.php');

	class employee extends Database{
		function __construct($id) {
			$sql = "SELECT * FROM employee WHERE id = $id;";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}

		public  function add() {
			$sql = "INSERT INTO employee (name,age,salary,departament) VALUES (?,?,?,?)";
			Database::$db->prepare($sql)->execute([$this->name,$this->age,$this->salary,$this->departament]);
		}
		
		public function delete() {
			$sql = "DELETE FROM employee WHERE id = $this->id;";
			Database::$db->query($sql);
		}

		public function save() {
			$sql = "UPDATE employee SET name = ? ,age = ? ,salary = ? ,departament = ? WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$this->name,$this->age,$this->salary,$this->departament,$this->id]);
		}

		public static function all($keyword) {
			$keyword = str_replace(" ", "%", $keyword);
			$sql = "SELECT * FROM employee WHERE name like ('%$keyword%');";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$employee = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$employee[] = new employee($row['id']);
			}
			return $employee;
		}
	}
?>