<?php
//This is no secure!!!
				$connect = mysqli_connect("localhost","root","","verkkokauppa");
				if (!$connect) {
				die("Connection failed: " . mysqli_connect_error());
				}
				if (mysqli_connect_errno())
				{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}	
?>					