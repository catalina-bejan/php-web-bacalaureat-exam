<?php
session_start();
// Include mySQLconnection file
require "mySQLconnection.php";

$okCNP=0;
$okUsername=1;
$okCNPUsers=1;
if(isset($_POST['submit']) && isset($_POST['cnp']) && isset($_POST['username']) && isset($_POST['password'])){
	$cnp=$_POST['cnp'];
	$username=$_POST['username'];
	$error=0;
	$okCNP=1;
	$okUsername=1;
	$okCNPUsers=1;
	$cnplist=GetAllCnp();
	for($i=0;$i<count($cnplist);$i++){
		if($_POST["cnp"]==$cnplist[$i]){
    //echo "<script type='text/javascript'>alert('Acest CNP exista deja in baza de date!');</script>";
	//alert('Acest CNP exista deja in baza de date!');
			$okCNP=0;
		}
	}
	$usernamelist=GetAllUsername();
	for($i=0;$i<count($usernamelist);$i++){
		if($_POST["username"]==$usernamelist[$i]){
    //echo "<script type='text/javascript'>alert('Acest CNP exista deja in baza de date!');</script>";
	//alert('Acest CNP exista deja in baza de date!');
			$okUsername=0;
		}
	}
	$cnpUserslist=GetAllCnpUsers();
	for($i=0;$i<count($cnpUserslist);$i++){
		if($_POST["cnp"]==$cnpUserslist[$i]){
    //echo "<script type='text/javascript'>alert('Acest CNP exista deja in baza de date!');</script>";
	//alert('Acest CNP exista deja in baza de date!');
			$okCNPUsers=0;
		}
	}
	if($okCNP==0 && $okUsername==1 && $okCNPUsers==1){
    	$_SESSION['user']=$_POST["username"];
    	InsertUser($_POST["cnp"],$_POST["username"],$_POST["password"]);
    	echo "<script type='text/javascript'>alert('User adaugat cu succes!');</script>";
    	echo "<script type='text/javascript'>location.replace('login.php');</script>";
    }else if($okCNPUsers==0){
    	$usernameUsers=GetUsernameUsers($_POST["cnp"]);
    	echo "<script type='text/javascript'>alert('Acest elev si-a creat deja contul, username-ul lui este: ".$usernameUsers."!');</script>";
    	//echo "<script type='text/javascript'>location.replace('crearecont.php');</script>";
    }else if( $okCNP==1){
    	echo "<script type='text/javascript'>alert('Acest elev nu exista inca in baza de date!');</script>";
    	//echo "<script type='text/javascript'>location.replace('crearecont.php');</script>";
    //header('Location: login.php');
    }else if($okUsername==0){
    	echo "<script type='text/javascript'>alert('Numele de utilizator este deja folosit de altcineva, te rog sa alegi unul unic!');</script>";
    	//echo "<script type='text/javascript'>location.replace('crearecont.php');</script>";
    }
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
    <a href="login.php">Logare</a>
    <a class="active" href="crearecont.php">Creare cont</a>
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
        <h2 style="color:#ad2183">Creare cont</h2>
        <p>Va rog sa completati datele pentru crearea contului.</p>
        <form action="" method="post">
        	<div class="form-group">
                <label>CNP</label>
                <input type="text" name="cnp" class="form-control <?php if($okCNP || $okCNPUsers==0) echo "is-invalid";?>" value="<?php echo $cnp; ?>" placeholder="1234567891234" required pattern="[0-9]{13}" title="13 cifre">
<!--                 <span class="help-block"></span> -->
            </div>   
        	<div class="form-group">
                <label>Nume de utilizator</label>
                <input type="text" name="username" class="form-control <?php if($okUsername==0) echo "is-invalid";?>" value="<?php echo $username; ?>" required pattern="[A-Za-z0-9]+" title="Se accepta doar litere si cifre">
<!--                 <span class="help-block"></span> -->
            </div>   
            <div class="form-group">
                <label>Parola</label>
                <input type="password" name="password" class="form-control <?php if($error) echo "is-invalid";?>" required pattern="[A-Za-z0-9]+" title="Se accepta doar litere si cifre">
                <!--<span class="help-block"></span>-->
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Creare cont">
            </div>
        </form>
    </div>
    </div>
</center>
</body>
</html>