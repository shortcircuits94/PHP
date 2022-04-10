<?php
/**
 * Created by PhpStorm.
 * User: Mac
 * Date: 1/19/18
 * Time: 7:42 AM
 */

class User {
    private $id;
    private $username;
    private $password;

    public function __construct($id, $username, $password) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getUser() {
        return $this->username;
    }
    public function setUser($username) {
        $this->username = $username;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }

    public static function authenticateUser($username, $password) {
        global $dbc;
        $sql = "SELECT * FROM logins WHERE username = '$username' AND password = '$password' LIMIT 1";
        $userRecord = $dbc->fetchArray($sql);
		
    if ($userRecord) {
        $userRecord = array_shift($userRecord);
        $userObj = new self($userRecord['id'], $userRecord['username'], $userRecord['password']);
		return $userObj;
    }
    else {
    return false;
    }
    }

}