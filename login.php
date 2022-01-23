<?php
session_start();
// Include mySQLconnection file
require "mySQLconnection.php";

$error = false;

	if(isset($_POST["submit"]))
	{
    $username = "";
	$password = "";
    $ready = true;
    // Check if username is set
    if(isset($_POST["username"])){
        $username = $_POST["username"];
    }else{
    	$ready=false;
    }
    
    // Check if password is set
    if(isset($_POST["password"])){
		$password = $_POST["password"];
    } else{
        $ready=false;
    }
    // echo "username $username si parola $password";
    // Validate credentials
    if($ready){
		if($password == GetPasswordByUsername($username))
		{
				$_SESSION['user']=$username;
				$_SESSION['nume']=GetNumeByUsername($username);
				$_SESSION['prenume']=GetPrenumeByUsername($username);
				$_SESSION['role']=GetRoleByUsername($username);
				
				if($_SESSION['role']=='elev'){
					header("Location: elevpage.php");
					//echo $_SESSION['role']; 
				}
				else
                if($_SESSION['role']=='admin'){
					header("Location: adminpage.php");
					//echo $_SESSION['role']; 
				}
				else {
					echo "Eroare de roluri!";
				}
        exit();
		}else {
			$error = true;
			}
		}
    }

if(isset($_POST["rezultate"]))
{
header("Location: rezultate.php");
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Examenul de Bacalaureat</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    

<!-- header band with title and navigation menu -->
<style>
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #380237;
  padding: 10px 10px;
}

.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 5px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #d194bf;
  color: black;
  transition-duration: 0.4s;
}

.header a.active {
  background-color: #d194bf;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
<div class="header">
  <a href="rezultate.php" class="logo">Examenul de Bacalaureat</a>
  <div class="header-right">
    <a href="rezultate.php">Rezultate</a>
    <a class="active" href="login.php">Logare</a>
    <a href="crearecont.php">Creare cont</a>
  </div>
</div>
<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
</style>
</head>
<style>
.centeredborder {
  margin: auto;
  width: 90%;
/*   border: 3px solid #ad2183; */
  background: #d194bf;
  background-clip: border-box;  
  padding: 10px;
}
.centered {
  margin: auto;
  width: 70%;
  padding: 10px;
}
.center {
  margin: auto;
  width: 100%;
  border: 5px solid #ad2183;
  border-radius: 20px;
  padding: 10px;
}
body {
  background-image: url('https://cdn.asla.org/uploadedImages/CMS/Shop/Bookstore/books.jpg');
}
</style>
<body>
<br>
<center>
    <div class="wrapper">
    <div class="center" style="background:#debad3">
        <h2 style="color:#ad2183">Bine ati venit!</h2>
        <p>Va rog sa completati datele pentru autentificare.</p>
        <form action="" method="post">
            <div class="form-group">
                <label>Utilizator</label>
                <input type="text" name="username" class="form-control <?php if($error) echo "is-invalid";?>" value="<?php if(isset($_SESSION['user'])) echo $_SESSION['user']; else echo $username; ?>" required>
<!--                 <span class="help-block"></span> -->
            </div>    
            <div class="form-group">
                <label>Parola</label>
                <input type="password" name="password" class="form-control <?php if($error) echo "is-invalid";?>" required>
                <!--<span class="help-block"></span>-->
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Autentificare">
            </div>
       	 	<div class="form-group">
        		<button type="rezultate" class="btn btn-warning" name="rezultate" formnovalidate>Rezultate</button>
        	</div>
            <p class="centeredborder">Nu aveti un cont inca? <a href="crearecont.php">Creare cont</a>.</p>
        </form>
    </div>
    </div>
</center>
</body>
</html>