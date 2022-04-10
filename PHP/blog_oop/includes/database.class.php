<?php
/**
 * Created by PhpStorm.
 * User: Mac
 * Date: 1/19/18
 * Time: 7:40 AM
 */

class Database {
    private $connection;

    public function __construct($dbhost, $dbdatabase, $dbuser, $dbpassword) {
        $this->connection = new PDO("mysql:host=".$dbhost.";dbname=".$dbdatabase,$dbuser,$dbpassword);
    }
    public function __destruct() {
        $this->connection = null;
    }
    public function sqlQuery($sql) {
        $dbc = $this->connection;
        $result = $dbc->prepare($sql);
        $result->execute();
        return $result;
    }
    public function fetchArray($sql) {
        $result = $this->sqlQuery($sql);
        if ($result->rowCount() == 0) {
            return false;
        } else {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}

    $dbc = new Database($dbhost, $dbdatabase, $dbuser, $dbpassword);
?>
