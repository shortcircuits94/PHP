<?php
class Media {
	protected $id; 
	protected $title; 
	protected $productionCompany;
	protected $yearReleased;
	
	public function setId($id) {
		$this->id = $id; 
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
	public function getId() {
		return $this->id;
	}

}
?>