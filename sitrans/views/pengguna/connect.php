<?php

echo 'Hello world'; 
    $myHost = "localhost";
	$myUser = "postgres";
	$myPassword = "1234";
	$myPort = "5432";
	// Create connection
	$conn = "host = ".$myHost." user = ".$myUser." password = ".$myPassword." port = ".$myPort." dbname = sitrans";
	// Check connection
	
	if (!$database = pg_connect($conn)) {
		die("Connection failed");
	}
	$namahotel = pg_fetch_array(pg_query("select nama from pengguna  ;"));
	$rows = pg_query("select nama from pengguna;");
	echo pg_num_rows($rows);
	echo $namahotel [0];
	

?>