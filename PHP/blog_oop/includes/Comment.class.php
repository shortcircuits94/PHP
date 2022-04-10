<?php
/**
 * Created by PhpStorm.
 * User: Mac
 * Date: 1/19/18
 * Time: 7:41 AM
 */
class Comment {
    private $id;
    private $blog_id;
    private $dateposted;
    private $name;
    private $comment;

    public static function addComment($blog_id, $name, $comm) {
        global $dbc;
        $sql = "INSERT INTO comments (blog_id, datepost,name,comment) VALUES('$blog_id', NOW(), '$name', '$comm');";
        $dbc->sqlQuery($sql);
    }

    public static function getComments($sql) {
        global $dbc;
		$commentArray == $dbc->fetchArray($sql);
		if(commentArray == false) {
			return false; 
		}
	foreach ($commentArray as $comment) {
		$commentObjArray[] = new self($comment['id'],
		$comment['name'], $comment['comment']);
	}
	return $commentObjArray;

    }
	public function __construct($id, $blog_id, $dateposted, $name, $comment) {
		$this->id = $id;
		$this->blog_id = $blog_id;
		$this->dateposted = $dateposted;
		$this->comment = $comment;
		$this->name = $name;
	}
	public function getId() {
		return $this->id; 
	}
	public function setId($id) {
		$this->id = $id; 
	}
	public function getBlogId() {
		return $this->blog_id; 
	}
	public function setBlodId($blog_id) {
		$this->blog_id = $blog_id; 
	}
	public function getDatePosted() {
		return $this->dateposted; 
	}
	public function setDatePosted($dateposted) {
		$this->datposted = $dateposted; 
	}
	public function getComment() {
		return $this->comment; 
	}
	public function setComment($comment) {
		$this->comment = $comment; 
	}
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

}