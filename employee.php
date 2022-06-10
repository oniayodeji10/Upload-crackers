<?php
	class Employee{		

		private $id;
		private $name;
		private $address;
		private $salary;
		private $date;
				
		function __construct($id, $name, $address, $salary, $date){
			$this->setId($id);
			$this->setName($name);
			$this->setAddress($address);
			$this->setSalary($salary);
			$this->setDate($date);
			}		
		
		public function getName(){
			return $this->name;
		}
		
		public function setName($name){
			$this->name = $name;
		}
		
		public function getAddress(){
			return $this->address;
		}
		
		public function setAddress($address){
			$this->address = $address;
		}

		public function getSalary(){
			return $this->salary;
		}

		public function setSalary($salary){
			$this->salary = $salary;
		}

		public function getDate(){
			return $this->date;
		}
		
		public function setDate($date){
			$this->date = $date;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getId(){
			return $this->id;
		}

	}
?>