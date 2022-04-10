<?php

/**
 *   Music Class 
 **/

class Music extends Media{
    
    private $album;

    public static function retrieveAllRecords($dbc) {
        $query = "SELECT * from Music";
        $results = $dbc->fetchArray($query);
        return $results;
    }

    public static function deleteRecord($dbc, $title) {
        $query = "DELETE FROM Music WHERE Title = $title";
        $result = $dbc->sqlQuery($query);
        return $result;        
    }
    
    public static function retrieveRecord($dbc, $title) {
        $query = "SELECT * FROM Music WHERE Title = '$title'";
        $result = $dbc->fetchRecord($query);
        $newObj = new Music($result['id'], $result['Title'], $result['ProductionCompany'], $result['YearReleased'], $result['Album']);
        return $newObj; 
    }
    
    public function __construct($id, $title, $productionCompany, $yearReleased, $album) {
        $this->id = $id;
        $this->title = $title;
        $this->productionCompany = $productionCompany;
        $this->yearReleased = $yearReleased;
        $this->album = $album;
    }

    public function createRecord($dbc) {
        $query = "INSERT into Music values ('0', '$this->title', '$this->productionCompany', '$this->yearReleased', '$this->album')";
        $result = $dbc->sqlQuery($query);
        return $result;
    }

    public function updateRecord($dbc) {
        $query = "UPDATE Music SET Title = '$this->title', ProductionCompany = '$this->productionCompany', YearReleased = '$this->yearReleased', Album = '$this->album' WHERE id = '$this->id' ";
        $result = $dbc->sqlQuery($query);
        return $result;        
    }
        
    public function setAlbum($album) {
        $this->album = $album;
    }
    
}

?>