<?php
session_start();
require "mySQLconnection.php";
$liceelist=GetLicee();

$numelist=GetNumeForRezultat();
$liceulist=GetLiceuForRezultat();
$profillist=GetProfilForRezultat();
$proba1list=GetProba1ForRezultat();
$notainit1list=GetNotaInit1ForRezultat();
$notacont1list=GetNotaCont1ForRezultat();
$proba2list=GetProba2ForRezultat();
$notainit2list=GetNotaInit2ForRezultat();
$notacont2list=GetNotaCont2ForRezultat();
$proba3list=GetProba3ForRezultat();
$notainit3list=GetNotaInit3ForRezultat();
$notacont3list=GetNotaCont3ForRezultat();

for($i=0;$i<count($numelist);$i++){
	if ($notacont1list[$i] == 0.0 || $notacont1list[$i] == -1) {
                $notafinala1list[$i]=$notainit1list[$i];
    } else {
                $notafinala1list[$i]=$notacont1list[$i];
            }
	if ($notacont2list[$i] == 0.0 || $notacont2list[$i] == -1) {
                $notafinala2list[$i]=$notainit2list[$i];
    } else {
                $notafinala2list[$i]=$notacont2list[$i];
            }
	if ($notacont3list[$i] == 0.0 || $notacont3list[$i] == -1) {
                $notafinala3list[$i]=$notainit3list[$i];
    } else {
                $notafinala3list[$i]=$notacont3list[$i];
            }
    $media = ($notafinala1list[$i] + $notafinala2list[$i] + $notafinala3list[$i])/3.0;
	$medialist[$i] = number_format((float)$media, 2, '.', '');

	if ($medialist[$i] >= 6.0 && $notafinala1list[$i] >= 5.0 && $notafinala2list[$i] >= 5.0 && $notafinala3list[$i] >= 5.0) {
                $rezultatlist[$i]="ADMIS";
    } else {
                $rezultatlist[$i]="RESPINS";
            }

    if ($notafinala1list[$i] == 0 || $notafinala2list[$i] == 0 || $notafinala3list[$i] == 0) {
                $rezultatlist[$i]="NEPREZENTAT";
    }
}

for($i=0;$i<count($rezultatlist);$i++){
	if($rezultatlist[$i]=="ADMIS"){
    	$admisi=$admini+1;
    }
	else if($rezultatlist[$i]=="RESPINS"){
    	$respinsi=$respinsi+1;
    }
	else if($rezultatlist[$i]=="NEPREZENTAT"){
    	$neprezentati=$neprezentati+1;
    }
}

$cautare="";
 $filtrare="filtreaza dupa liceu";
if(isset($_GET["cautarePHP"]) && isset($_GET["filtrarePHP"]))
{$admisi=0;
 $respinsi=0;
 $neprezentati=0;
$cautare=$_GET["cautarePHP"];
 $filtrare=$_GET["filtrarePHP"];
	for($i=0;$i<count($numelist);$i++){
    	if ((strpos(strtolower($numelist[$i]), strtolower($cautare)) !== false || $cautare=="") && (strpos(strtolower($liceulist[$i]), strtolower( $filtrare)) !== false ||  $filtrare=="filtreaza dupa liceu")) {
        	echo '<tr>';
    			echo '<td style="background-color: #debad3;">'.$numelist[$i].'</td>';
    			echo '<td>'.$liceulist[$i].'</td>';
        		echo '<td>'.$profillist[$i].'</td>';
				echo '<td>'.$proba1list[$i].'</td>';
				echo '<td>'.$notainit1list[$i].'</td>';
				echo '<td>'.$notacont1list[$i].'</td>';
				echo '<td>'.$notafinala1list[$i].'</td>';
				echo '<td>'.$proba2list[$i].'</td>';
				echo '<td>'.$notainit2list[$i].'</td>';
				echo '<td>'.$notacont2list[$i].'</td>';
				echo '<td>'.$notafinala2list[$i].'</td>';
				echo '<td>'.$proba3list[$i].'</td>';
				echo '<td>'.$notainit3list[$i].'</td>';
				echo '<td>'.$notacont3list[$i].'</td>';
				echo '<td>'.$notafinala3list[$i].'</td>';
				echo '<td>'.$medialist[$i].'</td>';
				echo '<td>'.$rezultatlist[$i].'</td>';
  			echo '</tr>';
        if($rezultatlist[$i]=="ADMIS"){
    			$admisi=$admini+1;
    			}
			else if($rezultatlist[$i]=="RESPINS"){
    			$respinsi=$respinsi+1;
    			}
			else if($rezultatlist[$i]=="NEPREZENTAT"){
    			$neprezentati=$neprezentati+1;
    		}	
        }
    }
exit;
}else if(isset($_GET["cautarePHP"])){
$admisi=0;
 $respinsi=0;
 $neprezentati=0;
$cautare=$_GET["cautarePHP"];
	for($i=0;$i<count($numelist);$i++){
    	if ((strpos(strtolower($numelist[$i]), strtolower($cautare)) !== false || $cautare=="") && (strpos(strtolower($liceulist[$i]), strtolower( $filtrare)) !== false ||  $filtrare=="filtreaza dupa liceu")) {
        	if($rezultatlist[$i]=="ADMIS"){
    			$admisi=$admini+1;
    			}
			else if($rezultatlist[$i]=="RESPINS"){
    			$respinsi=$respinsi+1;
    			}
			else if($rezultatlist[$i]=="NEPREZENTAT"){
    			$neprezentati=$neprezentati+1;
    		}	
        	echo '<tr>';
    			echo '<td style="background-color: #debad3;">'.$numelist[$i].'</td>';
    			echo '<td>'.$liceulist[$i].'</td>';
        		echo '<td>'.$filtrare.'</td>';
				echo '<td>'.$proba1list[$i].'</td>';
				echo '<td>'.$notainit1list[$i].'</td>';
				echo '<td>'.$notacont1list[$i].'</td>';
				echo '<td>'.$notafinala1list[$i].'</td>';
				echo '<td>'.$proba2list[$i].'</td>';
				echo '<td>'.$notainit2list[$i].'</td>';
				echo '<td>'.$notacont2list[$i].'</td>';
				echo '<td>'.$notafinala2list[$i].'</td>';
				echo '<td>'.$proba3list[$i].'</td>';
				echo '<td>'.$notainit3list[$i].'</td>';
				echo '<td>'.$notacont3list[$i].'</td>';
				echo '<td>'.$notafinala3list[$i].'</td>';
				echo '<td>'.$medialist[$i].'</td>';
				echo '<td>'.$rezultatlist[$i].'</td>';
  			echo '</tr>';
        }
    }
exit;
}else if(isset($_GET["filtrarePHP"])){
$admisi=0;
 $respinsi=0;
 $neprezentati=0;
 $filtrare=$_GET["filtrarePHP"];
	for($i=0;$i<count($numelist);$i++){
    	if ((strpos(strtolower($numelist[$i]), strtolower($cautare)) !== false || $cautare=="") && (strpos(strtolower($liceulist[$i]), strtolower( $filtrare)) !== false ||  $filtrare=="filtreaza dupa liceu")) {
        	echo '<tr>';
    			echo '<td style="background-color: #debad3;">'.$numelist[$i].'</td>';
    			echo '<td>'.$liceulist[$i].'</td>';
        		echo '<td>'.$profillist[$i].'</td>';
				echo '<td>'.$proba1list[$i].'</td>';
				echo '<td>'.$notainit1list[$i].'</td>';
				echo '<td>'.$notacont1list[$i].'</td>';
				echo '<td>'.$notafinala1list[$i].'</td>';
				echo '<td>'.$proba2list[$i].'</td>';
				echo '<td>'.$notainit2list[$i].'</td>';
				echo '<td>'.$notacont2list[$i].'</td>';
				echo '<td>'.$notafinala2list[$i].'</td>';
				echo '<td>'.$proba3list[$i].'</td>';
				echo '<td>'.$notainit3list[$i].'</td>';
				echo '<td>'.$notacont3list[$i].'</td>';
				echo '<td>'.$notafinala3list[$i].'</td>';
				echo '<td>'.$medialist[$i].'</td>';
				echo '<td>'.$rezultatlist[$i].'</td>';
  			echo '</tr>';
        	if($rezultatlist[$i]=="ADMIS"){
    			$admisi=$admini+1;
    			}
			else if($rezultatlist[$i]=="RESPINS"){
    			$respinsi=$respinsi+1;
    			}
			else if($rezultatlist[$i]=="NEPREZENTAT"){
    			$neprezentati=$neprezentati+1;
    		}	
        }
    }
exit;
}


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Rezultate Bacalaureat</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
<!-- 	link for jQuery and ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="jspdf.plugin.autotable.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.3/jspdf.plugin.autotable.js"></script> -->
</head>
<body style="background-image: url('https://cdn.asla.org/uploadedImages/CMS/Shop/Bookstore/books.jpg');">
<div class="header">
  <a href="rezultate.php" class="logo">Examenul de Bacalaureat</a>
  <div class="header-right">
    <a class="active" href="rezultate.php">Rezultate</a>
    <a href="login.php">Logare</a>
    <a href="crearecont.php">Creare cont</a>
  </div>
</div>

<table id="my-table"></table>

<style>
* {box-sizing: border-box;}

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

#rezultate {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#rezultate td, #rezultate th {
  border: 1px solid #d194bf;
  padding: 8px;
}

#rezultate tr:nth-child(even){background-color: #debad3;}
#rezultate tr:nth-child(odd){background-color: white;}

#rezultate tr:hover {background-color: #d194bf;}

#rezultate th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ad2183;
  color: white;
  cursor: pointer;
}

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

<script>
$(document).ready(function(){
  $("#cautare").keyup(function(){
  
  var pressed=$('#cautare').val();
  $('#rezultate').find('thead').remove();
  $('#rezultate').find('tbody').remove();
  $('#rezultate').find('tfoot').remove();
  	$.ajax({
    	type:"get",
    	data: {
        	cautarePHP: pressed
        },
    	success: function(response){
        $('#rezultate').append('<thead><tr><th onclick="sortTable(0)">Nume</th><th onclick="sortTable(1)">Liceu</th> <th onclick="sortTable(2)">Profil</th><th onclick="sortTable(3)">Proba1</th> <th onclick="sortTable(4)">Nota initiala 1</th><th onclick="sortTable(5)">Nota contestatie 1</th> <th onclick="sortTable(6)">Nota finala 1</th><th onclick="sortTable(7)">Proba2</th> <th onclick="sortTable(8)">Nota initiala 2</th> <th onclick="sortTable(9)">Nota contestatie 2</th><th onclick="sortTable(10)">Nota finala 2</th> <th onclick="sortTable(11)">Proba3</th> <th onclick="sortTable(12)">Nota initiala 3</th><th onclick="sortTable(13)">Nota contestatie 3</th> <th onclick="sortTable(14)">Nota finala 3</th> <th onclick="sortTable(15)">Media</th> <th onclick="sortTable(16)">Rezultatul final</th> </tr></thead><tbody style="height: 100px; overflow-y:auto; ">'+response+'</tbody><tfoot><tr><th>Nume</th><th>Liceu</th> <th>Profil</th><th>Proba1</th> <th>Nota initiala 1</th><th>Nota contestatie 1</th> <th>Nota finala 1</th><th>Proba2</th> <th>Nota initiala 2</th> <th>Nota contestatie 2</th><th>Nota finala 2</th> <th>Proba3</th> <th>Nota initiala 3</th><th>Nota contestatie 3</th> <th>Nota finala 3</th> <th>Media</th> <th>Rezultatul final</th> </tr></tfoot>');
           var ctx=$("#piechart").get(0).getContext("2d");
var canvas = document.getElementsByTagName('canvas')[0];
canvas.width  = 50;
canvas.height = 10; 
canvas.style.width  = '800px';
canvas.style.height = '600px';
Chart.defaults.global.defaultFontColor = '#ccff00';
var data = {
     labels: ["Elevi admisi", "Elevi respinsi", "Elevi neprezentati"],
     datasets: [
         {
         		data: [<?php echo $admisi; ?>, <?php echo $respinsi; ?>, <?php echo $neprezentati; ?>],
             // data: [20, 40, 10],
             backgroundColor: [
                  "#ad2183", 
                  "#d194bf", 
                  "#debad3", 
             ]  
         }]
};

var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: data

});
        }
    });
   });
});

$(document).ready(function(){
  $("#liceu").change(function(){
  
     var ctx=$("#piechart").get(0).getContext("2d");
var canvas = document.getElementsByTagName('canvas')[0];
canvas.width  = 50;
canvas.height = 10; 
canvas.style.width  = '800px';
canvas.style.height = '600px';
Chart.defaults.global.defaultFontColor = '#ccff00';
var data = {
     labels: ["Elevi admisi", "Elevi respinsi", "Elevi neprezentati"],
     datasets: [
         {
         		data: [<?php echo $admisi; ?>, <?php echo $respinsi; ?>, <?php echo $neprezentati; ?>],
             // data: [20, 40, 10],
             backgroundColor: [
                  "#ad2183", 
                  "#d194bf", 
                  "#debad3", 
             ]  
         }]
};

var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: data

});
  
  var chosen=$('#liceu').val();
  $('#rezultate').find('thead').remove();
  $('#rezultate').find('tbody').remove();
  $('#rezultate').find('tfoot').remove();
  	$.ajax({
    	type:"get",
    	data: {
        	filtrarePHP: chosen
        },
    	success: function(response){
        $('#rezultate').append('<thead><tr><th onclick="sortTable(0)">Nume</th><th onclick="sortTable(1)">Liceu</th> <th onclick="sortTable(2)">Profil</th><th onclick="sortTable(3)">Proba1</th> <th onclick="sortTable(4)">Nota initiala 1</th><th onclick="sortTable(5)">Nota contestatie 1</th> <th onclick="sortTable(6)">Nota finala 1</th><th onclick="sortTable(7)">Proba2</th> <th onclick="sortTable(8)">Nota initiala 2</th> <th onclick="sortTable(9)">Nota contestatie 2</th><th onclick="sortTable(10)">Nota finala 2</th> <th onclick="sortTable(11)">Proba3</th> <th onclick="sortTable(12)">Nota initiala 3</th><th onclick="sortTable(13)">Nota contestatie 3</th> <th onclick="sortTable(14)">Nota finala 3</th> <th onclick="sortTable(15)">Media</th> <th onclick="sortTable(16)">Rezultatul final</th> </tr></thead><tbody style="height: 100px; overflow-y:auto; ">'+response+'</tbody><tfoot><tr><th>Nume</th><th>Liceu</th> <th>Profil</th><th>Proba1</th> <th>Nota initiala 1</th><th>Nota contestatie 1</th> <th>Nota finala 1</th><th>Proba2</th> <th>Nota initiala 2</th> <th>Nota contestatie 2</th><th>Nota finala 2</th> <th>Proba3</th> <th>Nota initiala 3</th><th>Nota contestatie 3</th> <th>Nota finala 3</th> <th>Media</th> <th>Rezultatul final</th> </tr></tfoot>');
        }
    });
   });
});
</script>

<br>
<div class="custom-control custom-control-inline">
	<input type="text" id ="cautare" name="cautare" class="form-control" placeholder="Cautare dupa nume">&ensp;

<!--comboBox filtrare dupa liceu-->
<select id="liceu" name="liceu" class="form-control">
	<option selected value="filtreaza dupa liceu">--filtrare dupa liceu--</option>
<?php
    for($i=0;$i<count($liceelist);$i++){                                                
       echo "<option value='".$liceelist[$i]."'>".$liceelist[$i]."</option>";
    }
?>
</select>
</div>
<br>
<br>

<!--tabel rezultate-->
<!-- <div style="overflow-x:auto; overflow-y: auto; height: 230px;"> -->
<div style="overflow-x:auto; height:340px;">
<table id="rezultate">
<thead>
  <tr>
    <th onclick="sortTable(0)">Nume</th>
    <th onclick="sortTable(1)">Liceu</th> 
  	<th onclick="sortTable(2)">Profil</th>
    <th onclick="sortTable(3)">Proba1</th> 
  	<th onclick="sortTable(4)">Nota initiala 1</th>
    <th onclick="sortTable(5)">Nota contestatie 1</th> 
  	<th onclick="sortTable(6)">Nota finala 1</th>
    <th onclick="sortTable(7)">Proba2</th> 
    <th onclick="sortTable(8)">Nota initiala 2</th> 
  	<th onclick="sortTable(9)">Nota contestatie 2</th>
  	<th onclick="sortTable(10)">Nota finala 2</th> 
    <th onclick="sortTable(11)">Proba3</th> 
  	<th onclick="sortTable(12)">Nota initiala 3</th>
    <th onclick="sortTable(13)">Nota contestatie 3</th> 
  	<th onclick="sortTable(14)">Nota finala 3</th> 
    <th onclick="sortTable(15)">Media</th> 
  	<th onclick="sortTable(16)">Rezultatul final</th> 
  </tr>
</thead>
<tbody style="height: 100px; overflow-y:auto; ">
<?php
for($i=0;$i<count($numelist);$i++){
  echo '<tr>';
    echo '<td style="background-color: #debad3;">'.$numelist[$i].'</td>';
    echo '<td>'.$liceulist[$i].'</td>';
	echo '<td>'.$profillist[$i].'</td>';
	echo '<td>'.$proba1list[$i].'</td>';
	echo '<td>'.$notainit1list[$i].'</td>';
	if($notacont1list[$i]<0)
    echo '<td>0.00</td>';
    else
	echo '<td>'.$notacont1list[$i].'</td>';
	echo '<td>'.$notafinala1list[$i].'</td>';
	echo '<td>'.$proba2list[$i].'</td>';
	echo '<td>'.$notainit2list[$i].'</td>';
	if($notacont2list[$i]<0)
    echo '<td>0.00</td>';
    else
	echo '<td>'.$notacont2list[$i].'</td>';
	echo '<td>'.$notafinala2list[$i].'</td>';
	echo '<td>'.$proba3list[$i].'</td>';
	echo '<td>'.$notainit3list[$i].'</td>';
	if($notacont3list[$i]<0)
    echo '<td>0.00</td>';
    else
	echo '<td>'.$notacont3list[$i].'</td>';
	echo '<td>'.$notafinala3list[$i].'</td>';
	echo '<td>'.$medialist[$i].'</td>';
	echo '<td>'.$rezultatlist[$i].'</td>';
  echo '</tr>';
}
?>
</tbody>
  <tfoot>
    <tr>
    <th>Nume</th>
    <th>Liceu</th> 
  	<th>Profil</th>
    <th>Proba1</th> 
  	<th>Nota initiala 1</th>
    <th>Nota contestatie 1</th> 
  	<th>Nota finala 1</th>
    <th>Proba2</th> 
    <th>Nota initiala 2</th> 
  	<th>Nota contestatie 2</th>
  	<th>Nota finala 2</th> 
    <th>Proba3</th> 
  	<th>Nota initiala 3</th>
    <th>Nota contestatie 3</th> 
  	<th>Nota finala 3</th> 
    <th>Media</th> 
  	<th>Rezultatul final</th> 
    </tr>
  </tfoot>
</table>
</div>
<br>

<form action="" method="post">
<center>
<!-- <button type="export" id="export" name="export" class="button button1" onclick="Export('rezultate')">Export</button> -->
<button type="export" id="pdf" name="export1" class="button button1">Export PDF</button>
<button type="export" id="csv" name="export2" class="button button1">Export CSV</button>
<button type="export" id="json" name="export3" class="button button1">Export JSON</button>
</center>
</form>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="src/tableHTMLExport.js"></script>
<script>
  $('#json').on('click',function(){
    $("#rezultate").tableHTMLExport({type:'json',filename:'RezultateBacalaureat.json'});
  })
  $('#csv').on('click',function(){
    $("#rezultate").tableHTMLExport({type:'csv',filename:'RezultateBacalaureat.csv'});
  })
  $('#pdf').on('click',function(){
		var doc = new jsPDF('l', 'mm', 'a3');	
		doc.autoTable({ html: '#rezultate' , theme:'grid', headStyles: { fillColor:  '#ad2183' }, footStyles: { fillColor: '#ad2183' }})
  		doc.save('RezultateBacalaureat.pdf')
  })
  </script>

<!-- <script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script> -->
<!-- <script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" type="text/javascript"></script>
<canvas id="piechart">
<script>
$(document).ready(function(){

 var ctx=$("#piechart").get(0).getContext("2d");
var canvas = document.getElementsByTagName('canvas')[0];
canvas.width  = 50;
canvas.height = 10; 
canvas.style.width  = '800px';
canvas.style.height = '600px';
Chart.defaults.global.defaultFontColor = '#ccff00';
var data = {
     labels: ["Elevi admisi", "Elevi respinsi", "Elevi neprezentati"],
     datasets: [
         {
         		data: [<?php echo $admisi; ?>, <?php echo $respinsi; ?>, <?php echo $neprezentati; ?>],
             // data: [20, 40, 10],
             backgroundColor: [
                  "#ad2183", 
                  "#d194bf", 
                  "#debad3", 
             ]  
         }]
};

var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: data

});
});
</script>


<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("rezultate");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

</body>
</html>