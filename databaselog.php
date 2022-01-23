<?php 
session_start();
require "mySQLconnection.php";
if($_SESSION["role"]=="elev" || isset($_SESSION["role"])==0)
{
header("Location: login.php");
}

if(isset($_POST["delogare"]))
{
session_destroy();
header("Location: login.php");
}

$utilizatorlist=GetUserForLog();
$rollist=GetRolForLog();
$datelist=GetDateForLog();
$actiunelist=GetActiuneForLog();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- 	link for jQuery and ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- header band with title and navigation menu -->
<style>
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
/* 	background-image: url('https://cdn.asla.org/uploadedImages/CMS/Shop/Bookstore/books.jpg'); */
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
  	<a href="adminpage.php">Administrare</a>
  	<a class="active" href="databaselog.php">Log</a>
    <a href="rezultate.php">Rezultate</a>
  	<form action ="" method="post">
		<button type="delogare" name="delogare">Delogare</button>
	</form>
  </div>
</div>
<style>
        body{ font: 14px sans-serif; }
        .wrapper{float:left; width: 350px; padding: 20px; }
		.wrapper2{float:left; width: 500px; height: 570px; overflow-y:auto; padding: 20px; margin-left:15px; margin-right:15px;}
</style>
</head>
<body>

<div style="overflow-x:auto; height:523px;">
<table class="rezultate">
<thead>
  <tr>
    <th onclick="sortTable(0)">Utilizator</th>
    <th onclick="sortTable(1)">Rol</th> 
  	<th onclick="sortTable(2)">Data si ora</th>
    <th onclick="sortTable(3)">Actiune logica</th>
  </tr>
</thead>
<tbody style="height: 100px; overflow-y:auto; ">
<?php
for($i=0;$i<count($utilizatorlist);$i++){
  echo '<tr>';
    echo '<td style="background-color: #debad3;">'.$utilizatorlist[$i].'</td>';
    echo '<td>'.$rollist[$i].'</td>';
	echo '<td>'.$datelist[$i].'</td>';
	echo '<td>'.$actiunelist[$i].'</td>';
  echo '</tr>';
}
?>
</tbody>
  <tfoot>
    <tr>
    <th>Utilizator</th>
    <th>Rol</th> 
  	<th>Data si ora</th>
    <th>Actiune logica</th> 
    </tr>
  </tfoot>
</table>
</div>

</body>
</html>