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
		
		
		while ($line = $this->db->fetchArray() )
		{
			print $line[0];
			print  $line['Name'] . "<br>";
		}
		
		

	}
	
	///
	///
	///
	public function GetMonitoringPerPropertyData($propId,$agentId)
	{
		$sql = "SELECT Value as propName FROM t_monitoring m, t_agent a, t_properties p WHERE m.AgentId = a.Id and m.PropertyId = p.Id and p.Id = '$propId' and a.Id = '$agentId'  ";
		$this->db->query($sql);
		
		
		$teller = 1;
		$json_data = array();
		while ($line = $this->db->fetchArray() )
		{
		
			array_push($json_data, $line[0]);		
		
		}
		$json =  json_encode($json_data);
		return $json;
	}
	
	
	public function GetLatestMonitoringRequest($agentId)
	{
		$sql = "SELECT Max(`When`),`Value`, `Name`, p.Id FROM t_monitoring m, t_properties p WHERE m.PropertyId = p.Id group by p.Id  ";
		
		$this->db->query($sql);
		
		print " <div id='round' style='margin-top:50px;font-size:14px; '><p></p><table><tr><th>Property</th><th>Value</th><th>TimeStamp</th></tr>";
		while ($line = $this->db->fetchArray() )
		{
			print  "<tr><td><a href='#' onclick='showDialog($line[3])'>" .$line[2] . "</a></td><td> " . $line[1] . "</td><td> " . $line[0]. "</td></tr>";
		}
		
		print "</table> <p></p></div>";
		
	}
	
		public function GetLatestMonitoringRequestJSON($agentId)
	{
		$sql = "SELECT Max(`When`),`Value`, `Name`, p.Id FROM t_monitoring m, t_properties p WHERE m.PropertyId = p.Id group by p.Id  ";
		
		$this->db->query($sql);
		
		//print " <div id='round' style='margin-top:50px;font-size:14px; '><p></p><table><tr><th>Property</th><th>Value</th><th>TimeStamp</th></tr>";
		// create a new XML document

$rows = array();
   
   

		while ($line = $this->db->fetchArray() )
		{
			//print  "<tr><td><a href='#' onclick='showDialog($line[3])'>" .$line[2] . "</a></td><td> " . $line[1] . "</td><td> " . $line[0]. "</td></tr>";
			//$rows[] = $line[2];
			 $rows[$line[2]][] =  $line[1];
		}
		
//		print "</table> <p></p></div>";
		return json_encode($rows);	
	}
	
	public function GetLatestMonitoringRequestXML($agentId)
	{
		$sql = "SELECT Max(`When`),`Value`, `Name`, p.Id FROM t_monitoring m, t_properties p WHERE m.PropertyId = p.Id group by p.Id  ";
		
		$this->db->query($sql);
		
		//print " <div id='round' style='margin-top:50px;font-size:14px; '><p></p><table><tr><th>Property</th><th>Value</th><th>TimeStamp</th></tr>";
		// create a new XML document

			
			

	header("Content-Type: text/plain");

 

//create the xml document

$xmlDoc = new DOMDocument();

//create the root element

$root = $xmlDoc->appendChild(

$xmlDoc->createElement("root"));



		
		while ($line = $this->db->fetchArray() )
		{
	
	
   			
			$tutTag = $root->appendChild(
			
				$xmlDoc->createElement("property"));
   
   
			//create the author attribute
			$p = (string)$line[2];
			$v = (string)$line[1];
			$t = (string)$line[0];
			$tutTag->appendChild(

					$xmlDoc->createAttribute("name"))->appendChild(

					$xmlDoc->createTextNode($p) );
			
			$tutTag->appendChild(

					$xmlDoc->createAttribute("value"))->appendChild(

					$xmlDoc->createTextNode($v) );
			
			$tutTag->appendChild(

					$xmlDoc->createAttribute("time"))->appendChild(

					$xmlDoc->createTextNode($t) );
  
		}
		
		
		



//create a tutorial element


//make the output pretty

$xmlDoc->formatOutput = true;



echo $xmlDoc->saveXML();
	}
	

}
?>