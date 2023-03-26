<?php

	//Database connection

	class database_connection
	{

		function connect()
		{

			$connect = new PDO("mysql:host=localhost; dbname=securechatapp", "root", "");

			return $connect;
		}
	}


?>