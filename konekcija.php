<?php
	  
  $konekcija = new mysqli("localhost","root","","users");
  // Check connection
  if ($konekcija->connect_error)
  {
      die("Connection failed: " . $konekcija->connect_error);
  } 
  
?>