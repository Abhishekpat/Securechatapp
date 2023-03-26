<?php

	try{
		$bdd = new PDO("mysql:host=localhost;dbname=chat","root","");
		echo "Connect Successfully";
	}catch(Exception $e){
		die("ERROR : " .$e->getMessage());

	}

?>