<?php
	session_start();
	
	$pastalink = $_GET["link"];
	
	$configs = include('config.php');

	// Setting a link to the MySQL datadase
    $link = new mysqli($configs['host'],$configs['username'],$configs['password']);

    if($link->connect_error)
    {
        die("Connection failed" . mysqli_connect_error());
    }
    else
    {
    	mysqli_query($link,"USE PastaCopy");

    $user = $_SESSION["username"];
	$sql = "SELECT * FROM `pastas` WHERE `link`= '$pastalink'" ;
	$result = mysqli_query($link,$sql);
	$N = mysqli_num_rows($result);

	    while($row = $result->fetch_array()) // For every result in the query results
		{			
				if($row['link'] == $pastalink)
				{
					$sql = "UPDATE `pastas` SET `public`=1 WHERE `link`='$pastalink'";
					mysqli_query($link,$sql);
					break;
				}
		}
		header("Location: /php/library.php");
	}

?>