<?php


require_once "db.php";

class Monitoring
{
	private $db;
	
	public function  __construct()
	{
		$this->db = new Databank();		
	}
	
	public function GetData()
	{
		$sql = "SELECT * FROM SPELERS";
		$this->db->query($sql);		
		
		$json = array();
		while ($line = $this->db->fetchArray() )
		{
			$json[] = $line;
			//print $line;
//			print $line[0];
//			print  $line[1] . " " . $line[2] . "<br>";
		}
			//print $json[0];
			return json_encode($json);	

	}
	
	public function InsertUserInDB($name)
	{
		//INSERT INTO `gocha`.`User` (`Name`, `ID`) VALUES (\'tom\', NULL);
		$sql = "insert into User('Name','ID') VALUES ('{$name}',NULL);	
		$this->db->query($sql);	
	}
	
	
	

}
?>