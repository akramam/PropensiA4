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
	
	$supplierName = $produk = $jmlKilo = $jmlKarton= $tglTerima = $caraTerima = $caraBayar= $idBayar="";
	$supplierNameErr = $produkErr = $jmlKiloErr = $jmlKartonErr = $tglTerimaErr = $caraTerimaErr = $caraBayarErr = "";
	$supplierNameB = $produkB = $jmlKiloB = $jmlKartonB = $tglTerimaB = $caraTerimaB = $caraBayarB = "*";
	$searchErr = "";
	$idPembayaran = 0;
	
	// tanggal pembelian
	$tglBeli = date('Y-m-d');
	echo "<br>";
	echo "Tanggal pembelian: ";
	echo $tglBeli;
	echo "<br>";

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
		if (empty($_POST["jmlKilo"])) {
			$jmlKiloErr = "Number of kilo is required";
			$jmlKiloB = "";
		}
		else {
			$jmlKilo = test_input($_POST["jmlKilo"]);
			if (!preg_match("/^[0-9]*$/",$jmlKilo)) {
				$jmlKiloErr = "Only number allowed";
				$jmlKiloB = "";
			}
		}
		
		//jmlKarton
		if (empty($_POST["jmlKarton"])) {
			$jmlKartonErr = "Number of karton is required";
			$jmlKartonB = "";
		}
		else {
			$jmlKarton = test_input($_POST["jmlKarton"]);
			if (!preg_match("/^[0-9]*$/",$jmlKarton)) {
				$jmlKartonErr = "Only number allowed";
				$jmlKartonB = "";
			}
		}

		//tglTerima
		if (empty($_POST["tglTerima"])) {
			$tglTerimaErr = "Delivery date is required";
			$tglTerimaB = "";
		}
		else {
			$tglTerima = test_input($_POST["tglTerima"]);
			$testtgl  = explode('-', $tglTerima);
					if (count($testtgl) == 3) {
				    	if (date("Y-m-d") > $tglTerima) {
				    		$tglTerimaErr = "Date is expired";
				   		} 
					}
		}

		//caraTerima
		if (empty($_POST["caraTerima"])) {
			$caraTerimaErr = "Cara terima is required";
			$caraTerimaB = "";
		}
		else {
     		$caraTerima = test_input($_POST["caraTerima"]);
   		}
		

		//caraBayar
		if (empty($_POST["caraBayar"])) {
			$caraBayarErr = "Cara bayar is required";
			$caraBayarB = "";
		}
		else {
     		$caraBayar = test_input($_POST["caraBayar"]);
   		}
		
		
	}
	
	if(empty($supplierNameErr) && empty($produkErr) && empty($jmlKiloErr) && empty($jmlKartonErr) && empty($tglTerimaErr) && empty($caraTerimaErr) && empty($caraBayarErr))
	{

		//bikin id beli
		$increments = pg_fetch_array(pg_query("select max(idbeli) from pembelian;"));
		echo $increments[0];
		$idpembelian=$increments[0] + 1 ;
		
		// bikin id bayar pakai if
		// SELECT idbayar FROM pembayaran_out WHERE tgl_trans = '2016-04-05' AND supplier = 'PT. Indoguna';
		$ambilIdBayar = "SELECT idbayar FROM pembayaran_out WHERE tgl_trans = '".$tglBeli."' AND supplier = '".$supplierName."';";
		//$ambilIdBayar = "SELECT idbayar FROM pembayaran_out WHERE tgl_trans = '".$tglBeli."' AND supplier = 'PT. Indoguna';";

		//$kueriIdBayar = pg_fetch_array(pg_query($ambilIdBayar));
		//echo $kueriIdBayar[0];


		if(pg_num_rows(pg_query($ambilIdBayar) == 0))
		{
			$increments2 = pg_fetch_array(pg_query("select max(idbayar) from pembayaran_out;"));
			echo $increments2[0];
			$idPembayaran=$increments2[0] + 1 ;
			echo "belum ada";
			$cobamasukan = "INSERT INTO PEMBAYARAN_OUT VALUES ('".$idPembayaran."', '".$supplierName."', '".$tglBeli."', null, null, null);";
			$cobaresult = pg_query($cobamasukan);
		}
		else
		{
			$idPembayaran=$kueriIdBayar[0];
			echo "sudah ada";	
			echo $idPembayaran;
		}
		//echo $idPembayaran;

		// bikin status delivery pakai default belum
		$statusDelivery = "Belum Diterima";

		// ngaliin harga
		function kali($x, $y) 
		{
    		$z = $x * $y;
    		return $z;
		}

		$ambilHargaProduk = "SELECT harga_beli FROM produk WHERE namaProduk = '".$produk."';";
		$hargaProduk = pg_query($ambilHargaProduk);
		$harga_total= kali($hargaProduk, $jmlKilo);

		echo "<br>";
		echo "5 * 10 = " . kali(5, 10) . "<br>";
		$a=5;
		$b=6;
		$cobaKali= kali($a,$b);
		echo "<br>";
		echo $cobaKali;
		
		//masukin ke db

		if(!empty($idpembelian) && !empty($idPembayaran) && !empty($supplierName) && !empty($produk) && !empty($jmlKilo) && !empty($jmlKarton) && !empty($tglBeli) && !empty($tglTerima) && !empty($caraTerima) && !empty($caraBayar))
		{

			//INSERT INTO PEMBELIAN VALUES ('".$idpembelian."', '".$idPembayaran."', '".$produk."', '2016-04-05', '2016-04-20', 'diantar', 'transfer', 'Belum Diterima', 50000, 20, 50);
			$masukan = "INSERT INTO PEMBELIAN VALUES ('".$idpembelian."', '".$idPembayaran."', '".$produk."', '".$tglBeli."', '".$tglTerima."', '".$caraTerima."', '".$caraBayar."', '".$statusDelivery."', ".$harga_total.", ".$jmlKilo.", ".$jmlKarton.");";
			$result = pg_query($masukan);
			//$masukan = lala;
			//echo " weekend";
		}		
	
	}
		
		//$result = pg_query($masukan);
	
	
		
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	
		
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
		<input class ="input" type="radio" name="caraTerima" <?php if (isset($caraTerima) && $caraTerima=="diantar") echo "checked";?> value="diantar" id="caraTerima" required autofocus>Diantar
		<input class ="input" type="radio" name="caraTerima" <?php if (isset($caraTerima) && $caraTerima=="dijemput") echo "checked";?> value="dijemput" id="caraTerima" required autofocus>Dijemput

		<br><br>

		<!-- cara bayar tunai/transfer -->
		<label for="caraBayar"> Cara Bayar <span class="error"><?php echo $caraBayarB;?></span></label>
		<br><span class="error"><?php echo $caraBayarErr;?></span>
		<input class ="input" type="radio" name="caraBayar" <?php if (isset($caraBayar) && $caraBayar=="cash") echo "checked";?>  value="cash" id="caraBayar" required autofocus>Cash
		<input class ="input" type="radio" name="caraBayar" <?php if (isset($caraBayar) && $caraBayar=="transfer") echo "checked";?>  value="transfer" id="caraBayar" required autofocus>Transfer

				
		<br><br>
		
		<!-- submit -->
		<input id="button" type="submit" value="SUBMIT" />
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