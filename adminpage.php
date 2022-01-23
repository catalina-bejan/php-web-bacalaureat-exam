<?php
//ini_set('session.save_path', '/public_html/save_file_for_session.php');
session_start();
require "mySQLconnection.php";
if($_SESSION["role"]=="elev" || isset($_SESSION["role"])==0)
{
header("Location: login.php");
}
// echo "Rolul este: ".$_SESSION["role"];
// echo "  Rolul este setat: ".isset($_SESSION["role"]);
// echo "  Username-ul este : ".$_SESSION["user"];
// echo "  Username-ul este setat: ".isset($_SESSION["user"]);
// echo "  Numele este : ".$_SESSION["nume"];
// echo "  Numele este setat: ".isset($_SESSION["nume"]);
// echo "  Prenumele este : ".$_SESSION["prenume"];
// echo "  Prenumele este setat: ".isset($_SESSION["prenume"]);
// echo "  Ai ajuns in pagina de admin!";

$liceelist=GetLicee();
//$profilelist=GetProfileForSelectedLiceu('Liceul Teoretic "Dunarea"');//trebuie cu ajax ca sa se schimbe in timp real

if(isset($_POST["delogare"]))
{
session_destroy();
header("Location: login.php");
}

if(isset($_GET["selectedLiceuPHP"]))
{
	$profilelist=GetProfileForSelectedLiceu($_GET["selectedLiceuPHP"]);
   	for($i=0;$i<count($profilelist);$i++){                                                
       	echo "<option value='".$profilelist[$i]."'>".$profilelist[$i]."</option>";
    }
exit;
}

if(isset($_GET["adaugaelevPHP"]))
{
	$nume="";
	$prenume="";
	$cnp="";
	$numeEleviList=GetNumeElev($nume,$prenume,$cnp);
	$cnpEleviList=GetCNPElev($nume,$prenume,$cnp);
	$liceuEleviList=GetLiceuElev($nume,$prenume,$cnp);
	$profilEleviList=GetProfilElev($nume,$prenume,$cnp);
   	for($i=0;$i<count($numeEleviList);$i++){                                                
       	  echo '<tr>';
    		echo '<td>'.$numeEleviList[$i].'</td>';
			echo '<td>'.$cnpEleviList[$i].'</td>';
			echo '<td>'.$liceuEleviList[$i].'</td>';
			echo '<td>'.$profilEleviList[$i].'</td>';
    		echo '<td><button id ="stergebutton'.$i.'" class="btn btn-danger"><i class="fa fa-trash"></i>Sterge</button></td>';
  		  echo '</tr>';
    }
exit;
}

// if(isset($_GET["adaugaelevindbPHP"])){
if(isset($_POST["adauga"]) && isset($_POST["nume"]) && isset($_POST["prenume"]) && isset($_POST["cnp"]) && isset($_POST["liceucombobox"]) && isset($_POST["profilcombobox"]) )
{
	$error=0;
	$cnplist=GetAllCnp();
	for($i=0;$i<count($cnplist);$i++){
	if($_POST["cnp"]==$cnplist[$i]){
    //echo "<script type='text/javascript'>alert('Acest CNP exista deja in baza de date!');</script>";
	//alert('Acest CNP exista deja in baza de date!');
	$error=1;
	}
	}
	if($error==0){
	InsertElev($_POST["nume"],$_POST["init"],$_POST["prenume"],$_POST["cnp"],$_POST["liceucombobox"],$_POST["profilcombobox"]);
    //echo "<script type='text/javascript'>alert('Elev adaugat cu succes!');</script>";
    }
	unset($_POST["adauga"]);
	unset($_POST["nume"]);
	unset($_POST["init"]);
	unset($_POST["prenume"]);
	unset($_POST["cnp"]);
	unset($_POST["liceucombobox"]);
	unset($_POST["profilcombobox"]);
	//$error=0;
}

if(isset($_POST["update"]) && isset($_POST["numeUpdate"]) && isset($_POST["prenumeUpdate"]) )
{	
	$cnp="";
	$cnp=$_SESSION["cnpupdate"];
	 if(isset($_SESSION["cnpupdate"])){
    	if($_POST["proba3combobox"] != "nu a ales inca"){
			// echo "<script type='text/javascript'>alert('Update elev si proba!');</script>";
        	//some SQL syntax when I try to update elev and proba 
        	UpdateElevAndProba($_POST["numeUpdate"],$_POST["initUpdate"],$_POST["prenumeUpdate"],$cnp,$_POST["proba3combobox"],$_POST["nota1Update"],$_POST["nota2Update"],$_POST["nota3Update"]);
		}
    	else{
        	// echo "<script type='text/javascript'>alert('Update doar la elev!');</script>";
        	UpdateElev($_POST["numeUpdate"],$_POST["initUpdate"],$_POST["prenumeUpdate"],$cnp,$_POST["nota1Update"],$_POST["nota2Update"]);
        }
     }
	unset($_SESSION["cnpupdate"]);
}
// exit;
// }
//$_SESSION["cnp"]="";
if(isset($_GET["cnptodeletePHP"]))
{
	DeleteElev($_GET["cnptodeletePHP"]);
	//sterg elevul apeland deleteelev(cnp)
	//sterg elementele din tabel si il reumplu cu valorile din baza de date
	//echo "cnp setat cu valoarea: ".$_GET["cnpPHP"];
	$nume="";
	$prenume="";
	$cnp="";
	$numeEleviList=GetNumeElev($nume,$prenume,$cnp);
	$cnpEleviList=GetCNPElev($nume,$prenume,$cnp);
	$liceuEleviList=GetLiceuElev($nume,$prenume,$cnp);
	$profilEleviList=GetProfilElev($nume,$prenume,$cnp);
   	for($i=0;$i<count($numeEleviList);$i++){                                                
       	  echo '<tr>';
    		echo '<td>'.$numeEleviList[$i].'</td>';
			echo '<td>'.$cnpEleviList[$i].'</td>';
			echo '<td>'.$liceuEleviList[$i].'</td>';
			echo '<td>'.$profilEleviList[$i].'</td>';
    		echo '<td><button id ="stergebutton'.$i.'" class="btn btn-danger"><i class="fa fa-trash"></i>Sterge</button></td>';
  		  echo '</tr>';
    }
echo "|";//to split response into 2 responses for 2 tables
	$numeEleviContList=GetNumeForContestatie();
	$cnpEleviContList=GetCNPForContestatie();
	$probaContEleviList=GetProbaForContestatie();
	$notaContList=GetNotaContForContestatie();
	for($i=0;$i<count($numeEleviContList);$i++){
  		echo '<tr>';
    		echo '<td>'.$numeEleviContList[$i].'</td>';
			echo '<td>'.$cnpEleviContList[$i].'</td>';
			echo '<td>'.$probaContEleviList[$i].'</td>';
			if($notaContList[$i]<0)
   				echo '<td onclick="getCnpElevFromTable('.$i.')"><input id ="updateCont'.$i.'" type="number" name="updateCont'.$i.'" class="form-control" min="0" max="10.00" step="0.01" value=""></td>';
			else
				echo '<td onclick="getCnpElevFromTable('.$i.')"><input id ="updateCont'.$i.'" type="number" name="updateCont'.$i.'" class="form-control" min="0" max="10.00" step="0.01" value='.$notaContList[$i].'></td>';
  		echo '</tr>';
	}
	//echo "<script> var cnp=deleteElevFromTable(".$_GET["cnpPHP"]."); document.write(cnp);</script>";
	//unset($_SESSION["cnp"]);
	//unset($_GET["cnpPHP"]);
exit;
}

if(isset($_GET["cnptoupdatePHP"]))
{
//voi avea nevoie de nume,init tata, prenume, probe, note din inputuri ca sa actualizez elevul
	//UpdateElev($_GET["cnptodeletePHP"]);
	//sterg elevul apeland deleteelev(cnp)
	//sterg elementele din tabel si il reumplu cu valorile din baza de date
	//echo "cnp setat cu valoarea: ".$_GET["cnpPHP"];
	$proba3="";
	$nota_init3="";
	$cnp=$_GET["cnptoupdatePHP"];
	$_SESSION["cnpupdate"]=$cnp;
	$numeElev=GetNumeForElev($cnp);
	$initElev=GetInitForElev($cnp);
	$prenumeElev=GetPrenumeForElev($cnp);
	$proba1=GetDenProbaForElev($cnp,1);
	$proba2=GetDenProbaForElev($cnp,2);
	$proba3=GetDenProbaForElev($cnp,3);
	$nota_init1=GetNotaInitForElev($cnp,1);
	$nota_init2=GetNotaInitForElev($cnp,2);
	$nota_init3=GetNotaInitForElev($cnp,3);                                            
       	echo "|";
		echo $numeElev;
		echo "|";
		echo $initElev;
		echo "|";
		echo $prenumeElev;
		echo "|";
		echo $proba1;
		echo "|";
		echo $proba2;
		echo "|";
		if($proba3 == "")
        	echo "nu a ales inca";
        else echo $proba3;
		echo "|";
		echo $nota_init1;
		echo "|";
		echo $nota_init2;
		echo "|";
		if($nota_init3 == "")
        	echo 0.00;
        else echo $nota_init3;
		echo "|";
		$proba3list=GetAllProba3ForProfil($cnp);
		for($i=0;$i<count($proba3list);$i++){ 
		echo "<option value='".$proba3list[$i]."'>".$proba3list[$i]."</option>";
        }
exit;
}

if(isset($_GET["triggerContestatie"]))
{
	for($i=0;$i<count($_GET["cnpContArrayPHP"]);$i++){
		if ($_GET["notaContArrayPHP"][$i] != "" && $_GET["notaContArrayPHP"][$i] >= 1){
    		UpdateNotaContestatie($_GET["cnpContArrayPHP"][$i],$_GET["notaContArrayPHP"][$i],$_GET["probaContArrayPHP"][$i]);
    	}
	}
exit;
}

$nume="";
$prenume="";
$cnp="";
$numeEleviList=GetNumeElev($nume,$prenume,$cnp);
$cnpEleviList=GetCNPElev($nume,$prenume,$cnp);
$liceuEleviList=GetLiceuElev($nume,$prenume,$cnp);
$profilEleviList=GetProfilElev($nume,$prenume,$cnp);
$numeEleviContList=GetNumeForContestatie();
$cnpEleviContList=GetCNPForContestatie();
$probaContEleviList=GetProbaForContestatie();
$notaContList=GetNotaContForContestatie();

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
  	<a class="active" href="adminpage.php">Administrare</a>
  	<a href="databaselog.php">Log</a>
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
<script>
//fill profile combobox when liceu combobox is selected
$(document).ready(function(){
  $("#liceucombobox").change(function(){
    // $(this).css("background-color", "#D6D6FF");
   // $("#profilcombobox").css("background-color", "red");
    $("#profilcombobox").find('option').remove();
  	var selectedLiceu = $('#liceucombobox').val();
  	$.ajax({
    	type:"get",
    	data: {
        	selectedLiceuPHP: selectedLiceu
        },
    	success: function(response){
        	$("#profilcombobox").append('<option disabled selected value> -- Selecteaza profilul -- </option>' + response);
        }
    });
  });
});

//add elev to database
/*$(document).ready(function(){
  $("#submit").onmousedown(function(e){
  e.preventDefault();
  //e.preventDefault();
    // $(this).css("background-color", "#D6D6FF");
   // $("#profilcombobox").css("background-color", "red");
    //$("#profilcombobox").find('option').remove();
  	//var selectedLiceu = $('#liceucombobox').val();
  	$.ajax({
    	type:"get",
    	data: {
        	adaugaelevindbPHP: 1
        },
    	success: function(response){
        	$("document").html(response);
        }
    });
  //e.preventDefault();
  //this.preventDefault();
  });
});
*/

//add elev to table when adauga elev button is pressed
$(document).ready(function(){
  $("#submit").onmouseup(function(e){
  //e.preventDefault();
  //e.preventDefault();
    // $(this).css("background-color", "#D6D6FF");
   // $("#profilcombobox").css("background-color", "red");
    //$("#profilcombobox").find('option').remove();
  	//var selectedLiceu = $('#liceucombobox').val();
  	var valoare="ok"; 
  	$.ajax({
    	type:"get",
    	data: {
        	adaugaelevPHP: valoare
        },
    	success: function(response){
        	$("#tabel").append(response);
        }
    });
  //e.preventDefault();
  //this.preventDefault();
  });
});

//delete elev button sterge click
$(document).ready(function(){
  $("#rezultate").on("click", "tr",function(){
    // $(this).css("background-color", "#D6D6FF");
   // $("#profilcombobox").css("background-color", "red");
    //$("#profilcombobox").find('option').remove();
  //alert($( this ).text());	
  var rowIndex = this.rowIndex;
  var cnp = getCnpElevFromTable(rowIndex);
  //$('#rezultate').find('thead').remove()
  //$('#rezultate').find('tbody').remove()
  //$('#rezultate').find('tfoot').remove()
   // alert('hello '+ cnp);
  	$("#proba3combobox").find('option').remove();
  	$.ajax({
    	type:"get",
    	data: {
        	cnptoupdatePHP: cnp
        },
    	success: function(response){
        	var res = response.split("|");
        	$('#numeUpdate').val(res[1]);
        	$('#initUpdate').val(res[2]);
        	$('#prenumeUpdate').val(res[3]);
        	$('#proba1Update').val(res[4]);
        	$('#proba2Update').val(res[5]);
        	$('#nota1Update').val(res[7]);
        	$('#nota2Update').val(res[8]);
        	$('#nota3Update').val(res[9]);
        	$('#proba3combobox').append('<option disabled value> -- Selecteaza proba3 -- </option><option selected value="'+res[6]+'">'+ res[6] +'</option>'+res[10]);
        	// alert(response);
        }
    });
   });
});

function getCnpElevFromTable(i) {
  var table, rows, i, cnp;
	//alert('salut');
  table = document.getElementById("rezultate");
    rows = table.rows;
	//cnp is the column at index 1
      cnp = rows[i].getElementsByTagName("TD")[1];
	  //returnez cnp-ul elevului ce trebuie sters
	  //$_GET['cnp']=cnp;
	  return cnp.innerHTML;
	  //alert(cnp.innerHTML);
}

//using only button to delete elev
$(document).ready(function(){
  $("#rezultate").on("click","button",function(){
    // $(this).css("background-color", "#D6D6FF");
   // $("#profilcombobox").css("background-color", "red");
    //$("#profilcombobox").find('option').remove();
  //alert($( this ).text());	
  //alert("vreau numele "+$(this).attr('id'));
  var idButon=$(this).attr('id');
  var rowIndex = idButon.substring(12, idButon.length);
  //alert("indexul "+rowIndex);
  var cnp = getCnpElevFromTable(parseInt(rowIndex)+1);
  $('#rezultate').find('thead').remove();
  $('#rezultate').find('tbody').remove();
  $('#rezultate').find('tfoot').remove();
  $('#tabelcontestatie').find('thead').remove();
  $('#tabelcontestatie').find('tbody').remove();
  $('#tabelcontestatie').find('tfoot').remove();
   //alert('hello '+ cnp);
  	$.ajax({
    	type:"get",
    	data: {
        	cnptodeletePHP: cnp
        },
    	success: function(response){
        	//$(document).html(response);
        	var res = response.split("|");
        	$('#rezultate').append('<thead><tr><th onclick="sortTable(0)">Nume</th><th onclick="sortTable(1)">CNP</th> <th onclick="sortTable(2)">Liceu</th><th onclick="sortTable(3)">Profil</th><th>Sterge</th></tr></thead><tbody style="height: 100px; overflow-y:auto; ">'+res[0]+'</tbody> <tfoot> <tr> <th>Nume</th> <th>CNP</th>  <th>Liceu</th>  <th>Profil</th> <th>Sterge</th> </tr></tfoot>');
        	//alert(response);
        	$('#numeUpdate').val("");
        	$('#initUpdate').val("");
        	$('#prenumeUpdate').val("");
  			$('#proba1Update').val("");
  			$('#proba2Update').val("");
        	$('#nota1Update').val("");
  			$('#nota2Update').val("");
  			$('#nota3Update').val("");
        	$("#proba3combobox").find('option').remove();
        	$('#tabelcontestatie').append('<thead><tr><th onclick="sortTable(0)">Nume</th><th onclick="sortTable(1)">CNP</th> <th onclick="sortTable(2)">Proba</th><th onclick="sortTable(3)">Nota contestatie</th></tr></thead><tbody style="height: 100px; overflow-y:auto; ">'+res[1]+'</tbody> <tfoot> <tr> <th>Nume</th> <th>CNP</th>  <th>Proba</th>  <th>Nota contestatie</th> </tr></tfoot>');
        }
    });
   });
});

$(document).ready(function(){
  $("#AdaugaContestatie").on("click",function(){
  var trigger="true";
  // var arrayCNPCont=$('#rezultate');
  var tableVar = document.getElementsByName("tabelcontestatie");
  table=tableVar[0];
    rows = table.rows;
  // alert('ajunge aici '+ $("#updateCont"+(1-1)+"").val());
  	var cnpContArray=[];
    var probaContArray=[];
    var notaContArray=[];
	//cnp is the column at index 1
	for(var i=1;i<rows.length-1;i++){
      cnpContArray[i-1] = rows[i].getElementsByTagName("TD")[1].innerHTML;
      probaContArray[i-1] = rows[i].getElementsByTagName("TD")[2].innerHTML;
  	  notaContArray[i-1] = $("#updateCont"+(i-1)+"").val();
    }
  	$.ajax({
    	type:"get",
    	data: {
        	triggerContestatie: trigger,
        	cnpContArrayPHP: cnpContArray,
        	probaContArrayPHP: probaContArray,
        	notaContArrayPHP: notaContArray
        },
    	success: function(response){
        	// alert(response);
        	//alert(cnpContArray[1]);
        }
    });
   });
});

</script>
<!-- <form action ="" method="post">
<button type="submit" name="submit">Logout</button>
</form> -->

<!-- css to align multiple divs horizontally -->
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

<div class="divOuter">
<!-- 	<div class="one"> -->
    <div class="wrapper">
    <div class="center" style="background:#debad3">
<!--     <div class="custom-control custom-control-inline"> -->
        <form action="" method="post">
            <div class="form-group">
                <label>Nume</label>
                <input type="text" name="nume" class="form-control" placeholder="Popescu" required pattern="[-A-Za-z]+" title="Se accepta doar litere si '-'">
<!--                 <span class="help-block"></span> -->
            </div>    
            <div class="form-group">
                <label>Initiala tata</label>
                <input type="text" name="init" class="form-control" placeholder="A" required pattern="[A-Za-z]" title="Se accepta o singura litera">
                <!--<span class="help-block"></span>-->
            </div>
            <div class="form-group">
                <label>Prenume</label>
                <input type="text" name="prenume" class="form-control" placeholder="Ion" required pattern="[-A-Za-z]+" title="Se accepta doar litere si '-'">
                <!--<span class="help-block"></span>-->
            </div>
            <div class="form-group">
                <label>CNP</label>
                <input type="text" name="cnp" class="form-control <?php if($error) echo "is-invalid";?>" placeholder="1234567891234" required pattern="[0-9]{13}" title="13 cifre">
                <!--<span class="help-block"></span>-->
            </div>
        	<div class="form-group">
				<!--comboBox  liceu-->
            	<label>Liceu</label>
				<select id="liceucombobox" name="liceucombobox" class="form-control" required>
    				<option disabled selected value> -- Selecteaza liceul -- </option>
				<?php
   					for($i=0;$i<count($liceelist);$i++){                                                
       					echo "<option value='".$liceelist[$i]."'>".$liceelist[$i]."</option>";
    				}
				?>
				</select>
            </div>
            <div class="form-group">
				<!--comboBox  profil-->
            	<label>Profil</label>
				<select id="profilcombobox" name="profilcombobox" class="form-control" required>
    				<option disabled selected value> -- Selecteaza profilul -- </option>
				</select>
            </div>
            <div class="form-group">
                &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;<input id="submitAdauga" type="submit" name="adauga" class="btn btn-primary" value="Adauga elev">
            </div>
        </form>
    </div>
    </div>
<!--     </div> -->

<div class="wrapper2">
<table id="rezultate" class ="rezultate" name="tabel">
<thead>
  <tr>
    <th onclick="sortTable(0)">Nume</th>
    <th onclick="sortTable(1)">CNP</th> 
  	<th onclick="sortTable(2)">Liceu</th>
    <th onclick="sortTable(3)">Profil</th> 
    <th>Sterge</th> 
  </tr>
</thead>
<tbody style="height: 100px; overflow-y:auto; ">
<?php
for($i=0;$i<count($numeEleviList);$i++){
  echo '<tr>';
    echo '<td>'.$numeEleviList[$i].'</td>';
	echo '<td>'.$cnpEleviList[$i].'</td>';
	echo '<td>'.$liceuEleviList[$i].'</td>';
	echo '<td>'.$profilEleviList[$i].'</td>';
	echo '<td onclick="getCnpElevFromTable('.$i.')"><button id ="stergebutton'.$i.'" class="btn btn-danger"><i class="fa fa-trash"></i>Sterge</button></td>';
  echo '</tr>';
}
?>
</tbody>
  <tfoot>
    <tr>
    <th>Nume</th>
    <th>CNP</th> 
  	<th>Liceu</th>
    <th>Profil</th> 
    <th>Sterge</th> 
    </tr>
  </tfoot>
</table>
</div>
</div>

    <div class="wrapper">
    <div class="center" style="background:#debad3">
<!--     <div class="custom-control custom-control-inline"> -->
        <form action="" method="post">
            <div class="form-group">
                <label>Nume</label>
                <input id ="numeUpdate" type="text" name="numeUpdate" class="form-control" required pattern="[-A-Za-z]+" title="Se accepta doar litere si '-'" value="">
<!--                 <span class="help-block"></span> -->
            </div>    
            <div class="form-group">
                <label>Initiala tata</label>
                <input id ="initUpdate" type="text" name="initUpdate" class="form-control" required pattern="[A-Za-z]" title="Se accepta o singura litera">
                <!--<span class="help-block"></span>-->
            </div>
            <div class="form-group">
                <label>Prenume</label>
                <input id ="prenumeUpdate" type="text" name="prenumeUpdate" class="form-control" required pattern="[-A-Za-z]+" title="Se accepta doar litere si '-'">
                <!--<span class="help-block"></span>-->
            </div>
            <div class="form-group" style="display:inline">
            	<label style="width:110px">Limba si literatura romana</label>
            	&emsp;&ensp;&emsp;
            	<label style="width:120px">Nota initiala/absent</label>
            </div>
            <div class="form-group" style="display:inline">
            	<div style="float:left; width:130px;  margin-right:10px;">
                	<input id ="proba1Update" type="text" name="proba1Update" class="form-control" required>
                </div>
            	<div style="float:left; width:130px;  margin-left:10px;">
                	<input id ="nota1Update" type="number" name="nota1Update" class="form-control" min="0" max="10.00" step="0.01" required>
                </div>
            </div>
        <br>
        <br>
        	<div class="form-group" style="display:inline">
            	<label style="width:130px">Disciplina obligatorie a profilului</label>
            	&emsp;
            	<label style="width:120px">Nota initiala/absent</label>
            </div>
            <div class="form-group" style="display:inline">
            	<div style="float:left; width:130px;  margin-right:10px;">
                	<input id ="proba2Update" type="text" name="proba2Update" class="form-control" required>
                </div>
            	<div style="float:left; width:130px;  margin-left:10px;">
                	<input id ="nota2Update" type="number" name="nota2Update" class="form-control" min="0" max="10.00" step="0.01" required>
                </div>
            </div>
        <div class="form-group" style="display:inline">
            	<label style="width:130px">Disciplina la alegere</label>
            	&emsp;
            	<label style="width:120px">Nota initiala/absent</label>
            </div>
            <div class="form-group" style="display:inline">
            	<div style="float:left; width:130px;  margin-right:10px;">
                	<select id="proba3combobox" name="proba3combobox" class="form-control" required>
    					<option disabled value> -- Selecteaza proba3 -- </option>
					</select>
                </div>
            	<div style="float:left; width:130px;  margin-left:10px;">
                	<input id ="nota3Update" type="number" name="nota3Update" class="form-control" min="0" max="10.00" step="0.01">
                </div>
            </div>
        <br>
        <br>
        <br>
        <br>
            <div class="form-group">
                &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;<input id="submitUpdate" type="submit" name="update" class="btn btn-warning" value="Update elev">
            </div>
        </form>
    </div>
    </div>

<!-- contestatie table -->
<div style="display:inline;">
<div style="float:left; align:left; width: 865px; height: 300px; overflow-y:auto; padding: 20px; margin-left:-350px; margin-right:15px;">
<table id="tabelcontestatie" class="rezultate" name="tabelcontestatie">
<thead>
  <tr>
    <th onclick="sortTable(0)">Nume</th>
    <th onclick="sortTable(1)">CNP</th> 
  	<th onclick="sortTable(2)">Proba</th>
    <th onclick="sortTable(3)">Nota contestatie</th> 
  </tr>
</thead>
<tbody style="height: 100px; overflow-y:auto; ">
<?php
for($i=0;$i<count($numeEleviContList);$i++){
  echo '<tr>';
    echo '<td>'.$numeEleviContList[$i].'</td>';
	echo '<td>'.$cnpEleviContList[$i].'</td>';
	echo '<td>'.$probaContEleviList[$i].'</td>';
	if($notaContList[$i]<0)
    echo '<td onclick="getCnpElevFromTable('.$i.')"><input id ="updateCont'.$i.'" type="number" name="updateCont'.$i.'" class="form-control" min="1" max="10.00" step="0.01" value=""></td>';
	else
	echo '<td onclick="getCnpElevFromTable('.$i.')"><input id ="updateCont'.$i.'" type="number" name="updateCont'.$i.'" class="form-control" min="1" max="10.00" step="0.01" value='.$notaContList[$i].'></td>';
  echo '</tr>';
}
?>
</tbody>
  <tfoot>
    <tr>
    <th>Nume</th>
    <th>CNP</th> 
  	<th>Proba</th>
    <th>Nota contestatie</th> 
    </tr>
  </tfoot>
</table>
</div>
<div style="margin-left:925px; margin-top:720px; margin-right:15px;">
<button id ="AdaugaContestatie" name ="AdaugaContestatie" class="button button1">Adauga nota contestatie</button>
</div>
</div>
<style>
.button {
  background-color: #ad2183;
  border: none;
  border-radius: 7px;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  font-weight: bold;
  margin: 2px 1px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: purple; 
  border: 4px solid #ad2183;
}

.button1:hover {
  background-color: #d194bf;
  color: white;
}
</style>

<!-- prevent resubmit on refresh -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>