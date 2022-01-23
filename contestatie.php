<?php
session_start();
require "mySQLconnection.php";
if($_SESSION["role"]=="admin" || isset($_SESSION["role"])==0)
{
	header("Location: login.php");
}
if(isset($_SESSION["user"])){
	$cnp=GetCnpOfUser($_SESSION["user"]);
}

if(isset($_POST["delogare"]))
{
session_destroy();
header("Location: login.php");
}

if(isset($_POST["adauga"]) && isset($_POST["proba1"]) )
{
	if(GetNotaContForElev($cnp,1)==0.0){
    	if(GetNotaInitForElev($cnp,1)!=0.0){
			UpdateNotaContestatie($cnp,-1.0,GetDenProbaForElev($cnp,1));
        	echo "<script>alert('Ati contestat cu succes proba 1!');</script>";
        }
    	else echo "<script>alert('Deocamdata nu aveti o nota initiala la proba 1, deci nu puteti contesta nota!');</script>";
	}else echo "<script>alert('Ati facut deja contestatie la proba 1, va rog sa aflati nota din pagina Rezultate!');</script>";
}

if(isset($_POST["adauga"]) && isset($_POST["proba2"]) )
{
	if(GetNotaContForElev($cnp,2)==0.0){
    	if(GetNotaInitForElev($cnp,2)!=0.0){
			UpdateNotaContestatie($cnp,-1.0,GetDenProbaForElev($cnp,2));
        	echo "<script>alert('Ati contestat cu succes proba 2!');</script>";
        }
    	else echo "<script>alert('Deocamdata nu aveti o nota initiala la proba 2, deci nu puteti contesta nota!');</script>";
	}else echo "<script>alert('Ati facut deja contestatie la proba 2, va rog sa aflati nota din pagina Rezultate!');</script>";
}

if(isset($_POST["adauga"]) && isset($_POST["proba3"]) )
{
	if(GetNotaContForElev($cnp,3)==0.0){
    	if(GetNotaInitForElev($cnp,3)!=0.0){
			UpdateNotaContestatie($cnp,-1.0,GetDenProbaForElev($cnp,3));
        	echo "<script>alert('Ati contestat cu succes proba 3!');</script>";
        }
    	else echo "<script>alert('Deocamdata nu aveti o nota initiala la proba 3, deci nu puteti contesta nota!');</script>";
	}else echo "<script>alert('Ati facut deja contestatie la proba 3, va rog sa aflati nota din pagina Rezultate!');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contestatie</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
<!-- 	link for jQuery and ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- header band with title and navigation menu -->
<style>
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
	background-image: url('https://i.pinimg.com/originals/4c/c3/5a/4cc35a5eef8deb4b5a5f3165c5c639b6.gif');
	background-position: right top;
	background-size: cover;
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

.header form {
  float: left;
  color: white;
  text-align: center;
  padding: 5px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header form.logo {
  font-size: 25px;
  font-weight: bold;
}

.header form:hover {
  background-color: #d194bf;
  color: black;
  transition-duration: 0.4s;
}

.header form.active {
  background-color: #d194bf;
  color: white;
}

.header button {
  float: left;
  color: white;
  text-align: center;
  padding: 5px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 10px;
  border-radius: 4px;
  background-color: #380237;
}

.header button.logo {
  font-size: 25px;
  font-weight: bold;
}

.header button:hover {
  background-color: #d194bf;
  color: black;
  transition-duration: 0.4s;
}

.header button.active {
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
.center {
  margin: auto;
  max-width: 100%;
  border: 5px solid #ad2183;
  border-radius: 20px;
  padding: 10px;
}

.rezultate {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.rezultate td, .rezultate th {
  border: 1px solid #d194bf;
  padding: 8px;
}

.rezultate tr:nth-child(even){background-color: #debad3;}
.rezultate tr:nth-child(odd){background-color: white;}

.rezultate tr:hover {background-color: #d194bf;}

.rezultate th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ad2183;
  color: white;
  cursor: pointer;
}
</style>
<div class="header">
  <a href="rezultate.php" class="logo">Examenul de Bacalaureat</a>
  <div class="header-right">
  	<a href="elevpage.php"><?php echo $_SESSION['nume']." ".$_SESSION['prenume']; ?></a>
  	<a class="active" href="contestatie.php">Contestatie</a>
    <a href="rezultate.php">Rezultate</a>
  	<form action ="" method="post">
		<button type="delogare" name="delogare">Delogare</button>
	</form>
  </div>
</div>
<style>
        body{ font: 14px sans-serif; }
        .wrapper{float:left; width: 450px; padding: 20px; }
		.wrapper2{float:left; width: 500px; height: 570px; overflow-y:auto; padding: 20px; margin-left:15px; margin-right:15px;}
</style>
</head>
<body>
<style type="text/css">
    .divOuter{
        display:inline;
    }

    .divInner1, .divInner2, .divInner3{
        float:left;
        width:150px;
        height:150px;
        margin-left:3px;
        margin-right:3px;
    }
</style>


<!-- 	<div class="one"> -->
    <div class="wrapper">
    <div class="center" style="background:#debad3">
<!--     <div class="custom-control custom-control-inline"> -->
    <h5>Bifeaza probele la care doresti sa faci contestatie.</h5>
    <br>
        <form action="" method="post">
            <div class="form-group">
                
                <input type="checkbox" name="proba1" value="Proba1">
            	<label style="font-size: 130%"><?php echo GetDenProbaForElev($cnp,1)?></label>
<!--                 <span class="help-block"></span> -->
            </div>    
            <div class="form-group">
                
               	<input type="checkbox" name="proba2" value="Proba2">
            	<label style="font-size: 130%"><?php echo GetDenProbaForElev($cnp,2)?></label>
                <!--<span class="help-block"></span>-->
            </div>
        	<div class="form-group">
				<input type="checkbox" name="proba3" value="Proba3">
            	<label style="font-size: 130%"><?php echo GetDenProbaForElev($cnp,3)?></label>
            </div>
            <div class="form-group">
            <center>
                <input id="submitAdauga" type="submit" name="adauga" class="btn btn-primary" value="Trimite contestatie">
            </center>
            </div>
        </form>
    </div>
    </div>


<!-- prevent resubmit on refresh -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>