<?php

	if(isset($_POST["employee_id"]))
	{
		include 'konekcija.php';
	 $prikaz_detalja = '';
	 // $conn = mysqli_connect("localhost","root","","testing");
	 $upit_prelgled = "SELECT * FROM tbl_employee WHERE id = '".$_POST["employee_id"]."'";
	 $result = mysqli_query($konekcija,$upit_prelgled);
	 $prikaz_detalja .= '  
	      <div class="table-responsive">  
	           <table class="table table-bordered table-striped">';
	    while($red = mysqli_fetch_array($result))
	    {
	     $prikaz_detalja .= '
	     <tr>  
	            <td width="30%"><label>Name</label></td>  
	            <td width="70%">'.$red["name"].'</td>  
	        </tr>
	        <tr>  
	            <td width="30%"><label>Address</label></td>  
	            <td width="70%">'.$red["address"].'</td>  
	        </tr>
	        <tr>  
	            <td width="30%"><label>Gender</label></td>  
	            <td width="70%">'.$red["gender"].'</td>  
	        </tr>
	        <tr>  
	            <td width="30%"><label>Designation</label></td>  
	            <td width="70%">'.$red["designation"].'</td>  
	        </tr>
	        <tr>  
	            <td width="30%"><label>Age</label></td>  
	            <td width="70%">'.$red["age"].'</td>  
	        </tr>
	     ';
	    }
	    $prikaz_detalja .= '</table></div>';
	    echo $prikaz_detalja;
	}
?>