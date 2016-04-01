<?php

// Inialize session
session_start();


/***if (isset($_SESSION['username'])) {
header('location: sukses.php');
}**/

?>

<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset = "UTF-8">
	<title>HOTEL</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
</head>
<body>
    <div class="container">
        <div class = "col-lg-4 ">
            <h1>SISTEM INFORMASI HOTEL</h1>
            <h3>Login Pengguna</h3>
            <div class="well bs-component">
                <form class="form-horizontal" method="post" action="ceklogin.php">
                  <fieldset>
                    
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-4 control-label" required>Username</label>
                      <div class="col-lg-8">
                        <input type="text" class="form-control" id="inputEmail" placeholder="Username" name="username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword" class="col-lg-4 control-label">Password</label>
                      <div class="col-lg-8">
                        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
                      </div>
                    </div>
                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                      </div>
                    </div>
                  </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>
</html>