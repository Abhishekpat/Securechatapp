<?php

class user{
	private $UserId,$UserName,$UserMail,$UserPassword;
	//user id
	public function getUserId(){
		return $this->UserId;
	}

	public function setUserId(){
		$this->UserId=$UserId;
	}

	//user name
	public function getUserName(){
		return $this->UserName;
	}

	public function setUserName(){
		$this->UserName=$UserName;
	}

	//User mail
	public function getUserMail(){
		return $this->UserMail;
	}

	public function setUserMail(){
		$this->UserMail=$UserMail;
	}

	//User Password
	public function getUserPassword(){
		return $this->UserPassword;
	}

	public function setUserPassword(){
		$this->UserPassword=$UserPassword;
	}


	public function InsertUser(){
		include "conn.php";
		$req=$bdd->prepare("INSERT INTO users (UserName,UserMail,UserPassword) VALUES (:UserName,:UserMail,:UserPassword)");
		$req->execute(array(
			'UserName'=>$this->getUserName(),
			'UserMail'=>$this->getUserMail(),
			'UserPassword'=>$this->getUserPassword()
		));
	}
	


}
?>