<?php
	$servername = "localhost";
	$username = "TSAD";
	$password = "0]3(Hlxr1t9Z(teu";
	$dbname = "tsad";
	$mysqli = new mysqli($servername, $username, $password, $dbname);


	$sql = "SELECT title FROM assets"; 
	$result = $mysqli->query($sql);
	$json = [];
	while($row = $result->fetch_assoc()){
	    $json[] = $row['title'];
	}
	echo json_encode($json);
	$mysqli->close();
?> 