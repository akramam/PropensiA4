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
	
	$supplierName = $produk = $jmlKilo = $jmlKarton= $tglTerima = $caraTerima = $caraBayar= "";
	$supplierNameErr = $produkErr = $jmlKiloErr = $jmlKartonErr = $tglTerimaErr = $caraTerimaErr = $caraBayarErr = "";
	$supplierNameB = $produkB = $jmlKiloB = $jmlKartonB = $tglTerimaB = $caraTerimaB = $caraBayarB = "*";
	$searchErr = "";
	$limit = 10;
	
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//supplierName
		if (empty($_POST["supplierName"])) {
			$supplierNameErr = "Supplier name is required";
			$supplierNameB = "";
		}
		else {
			$supplierName = test_input($_POST["supplierName"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$supplierName)) {
				$supplierErr = "Only letters and white space allowed";
				$supplierB = "";
			}
		}

		//produk
		if (empty($_POST["produk"])) {
			$produk = "Produk is required";
			$produkB = "";
		}
		else {
			$produk = test_input($_POST["produk"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$produk)) {
				$nameLoginErr = "Only letters and white space allowed";
				$nameLoginB = "";
			}
		}
				
		//jmlKilo
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
		
		//jmlKarton
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

		//tglTerima
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

		//caraTerima
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

		//caraBayar
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
		
		//bikin id beli
		//$increments = pg_fetch_array(pg_query("select max(idjenis) from jenis ;"));
		//echo $increments[0];
		//$id=$increments[0] + 1 ;
		
		// bikin id bayar pakai if

		// bikin status delivery pakai default belum

		// ngaliin harga

		//masukin ke db
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
		
		$result = pg_query($masukan);
	}
	
		
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	
	//$_SESSION["cityName"] = $cityName;
	//$_SESSION["checkIn"] = $checkIn;
	//$_SESSION["jmlMalam"] = $jmlMalam;
	//$_SESSION["jmlKamar"] = $jmlKamar;
	
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
		<!-- id purchase order // pakai increment -->
		
		<!-- supplier dropdown -->
		<label for="supplierName"> Supplier <span class="error"><?php echo $supplierNameB;?></span></label>
		<br><span class="error"><?php echo $supplierNameErr;?></span>
		<input class ="input" type="text" name="supplierName" placeholder="Choose your supplier name" id="supplierName" required autofocus> 
				
		<br><br>

		<!-- produk dropdown -->
		<label for="produk"> Produk <span class="error"><?php echo $produkB;?></span></label>
		<br><span class="error"><?php echo $produkErr;?></span>
		<input class ="input" type="text" name="produk" placeholder="Choose the product name" id="produk" required autofocus> 
				
		<br><br>		
				
		<!-- jumlah berat dalam kilo -->
		<label for="jmlKilo"> Jumlah Kilo <span class="error"><?php echo $jmlKiloB;?></span></label>
		<br><span class="error"><?php echo $jmlKiloErr;?></span>
		<input class ="input" type="number" min="1" max="30" name="jmlKilo" placeholder="Enter how many kilo you order" id="jmlKilo" required autofocus> 
		
		<br><br>
		
		<!-- jumlah berat dalam karton -->
		<label for="jmlKarton"> Jumlah Karton <span class="error"><?php echo $jmlKartonB;?></span></label>
		<br><span class="error"><?php echo $jmlKartonErr;?></span>
		<input class ="input" type="number" min="1" max="30" name="jmlKarton" placeholder="Enter how many karton you order" id="jmlKarton" required autofocus> 
		
		<br><br>

		<!-- permintaan tanggal diterima -->
		<label for="tglTerima"> Tanggal Terima <span class="error"><?php echo $tglTerimaB;?></span></label>
		<br><span class="error"><?php echo $tglTerimaErr;?></span>
		<input class ="input" type="date" name="tglTerima" placeholder="Enter your delivery date" id="tglTerima" required autofocus> 
		
		<br><br>

		<!-- cara terima diantar/dijemput-->
		<label for="caraTerima"> Cara Terima <span class="error"><?php echo $caraTerimaB;?></span></label>
		<br><span class="error"><?php echo $caraTerimaErr;?></span>
		<input class ="input" type="radio" name="caraTerima" value="diantar" id="diantar" required autofocus>Diantar
		<input class ="input" type="radio" name="caraTerima" value="dijemput" id="dijemput" required autofocus>Dijemput

		<br><br>

		<!-- cara bayar tunai/transfer -->
		<label for="caraBayar"> Cara Bayar <span class="error"><?php echo $caraBayarB;?></span></label>
		<br><span class="error"><?php echo $caraBayarErr;?></span>
		<input class ="input" type="radio" name="caraBayar" value="cash" id="cash" required autofocus>Cash
		<input class ="input" type="radio" name="caraBayar" value="transfer" id="transfer" required autofocus>Transfer
				
		<br><br>
		
		<!-- submit -->
		<input id="button" type="submit" value="submit" />
		<br><br>
			
				
	</div>	
		<!-- Test Inputan -->
		<?php
			echo "<h2>Your Input:</h2>";
			echo $supplierName;
			echo "<br>";
			echo $produk;
			echo "<br>";
			echo $jmlKilo;
			echo "<br>";
			echo $jmlKarton;
			echo "<br>";
			echo $tglTerima;
			echo "<br>";
			echo $caraTerima;
			echo "<br>";
			echo $caraBayar;
			echo "<br>";
			
		?>
			
	<footer>
		<h5> Created by Fauziah Raihani. 1306383016.</h5>	
	</footer>
	
</body>
</html>