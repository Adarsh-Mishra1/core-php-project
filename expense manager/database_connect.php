<?php
	$db = new mysqli('localhost','root','','exp');
	if(!$db){
		die("Error 1 : Contact Administrator.");
	}
	
function execute_query($query){
	global $db;
	$result = mysqli_query($db, $query);
	return $result;
}
?>