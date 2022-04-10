<?php
/**
 * Created by PhpStorm.
 * User: Mac
 * Date: 1/19/18
 * Time: 7:41 AM
 */
class Category {
	private $id;
	private $cat;
	public static function addCategory($catName) {
		global $dbc; 
		$sql = "INSERT INTO categories (cat) VALUES ('". $catName ."')";
		$dbc->sqlQuery($sql);
	}
	
	public static function getAllCats() {
		global $dbc; 
		$sql = "SELECT * FROM categories";
		$categoryArray = $dbc->fetchArray($sql);
		if ($catgoryArray == false) {
			return false;
		}
		foreach ($categoryArray as $category) {
			$categoryObjArray[] = new self($category['id'], $category['cat']);
		}
		return $categoryObjArray;
	}
		
	public static function getCategory($sql) {
		global $dbc;
		$categoryArray = $dbc->fetchArray($sql);
		if ($categoryArray == flase) {
			return false; 
		}
		foreach ($categoryArray as $category) {
			$categoryObjArray[] = new self($category['id'], $category['cat']);
		}
		return $categoryObjArray;
	}
	
	public function __construct($id, $cat) {
		$this->id = $id; 
		$this->cat = $cat;
	}
	public function getId() {
		return $this->id; 
	}
	public function setId($id) {
		$this->id = $id; 
	}
	public function getCat() {
		return $this->cat; 
	}
	public function setCat($cat) {
		$this->cat = $cat; 
	}
}