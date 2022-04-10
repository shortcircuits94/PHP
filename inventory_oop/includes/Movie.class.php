<?php
class Movie {
	
	public $id; 
	public $title; 
	public $productionCompany;
	public $yearReleased; 
	public $director; 
	
	public function __construct($id, $title, $productionCompany, $yearReleased, $director) {
		$this->id = $id;
		$this->title = $title;
		$this->productionCompany = $productionCompany;
		$this->yearReleased = $yearReleased;
		$this->director = $director;
	}
	
	public function createRecord($dbc) {
		$query = "INSERT into Movies values " . "('0', '$this->title', '$this->productionCompany', "." '$this->YearReleased', '$this->director')";
		$result = $dbc->sqlQuery($query); 
		return $result;
	}
	
	public static function retrieveAllRecords($dbc) {
		$query = "SELECT * from Movies";
		$results = $dbc->fetchArray($query);
		return $results;
	}
	
	public static function deleteRecord($dbc, $title) {
		$query = "DELETE FROM Movies WHERE title = '$title'";
		$result = $dbc->sqlQuery($query); 
		return $result; 
	}
	public static function retrieveRecord($dbc, $title) {
		$query = "SELECT * FROM Movies WHERE Title = '$title' LIMIT 1";
		$result = $dbc->fetchRecord($query); 
		$newObj = new self($result['id'], $result['Title'], $result['ProductionCompany'], $result['YearReleased'], $result['Director']);
		return $newObj;
	}
	
	
	public function setDirector($director) {
		$this->director = $director; 
	}
	public function setTitle($title) {
		$this->title = $title; 
	}
	public function setYear($yearReleased) {
		$this->yearReleased = $yearReleased; 
	}
	public function setProductionCompany($productionCompany) {
		$this->productionCompany = $productionCompany; 
	}
	public function getProductionCompany() {
		return $this->productionCompany;
	}
	public function getTitle() {
		return $this->title;
	}
	public function getYear() {
		return $this->yearReleased;
	}
	public function getDirector() {
		return $this->director;
	}
	
}
?>