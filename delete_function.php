<?php
	$id = $_GET['id'];
	$_POST["potvrda_brisanja"] = false;

	$konekcija = new mysqli("localhost","root","","testing");
	// Check connection
	if ($konekcija->connect_error)
	{
	    die("Connection failed: " . $konekcija->connect_error);
	} 
	$sql_upit = "DELETE FROM tbl_employee WHERE id=".$id;
	if ($konekcija->query($sql_upit) === TRUE) 
	{
    	echo "Record deleted successfully";
    	header('Location: tables.php');
		$_POST["potvrda_brisanja"] = true;
	} 
	else 
	{
	    echo "Error deleting record: " . $konekcija->error;
	}

?>