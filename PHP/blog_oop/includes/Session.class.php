<?php
/**
 * Created by PhpStorm.
 * User: Mac
 * Date: 1/19/18
 * Time: 7:43 AM
 */
class Session {
    private $userObj;

    public function __construct() {
       session_start();
       if(isset($_SESSION['USEROBJ'])) {
       $this->userObj = $_SESSION['USEROBJ'];
       }
    }
    public function getLoggedInStatus() {
        if ($this->userObj) {
            return true;
        }
        else {
            return false;
        }
    }
    public function getUserObj() {
        return $this->userObj;
    }
    public function loginUser($userObj){
        $this->userObj = $userObj;
        $_SESSION['USEROBJ'] = $userObj;
    }

    public function logoutUser() {
        $this->userObj = false;
        $_SESSION = array();
        session_destroy();
    }

}

$session = new Session();
?>