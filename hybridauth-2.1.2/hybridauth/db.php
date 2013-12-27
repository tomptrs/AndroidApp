<?php

class Databank
{
	private $query;
	
	public function __construct()
	{
		//mysql_connect("localhost","root","pba-nodejs");
		//mysql_select_db("pbaea");
		mysql_connect("localhost","root","root");
		mysql_select_db("gotcha");
	}
	
	public function query($str)
	{
		$this->query = mysql_query($str);
		
	}
	
	
	public function fetchArray()
	{		
		return mysql_fetch_array($this->query);
	}
}


?>