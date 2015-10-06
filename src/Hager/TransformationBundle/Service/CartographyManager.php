<?php

namespace Hager\TransformationBundle\Service;

class CartographyManager
{
	private $cartography;
	
	public function load()
	{
		return $this->cartography;
	}
	
	private function generateReporter()
	{
		$choices = array('Mark Otto', 'Hyam Bolande', 'Ziung Li', 'Fabrice  Potencier', 'Bernhardt Schusseck', 'Matt Yass', 'Robert Deehan', 'Sabine Holztleitner', 'William Durand', 'Rochdi Souani');
		return $choices[rand(0,9)];
	}
	
	private function generateStatus()
	{
		return rand(0,4);	
	}
	
	
	private function generateCode()
	{
	 $str = "";
		$characters = range('A','Z');
 	
 		for ($i = 0; $i < 3; $i++) {
  			$rand = rand(0, 25);
  			$str .= $characters[$rand];
 			}
		$str .='-';
		for ($i = 0; $i < 2; $i++) {
  			$rand = rand(0, 25);
  			$str .= $characters[$rand];
 			}
 		return $str;
	}
	
	private function generateFakeCarto()
	{
		$departments = array(
			"APAC"=>array(
						array("Marketing & Solutions Competence Centre APAC/MENEAT", 2),
						array("Plant Manager Dongguan",1),
						array("Plant Manager Tychy",1),
						array("Sales & Marketing China",2),
						array("Sales & Marketing India",2),
						array("Sales & Marketing Zone ASEAN", 5),
						array("Sales & Marketing Zone PACIFIC", 2),
						array("SSC Supply Chain & Sourcing",1)
						
					),
			"Engineering"=>array(
						array("Electronics Product Engineering", 8),
						array("Enclosures Product Engineering", 9),
						array("Group Engineering Quality", 9),
						array("Group Industrialisation Engineering",7),
						array("Interface Product Engineering", 7),
						array("Power Product Program Management",2),
						array("Protection Product Engineering",9)
						
					),
			"Europe"=>array(
						array("Marketing & Solutions Competence Centre Region Europe", 13),
						array("Sales & Marketing Zone Mid", 1),
						array("Sales and Marketing Efen",5),
						array("Sales and Marketing Zone Central",5),
						array("Sales and Marketing Zone East",8),
						array("Sales and Marketing Zone Mid", 11),
						array("Sales and Marketing Zone North", 9),
						array("Sales and Marketing Zone South",11),
						array("Sales and Marketing Zone West",6),
						array("TBD September 2015", 3)
						
					),
			"Finance"=>array(
						array("Administration & Finance Director France Iboco",1),
						array("APAC controlling manager",1),
						array("Department Assistant",1),
						array("HR Manager",1),
						array("HR Manager Crolles & Annecy (VA/Engineering/OM)",1),
						array("HR Manager site Bischwiller",1),
						array("HR Solutions &Services Director France",1),
						array("Lead shared services (FICO / HR / IT)",1),
						array("Senior HR Manager Engineering & Offer Management France", 1),
						array("Senior HR Manager Engineering & OM Germany",1),
						array("Senior HR Manager Value Chain France",1),
						array("Supply Chain HR",1),
						array("Supply Chain Senior Controller",1)
					),
			"HR"=>array(
						array("HR",1),
						array("HR Solutions & Services",2),
						array("HRBP APAC", 3),
						array("HRBP Engineering, Offer Management", 4),
						array("HRBP Europe zones South, Mid",5),
						array("HRBP Europe zones West, North, Central, East MENEAT & Americas", 5),
						array("HRBP Operations Services, Support functions, Services",3 ),
						array("HRBP Value Chain",3),
						array("Talent Development",6)
					),
			"IT"=>array(),
			"MENEAT & Americas"=>array(
						array("Sales & Marketing Brazil",1),
						array("Sales & Marketing Italy",1),
						array("Sales & Marketing Zone MENEAT",1),
						array("Sales & Marketing Zone North America",1)
					),
			"OM Commercial"=>array(
						array("Commercial Competence Center",8),
						array("Commercial Solution Strategy",3),
						array("Product Line - Control & Command",6),
						array("Product Line - Enclosures & Accessories",9),
						array("Product Line - Fusegar",9),
						array("Product Line - Protection",4)
					),
			"OM Residential"=>array(
						array("Solution Cable Management",6),
						array("Solution Coordination",3),
						array("Solution Home Automation",9),
						array("Solution HTC",6),
						array("Solution Security & Access Control",3),
						array("Solution Unit OEM",11),
						array("Solution Wiring Accessories", 9)
					),
			"Operations Services"=>array(
						array("Business Processes Excellence",4),
						array("Group Industrial Strategy",2),
						array("Group Master Data",6),
						array("Group Quality",5),
						array("Group Sourcing",9)
					),
			"SCD"=>array(
						array("Corporate Development 1",1),
						array("Corporate Development 2",1),
						array("Corporate Strategy Commercial & Electrical Infrastructure",1),
						array("Corporate Strategy Residential & Building Automation",2),
						array("Corporate Strategy Services & New Businesses Models",1),
						array("Market Intelligence",1),
						array("Sustainability",3)
					),
			"Services"=>array(
						array("services", 1)
					),
			"Value Chain"=>array(
						array("Casings Factory",7),
						array("Electro Mechanical Factory",6),
						array("Electronics Factory",9),
						array("Factory Services and Quality",3),
						array("Group Supply Chain",9),
						array("Marketing & Solutions Competence Centre APAC/MENEAT",1)
					),
		);
		
		$countDpt = -1;
		$tot=0;
		foreach($departments as $dpt=>$department)
		{
			if(count($department)<1) continue;
			$countDpt++;
			
				
			foreach($department as $entity)
			{
				for($count=1; $count<=$entity[1]; $count++)
				{
					$entities[] = array(
											'code'=>$this->generateCode(),
											'label'=>$entity[0],
											'reporter'=>$this->generateReporter(),
											'global'=>$this->generateStatus(),
											'inventory'=>$this->generateStatus(),
											'actionPlan'=>$this->generateStatus(),
											'target'=>$this->generateStatus(),
											'hr'=>$this->generateStatus()
											);
				}
				$tot+=$count;
			}
			
			$panel["records"][$countDpt] = array("department"=>$dpt, "entities"=>$entities, "count"=>$tot);
			$entities = null;
			$tot = 0;
		}
		return $panel;
	}
		
	public function __construct()
	{
		if(!$this->cartography) {$this->cartography = $this->generateFakeCarto();}
	}
		
}
