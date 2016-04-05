<?php

include "connect.php";

//mengambil variabel username dan password yang diinput dari form
$myusername = $_POST['username'];
$mypassword = $_POST['password'];
$tbl_name = 'pengguna';

//query untuk menampilkan username dan password yang sama dari masukan
$sql = "SELECT * FROM pengguna WHERE username='$myusername' and password='$mypassword'";
$result = pg_query($sql);

//bila hasilnya ada, maka user akan berhasil login dan menuju home.php
$count = pg_num_rows($result);
if ($count == 1) {
    session_start();
    $_SESSION['username'] = $myusername;
    $_SESSION['password'] = $mypassword;
	$role=pg_fetch_array(pg_query("SELECT role FROM pengguna WHERE username='$myusername' and password='$mypassword'"));
	echo $role[0];
	if(strtolower($role[0])=='admin'){

		echo "Masuk ke $role[0]";
	} else if(strtolower($role[0])=='purchasing'){

		echo "Masuk ke $role[0]";
	} else if(strtolower($role[0])=='sales marketing'){

		echo "Masuk ke $role[0]";
	} else if(strtolower($role[0])=='admin inventori'){

		echo "Masuk ke $role[0]";
	} else if(strtolower($role[0])=='finance'){

		echo "Masuk ke $role[0]";
	} else if(strtolower($role[0])=='bod'){

		echo "Masuk ke $role[0]";
	}
}
else{
 echo "tidak sukses login";
}
?>