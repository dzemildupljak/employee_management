<?php
	$id = $_GET['id'];

	$konekcija = new mysqli("localhost","root","","users");
	// Check connection
	if ($konekcija->connect_error)
	{
	    die("Connection failed: " . $konekcija->connect_error);
	} 
	$sql_upit = "DELETE FROM users WHERE id=".$id;
	if ($konekcija->query($sql_upit) === TRUE) 
	{
    	echo "Record deleted successfully";
    	header('Location: data_table.php');
	} 
	else 
	{
	    echo "Error deleting record: " . $konekcija->error;
	}

?>