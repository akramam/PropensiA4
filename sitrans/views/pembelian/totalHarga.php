<?php
	$myHost = "localhost";
	$myUser = "postgres";
	$myPassword = "1234";
	$myPort = "5432";
	
	// Create connection
	$conn = "host = ".$myHost." user = ".$myUser." password = ".$myPassword." port = ".$myPort." dbname = sitrans";
	
	// Check connection
	if (!$database = pg_connect($conn)) {
		die("Could not connect to database");
	}
	// Test
	$namapengguna = pg_fetch_array(pg_query("select nama from pengguna  ;"));
	$rows = pg_query("select nama from pengguna;");
	echo pg_num_rows($rows);
	echo $namapengguna [0];

	$tglBeli = date('Y-m-d');
	$tambah = 0;
	$id = 0;
	$harga = 0;
	//
	$result = pg_query(("SELECT idbayar, SUM(harga_total) FROM PEMBELIAN WHERE tgl_beli = '2016-04-09' GROUP BY idbayar;"));
		echo pg_num_rows($result);
			
			while ($row = pg_fetch_row($result)) {
				echo $row[0];
				echo $row[1];
				$update = "UPDATE PEMBAYARAN_OUT SET JumlahBayar = '".$row[1]."' WHERE IdBayar ='".$row[0]."';";
				$isi = pg_query($update);
			}

	<a href="http://localhost/PropensiA4/sitrans/web/pembelian/index">;
?>