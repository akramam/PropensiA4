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
	
	session_start();
	
	$cityName = $checkIn = $jmlMalam = $jmlKamar= $orderby1= $orderby2="";
	$cityNameErr = $checkInErr = $jmlMalamErr = $jmlKamarErr = "";
	$cityNameB = $checkInB = $jmlMalamB = $jmlKamarB = "*";
	$searchErr = "";
	$limit = 10;
	
	$offset = $_REQUEST['offset'];
	$pgnum = $_REQUEST['pgnum'];
	$no = $_REQUEST['no'];
		
	if(empty($offset)){
		$offset = 0;
		$pgnum = 1;
		$no = 1;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//cityName
		if (empty($_POST["cityName"])) {
			$cityNameErr = "City name is required";
			$cityNameB = "";
		}
		else {
			$cityName = test_input($_POST["cityName"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$cityName)) {
				$nameLoginErr = "Only letters and white space allowed";
				$nameLoginB = "";
			}
		}
				
		//checkIn
		if (empty($_POST["checkIn"])) {
			$checkInErr = "Check in date is required";
			$checkInB = "";
		}
		else {
			$checkIn = test_input($_POST["checkIn"]);
			$testtgl  = explode('-', $checkIn);
					if (count($testtgl) == 3) {
				    	if (date("Y-m-d") > $checkIn) {
				    		$checkInErr = "Date is expired";
				   		} 
					}
		}
		
		//jmlMalam
		if (empty($_POST["jmlMalam"])) {
			$jmlMalamErr = "Number of nights is required";
			$jmlMalamB = "";
		}
		else {
			$jmlMalam = test_input($_POST["jmlMalam"]);
			if (!preg_match("/^[0-9]*$/",$jmlMalam)) {
				$jmlMalamErr = "Only number allowed";
				$jmlMalamB = "";
			}
		}
		
		//jmlKamar
		if (empty($_POST["jmlKamar"])) {
			$jmlKamarErr = "Number of rooms is required";
			$jmlKamarB = "";
		}
		else {
			$jmlKamar = test_input($_POST["jmlKamar"]);
			if (!preg_match("/^[0-9]*$/",$jmlKamar)) {
				$jmlKamarErr = "Only number allowed";
				$jmlKamarB = "";
			}
		}
	}
	
	if(empty($cityNameErr) && empty($checkInErr) && empty($jmlMalamErr) && empty($jmlKamarErr))
	{
		//tampilkan berdasarkan
		if(test_input($_POST["orderby1"])=="harga"){
			$orderby1="harga";
		}
		else{
			$orderby1="rating";
		}
		
		if(test_input($_POST["orderby2"])=="ascending"){
			$orderby2="ASC";
		}
		else{
			$orderby2="DESC";
		}
		
		//tanggal check out			
		$check_date = $_POST["checkIn"];
		$checkOut = date('Y-m-d',strtotime($check_date." +".$jmlMalam." days"));
		echo "<br>";
		//echo "Tanggal check out: ";
		//echo $checkOut;
		
		
		if(date('w', strtotime($check_date)) == 6 || date('w', strtotime($check_date)) == 0 ){
		$masukan = "SELECT H.Nama AS nama, H.Alamat AS alamat, H.Rating AS rating, H.JmlPerating AS jmlperating, MIN(T.CP_hlibur) AS harga, H.Id_Hotel AS idhotel
					FROM HOTEL H, KOTA_KAB K, TIPE_KAMAR T
					WHERE H.KotaKab = K.Id_KotaKab AND H.Id_Hotel = T.KodeHotel AND K.Nama = '".$cityName."' AND T.KodeHotel IN(
						SELECT U.KodeHotel
						FROM UNIT_KAMAR U, TIPE_KAMAR T
						WHERE T.KodeHotel = U.KodeHotel AND T.NamaTipe = U.NamaTipe AND ((U.KodeHotel, U.NamaTipe, U.NoUnit) NOT IN(
							SELECT PK.KodeHotel, PK.NamaTipe, PK.NoUnit
							FROM PEMESANAN_KAMAR PK, PEMESANAN P
							WHERE P.Kode = PK.KodePemesanan AND 
							(('".$checkIn."' BETWEEN P.TglCheckIn AND (P.TglCheckIn + JmlMalam)) 
							OR ((date '".$checkIn."' + integer '".$jmlMalam."') BETWEEN P.TglCheckIn AND (P.TglCheckIn + JmlMalam))
							OR ((P.TglCheckIn BETWEEN '".$checkIn."' AND (date '".$checkIn."' + integer '".$jmlMalam."')) AND 
								((P.TglCheckIn + P.JmlMalam) BETWEEN '".$checkIn."' AND (date '".$checkIn."' + integer '".$jmlMalam."')))
							)
							)
						)
						GROUP BY U.KodeHotel
						HAVING COUNT (*) > '".$jmlKamar."'
					)
					GROUP BY H.Id_Hotel, H.Alamat, H.Rating, H.JmlPerating, H.Id_Hotel
					ORDER BY ".$orderby1." ".$orderby2."
					limit $limit offset $offset
					;"
					;
		//echo " weekend";
				
		}
		else{
		$masukan = "SELECT H.Nama AS nama, H.Alamat AS alamat, H.Rating AS rating, H.JmlPerating AS jmlperating, MIN(T.CP_hkerja) AS harga, H.Id_Hotel AS idhotel
					FROM HOTEL H, KOTA_KAB K, TIPE_KAMAR T
					WHERE H.KotaKab = K.Id_KotaKab AND H.Id_Hotel = T.KodeHotel AND K.Nama = '".$cityName."' AND T.KodeHotel IN(
						SELECT U.KodeHotel
						FROM UNIT_KAMAR U, TIPE_KAMAR T
						WHERE T.KodeHotel = U.KodeHotel AND T.NamaTipe = U.NamaTipe AND ((U.KodeHotel, U.NamaTipe, U.NoUnit) NOT IN(
							SELECT PK.KodeHotel, PK.NamaTipe, PK.NoUnit
							FROM PEMESANAN_KAMAR PK, PEMESANAN P
							WHERE P.Kode = PK.KodePemesanan AND 
							(('".$checkIn."' BETWEEN P.TglCheckIn AND (P.TglCheckIn + JmlMalam)) 
							OR ((date '".$checkIn."' + integer '".$jmlMalam."') BETWEEN P.TglCheckIn AND (P.TglCheckIn + JmlMalam))
							OR ((P.TglCheckIn BETWEEN '".$checkIn."' AND (date '".$checkIn."' + integer '".$jmlMalam."')) AND 
								((P.TglCheckIn + P.JmlMalam) BETWEEN '".$checkIn."' AND (date '".$checkIn."' + integer '".$jmlMalam."')))
							)
							)
						)
						GROUP BY U.KodeHotel
						HAVING COUNT (*) > '".$jmlKamar."'
						)
					GROUP BY H.Id_Hotel, H.Alamat, H.Rating, H.JmlPerating, H.Id_Hotel
					ORDER BY ".$orderby1." ".$orderby2."
					limit $limit offset $offset
					;"
					;
		//echo " weekday";
						
		}
		$result = pg_query($masukan);
	}
	
		
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	
	$_SESSION["cityName"] = $cityName;
	$_SESSION["checkIn"] = $checkIn;
	$_SESSION["jmlMalam"] = $jmlMalam;
	$_SESSION["jmlKamar"] = $jmlKamar;
	
	pg_close($database);	
?>

<!DOCTYPE html>
<html>
<head>
		<title> Create Purchase Order </title>
		<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
			
</head>

<body>
	<!-- Tanggal hari ini -->
	<div class="form2">	
	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="on" id="search-form" novalidate>
		
		<span class="error"> <?php echo $searchErr;?></span>
		<br>
		<!-- id purchase order -->
		
		<!-- supplier dropdown -->
		<label for="supplierName">Supplier <span class="error"><?php echo $supplierNameB;?></span></label>
		<br><span class="error"><?php echo $supplierNameErr;?></span>
		<input class ="input" type="text" name="supplierName" placeholder="Enter your supplier name" id="supplierName" required autofocus> 
				
		<br><br>
		
		<!-- jenis dropdown -->
		<label for="checkIn">Produk <span class="error"><?php echo $checkInB;?></span></label>
		<br><span class="error"><?php echo $checkInErr;?></span>
		<input class ="input" type="date" name="checkIn" placeholder="Enter your check in date" id="checkIn" required autofocus> 
		
		<br><br>
		
		<!-- merk dropdown -->
		<label for="jmlMalam">Tanggal  <span class="error"><?php echo $jmlMalamB;?></span></label>
		<br><span class="error"><?php echo $jmlMalamErr;?></span>
		<input class ="input" type="number" min="1" max="30" name="jmlMalam" placeholder="Enter how many night you will spend" id="jmlMalam" required autofocus> 
		
		<br><br>
		
		<!-- jumlah berat dalam kilo -->
		<label for="jmlKamar">Jumlah Kamar <span class="error"><?php echo $jmlKamarB;?></span></label>
		<br><span class="error"><?php echo $jmlKamarErr;?></span>
		<input class ="input" type="number" min="1" max="30" name="jmlKamar" placeholder="Enter how many room you need" id="jmlKamar" required autofocus> 
		
		<br><br>
		
		<!-- jumlah berat dalam karton -->
		<!-- permintaan tanggal diterima -->
		<!-- cara terima diantar/dijemput-->
		<!-- cara bayar tunai/transfer -->
		<!-- harga -->
		
		<input id="button" type="submit" value="CARI" />
		<br><br>
			
				
	</div>	
		<!-- Test Inputan -->
		<?php
			//echo "<h2>Your Input:</h2>";
			//echo $cityName;
			echo "<br>";
			//echo $checkIn;
			echo "<br>";
			//echo $jmlMalam;
			echo "<br>";
			//echo $jmlKamar;
			echo "<br>";

		?>
			
	<footer>
		<h5> Created by Fauziah Raihani. 1306383016.</h5>	
	</footer>
	
</body>
</html>