<!DOCTYPE HTML>
<html>
 <head>
 </head>
 <body>
 <?php
session_start();
function GetTest()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "password";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT test.nume "
                    . "FROM test ");
            
            // Binding variables
            //$statement->bindParam(':input', $input);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nume'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function InsertTest($nume)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("insert into test (id,nume) values (null,:nume) ");
            
            // Binding variables
            $statement->bindParam(':nume', $nume);

            // Executing statement
            $statement->execute();

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }
 
 function UpdateTest($id,$nume)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("update test set nume=:nume where id=:id ");
            
            // Binding variables
            $statement->bindParam(':nume', $nume);
        	$statement->bindParam(':id', $id);

            // Executing statement
            $statement->execute();

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }
 
  function DeleteTest($nume)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("delete from test where nume=:nume");
            
            // Binding variables
            $statement->bindParam(':nume', $nume);

            // Executing statement
            $statement->execute();

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }
 
 //echo "te afli in MySQLconnection.php";
 
/*$array=Test();
 print_r($array);*/
 
 //InsertTest(succes);
 //UpdateTest(3,'update');
 //DeleteTest('succes');

 function GetPasswordByUsername($username)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT parola from users where username=:username ");
            
            // Binding variables
            $statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['parola'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
  function GetNumeByUsername($username)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT nume from users where username=:username ");
            
            // Binding variables
            $statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['nume'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetPrenumeByUsername($username)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT prenume from users where username=:username ");
            
            // Binding variables
            $statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['prenume'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetRoleByUsername($username)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT functie from users where username=:username ");
            
            // Binding variables
            $statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['functie'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetLicee()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT denl from liceu ");
            
            // Binding variables
            //$statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denl'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetNumeResultList()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT test.nume "
                    . "FROM test ");
            
            // Binding variables
            //$statement->bindParam(':input', $input);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nume'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
  function GetIdResultList()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT test.id "
                    . "FROM test ");
            
            // Binding variables
            //$statement->bindParam(':input', $input);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['id'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 //profile combobox
 function GetProfileForSelectedLiceu($liceu)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT denp "
                . " FROM profil, liceu, liceu_profil "
                . " WHERE profil.codp=liceu_profil.codp "
                . " and liceu.codl=liceu_profil.codl "
                . " and denl=:liceu ");
            
            // Binding variables
            $statement->bindParam(':liceu', $liceu);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denp'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function InsertElev($nume,$init,$prenume,$cnp,$liceu,$profil)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement1 = $connection->prepare("SELECT codp FROM profil WHERE lower(denp)=lower(:profil) ");
        	$statement1->bindParam(':profil', $profil);
        	$statement1->execute();
        	$results1 = null;
            while ($row = $statement1->fetch()) {
                $results1 = $row['codp'];
            }
        
            $statement2 = $connection->prepare("SELECT codl FROM liceu WHERE lower(denl) = lower(:liceu) ");
        	$statement2->bindParam(':liceu', $liceu);
        	$statement2->execute();
        	$results2 = null;
            while ($row = $statement2->fetch()) {
                $results2 = $row['codl'];
            }
        
        	$statement3 = $connection->prepare("SELECT codlp "
                . "FROM liceu_profil "
                . "WHERE codp =:codp "
                . "and codl =:codl ");
        	$statement3->bindParam(':codp', $results1);
        	$statement3->bindParam(':codl', $results2);
        	$statement3->execute();
        	$results3 = null;
            while ($row = $statement3->fetch()) {
                $results3 = $row['codlp'];
            }
        
        	$statement4 = $connection->prepare("INSERT INTO elev VALUES(null,"
                .":nume, "
                .":init, "
                .":prenume, "
                .":cnp, "
                .":codlp) ");
            $statement4->bindParam(':nume', $nume);
        	$statement4->bindParam(':init', $init);
       		$statement4->bindParam(':prenume', $prenume);
        	$statement4->bindParam(':cnp', $cnp);
        	$statement4->bindParam(':codlp', $results3);
            $statement4->execute();
        
        	$statement14 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'INSERT INTO elev VALUES(null,':nume',':init',':prenume',':cnp',':codlp');') ");
        	$statement14->bindParam(':nume', $nume);
        	$statement14->bindParam(':init', $init);
        	$statement14->bindParam(':prenume', $prenume);
        	$statement14->bindParam(':cnp', $cnp);
        	$statement14->bindParam(':codlp', $results3);
        	$statement14->execute();
        
        	$statement5 = $connection->prepare("SELECT code FROM elev WHERE cnp=:cnp");
        	$statement5->bindParam(':cnp', $cnp);
        	$statement5->execute();
        	$results5 = null;
            while ($row = $statement5->fetch()) {
                $results5 = $row['code'];
            }
        
        	$statement6 = $connection->prepare("SELECT codpr FROM proba,elev,liceu_profil where proba.codp=liceu_profil.codp and elev.codlp=liceu_profil.codlp and cnp=:cnp and tip_proba=1 ");
        	$statement6->bindParam(':cnp', $cnp);
        	$statement6->execute();
        	$results6 = null;
            while ($row = $statement6->fetch()) {
                $results6 = $row['codpr'];
            }
        	
        	$statement7 = $connection->prepare("SELECT codpr FROM proba,elev,liceu_profil where proba.codp=liceu_profil.codp and elev.codlp=liceu_profil.codlp and cnp=:cnp and tip_proba=2 ");
        	$statement7->bindParam(':cnp', $cnp);
        	$statement7->execute();
        	$results7 = null;
            while ($row = $statement7->fetch()) {
                $results7 = $row['codpr'];
            }
        
        	$statement8 = $connection->prepare("INSERT INTO examen VALUES(null, :codelev, :proba1 ) ");
            $statement8->bindParam(':codelev', $results5);
        	$statement8->bindParam(':proba1', $results6);
            $statement8->execute();
        
        	$statement9 = $connection->prepare("INSERT INTO examen VALUES(null, :codelev, :proba2 ) ");
            $statement9->bindParam(':codelev', $results5);
        	$statement9->bindParam(':proba2', $results7);
            $statement9->execute();
        
        	$statement15 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'INSERT INTO examen VALUES(null,':codelev',':proba1'),(null,':codelev',':proba2');') ");
            $statement15->bindParam(':codelev', $results5);
        	$statement15->bindParam(':proba1', $results6);
        	$statement15->bindParam(':proba2', $results7);
            $statement15->execute();
        
        	$statement10 = $connection->prepare("select codex from examen,elev,proba where examen.code=elev.code and examen.codpr=proba.codpr and tip_proba=1 and cnp=:cnp ");
        	$statement10->bindParam(':cnp', $cnp);
        	$statement10->execute();
        	$results10 = null;
            while ($row = $statement10->fetch()) {
                $results10 = $row['codex'];
            }
        
        	$statement11 = $connection->prepare("select codex from examen,elev,proba where examen.code=elev.code and examen.codpr=proba.codpr and tip_proba=2 and cnp=:cnp ");
        	$statement11->bindParam(':cnp', $cnp);
        	$statement11->execute();
        	$results11 = null;
            while ($row = $statement11->fetch()) {
                $results11 = $row['codex'];
            }
        
        	$statement12 = $connection->prepare("INSERT INTO rezultat VALUES(:examen1,0.0,0.0) ");
            $statement12->bindParam(':examen1', $results10);
            $statement12->execute();
        
        	$statement13 = $connection->prepare("INSERT INTO rezultat VALUES(:examen2,0.0,0.0) ");
            $statement13->bindParam(':examen2', $results11);
            $statement13->execute();
        
        	$statement16 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'INSERT INTO rezultat VALUES(':examen1',0.0,0.0),((':examen2',0.0,0.0);') ");
            $statement16->bindParam(':examen1', $results10);
        	$statement16->bindParam(':examen2', $results11);
            $statement16->execute();

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }
 
 function GetAllCnp()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT cnp from elev ");
            
            // Binding variables
            //$statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['cnp'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetNumeElev($nume,$prenume,$cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT nume, init_tata, prenume "
                . "FROM elev,liceu,profil,liceu_profil "
                . "WHERE lower(nume) like lower('%".$nume."%') "
                . "and lower(prenume) like lower('%".$prenume."%') "
                . "and cnp like '%".$cnp."%' "
                . "and elev.codlp = liceu_profil.codlp "
                . "and liceu_profil.codp = profil.codp "
                . "and liceu_profil.codl = liceu.codl "
                . "order by code ");
            
            // Binding variables
            $statement->bindParam(':nume', $nume);
        	$statement->bindParam(':prenume', $prenume);
        	$statement->bindParam(':cnp', $cnp);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nume']." ".$row['init_tata'].". ".$row['prenume'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetCNPElev($nume,$prenume,$cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT cnp "
                . "FROM elev,liceu,profil,liceu_profil "
                . "WHERE lower(nume) like lower('%". $nume. "%') "
                . "and lower(prenume) like lower('%" . $prenume . "%') "
                . "and cnp like '%" . $cnp . "%' "
                . "and elev.codlp = liceu_profil.codlp "
                . "and liceu_profil.codp = profil.codp "
                . "and liceu_profil.codl = liceu.codl "
                . "order by code ");
            
            // Binding variables
            $statement->bindParam(':nume', $nume);
        	$statement->bindParam(':prenume', $prenume);
        	$statement->bindParam(':cnp', $cnp);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['cnp'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetLiceuElev($nume,$prenume,$cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT denl "
                . "FROM elev,liceu,profil,liceu_profil "
                . "WHERE lower(nume) like lower('%" . $nume . "%') "
                . "and lower(prenume) like lower('%" . $prenume . "%') "
                . "and cnp like '%" . $cnp . "%' "
                . "and elev.codlp = liceu_profil.codlp "
                . "and liceu_profil.codp = profil.codp "
                . "and liceu_profil.codl = liceu.codl "
                . "order by code ");
            
            // Binding variables
            $statement->bindParam(':nume', $nume);
        	$statement->bindParam(':prenume', $prenume);
        	$statement->bindParam(':cnp', $cnp);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denl'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
  function GetProfilElev($nume,$prenume,$cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT denp "
                . "FROM elev,liceu,profil,liceu_profil "
                . "WHERE lower(nume) like lower('%" . $nume . "%') "
                . "and lower(prenume) like lower('%" . $prenume . "%') "
                . "and cnp like '%" . $cnp . "%' "
                . "and elev.codlp = liceu_profil.codlp "
                . "and liceu_profil.codp = profil.codp "
                . "and liceu_profil.codl = liceu.codl "
                . "order by code ");
            
            // Binding variables
            $statement->bindParam(':nume', $nume);
        	$statement->bindParam(':prenume', $prenume);
        	$statement->bindParam(':cnp', $cnp);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denp'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
  function DeleteElev($cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement1 = $connection->prepare("DELETE "
                . "FROM rezultat "
                . "WHERE codex in "
                . "(SELECT codex "
                . "FROM examen "
                . "WHERE code = (SELECT code "
                . "FROM elev "
                . "where cnp = '" . $cnp . "' ))");
        	$statement1->bindParam(':cnp', $cnp);
            $statement1->execute();
        
        	$statement5 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'DELETE FROM rezultat WHERE codex in(SELECT codex FROM examen WHERE code = (SELECT code FROM elev where cnp = ':cnp' ));') ");
            $statement5->bindParam(':cnp', $cnp);
            $statement5->execute();
        
        	$statement2 = $connection->prepare("DELETE "
                . "FROM examen "
                . "WHERE code = "
                . "(SELECT code "
                . "FROM elev "
                . "where cnp = '" . $cnp . "' )");
        	$statement2->bindParam(':cnp', $cnp);
            $statement2->execute();
        
        	$statement6 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'DELETE FROM examen WHERE code =(SELECT code FROM elev where cnp = ':cnp' );') ");
            $statement6->bindParam(':cnp', $cnp);
            $statement6->execute();
        
        	$statement3 = $connection->prepare("DELETE "
                . "FROM elev "
                . "where cnp = '" . $cnp . "' ");
        	$statement3->bindParam(':cnp', $cnp);
            $statement3->execute();
        
        	$statement7 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'DELETE FROM elev WHERE cnp=':cnp';') ");
            $statement7->bindParam(':cnp', $cnp);
            $statement7->execute();
        
        	$statement4 = $connection->prepare("DELETE "
                . "FROM users "
                . "where cnp = '" . $cnp . "' ");
        	$statement4->bindParam(':cnp', $cnp);
            $statement4->execute();
        
        	$statement8 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'DELETE FROM users WHERE cnp=':cnp';') ");
            $statement8->bindParam(':cnp', $cnp);
            $statement8->execute();

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }
 
 function GetNumeForElev($cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT nume "
                . "FROM elev "
                . "WHERE cnp =  :cnp ");
            
            // Binding variables
        	$statement->bindParam(':cnp', $cnp);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['nume'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 	function GetInitForElev($cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT init_tata "
                . "FROM elev "
                . "WHERE cnp =  :cnp ");
            
            // Binding variables
        	$statement->bindParam(':cnp', $cnp);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['init_tata'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 	function GetPrenumeForElev($cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT prenume "
                . "FROM elev "
                . "WHERE cnp =  :cnp ");
            
            // Binding variables
        	$statement->bindParam(':cnp', $cnp);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['prenume'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetDenProbaForElev($cnp,$tip_proba)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT denpr "
                . "FROM proba,examen,elev "
                . "WHERE proba.codpr=examen.codpr "
                . "AND examen.code=elev.code "
                . "AND proba.tip_proba= " . $tip_proba . " "
                . "AND elev.cnp='" . $cnp . "' ");
            
            // Binding variables
        	$statement->bindParam(':cnp', $cnp);
        	$statement->bindParam(':tip_proba', $tip_proba);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['denpr'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetNotaInitForElev($cnp,$tip_proba)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT nota_init "
                . "FROM rezultat,examen,elev,proba "
                . "WHERE proba.codpr=examen.codpr "
                . "AND examen.code=elev.code "
                . "AND rezultat.codex=examen.codex "
                . "AND proba.tip_proba= " . $tip_proba . " "
                . "AND elev.cnp='" . $cnp . "' ");
            
            // Binding variables
        	$statement->bindParam(':cnp', $cnp);
        	$statement->bindParam(':tip_proba', $tip_proba);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['nota_init'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetAllProba3ForProfil($cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

        	$statement1 = $connection->prepare("select denp "
            	."from profil,liceu_profil,elev " 
				."where profil.codp=liceu_profil.codp "
				."and elev.codlp=liceu_profil.codlp "
				."and elev.cnp= :cnp ");
        
        	// Binding variables
        	$statement1->bindParam(':cnp', $cnp);

            // Executing statement
            $statement1->execute();

            // Getting the data
            $profil = null;
       	 	while ($row = $statement1->fetch()) {
                $profil = $row['denp'];
            }
        
            // Preparing statement
            $statement2 = $connection->prepare("SELECT denpr "
                . "FROM proba, profil "
                . "WHERE proba.codp = profil.codp "
                . "AND tip_proba = 3 "
                . "AND denp = '" . $profil . "' ");

            // Executing statement
            $statement2->execute();

            // Getting the data
            $results2 = null;
            
            while ($row = $statement2->fetch()) {
                $results2[] = $row['denpr'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results2;
    }
 
 function UpdateElevAndProba($nume,$init,$prenume,$cnp,$proba3,$nota_init1,$nota_init2,$nota_init3)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement1 = $connection->prepare("update elev set nume= :nume ,init_tata= :init ,prenume= :prenume where cnp=:cnp ");
        	$statement1->bindParam(':nume', $nume);
        	$statement1->bindParam(':init', $init);
        	$statement1->bindParam(':prenume', $prenume);
        	$statement1->bindParam(':cnp', $cnp);
        	$statement1->execute();
        
        	$statement11 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE elev SET nume=':nume',init_tata=':init' ,prenume=':prenume' WHERE cnp=':cnp';') ");
        	$statement11->bindParam(':nume', $nume);
        	$statement11->bindParam(':init', $init);
        	$statement11->bindParam(':prenume', $prenume);
            $statement11->bindParam(':cnp', $cnp);
            $statement11->execute();
        
            $statement2 = $connection->prepare("update users set nume=:nume ,prenume= :prenume where cnp=:cnp  ");
        	$statement2->bindParam(':nume', $nume);
        	$statement2->bindParam(':prenume', $prenume);
        	$statement2->bindParam(':cnp', $cnp);
        	$statement2->execute();
        
        	$statement12 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE users SET nume=':nume',prenume=':prenume' WHERE cnp=':cnp';') ");
        	$statement12->bindParam(':nume', $nume);
        	$statement12->bindParam(':prenume', $prenume);    
        	$statement12->bindParam(':cnp', $cnp);
            $statement12->execute();
        
        	$statement3 = $connection->prepare("select codpr from proba,elev,liceu_profil,profil where proba.codp=profil.codp and elev.codlp=liceu_profil.codlp and liceu_profil.codp=profil.codp and elev.cnp = :cnp  and proba.denpr= :proba3  and proba.tip_proba = 3 ");
        	$statement3->bindParam(':cnp', $cnp);
        	$statement3->bindParam(':proba3', $proba3);
        	$statement3->execute();
        	$results3 = null;
            while ($row = $statement3->fetch()) {
                $results3 = $row['codpr'];
            }
        
        	$statement4 = $connection->prepare("select codex from examen,elev,proba where examen.code=elev.code and proba.codpr=examen.codpr and tip_proba = 3 and cnp = :cnp ");
        	$statement4->bindParam(':cnp', $cnp);
        	$statement4->execute();
        	$results4 = "";
            while ($row = $statement4->fetch()) {
                $results4 = $row['codex'];
            }
        
        	$statement5 = $connection->prepare("update examen set codpr=" . $results3 . " where codex=" . $results4 . " ");
        	$statement5->execute();
        
        	$statement13 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE examen SET codpr=':results3' WHERE codex=':results4';') ");
            $statement13->bindParam(':results3', $results3);
        	$statement13->bindParam(':results4', $results4);
            $statement13->execute();
        	
        	$statement6 = $connection->prepare("select codex from examen,elev,proba where examen.code=elev.code and examen.codpr=proba.codpr and cnp= :cnp and tip_proba=1 ");
        	$statement6->bindParam(':cnp', $cnp);
        	$statement6->execute();
        	$results6 = null;
            while ($row = $statement6->fetch()) {
                $results6 = $row['codex'];
            }
        
        	$statement7 = $connection->prepare("select codex from examen,elev,proba where examen.code=elev.code and examen.codpr=proba.codpr and cnp= :cnp and tip_proba=2 ");
        	$statement7->bindParam(':cnp', $cnp);
        	$statement7->execute();
        	$results7 = null;
            while ($row = $statement7->fetch()) {
                $results7 = $row['codex'];
            }
        
        	$statement8 = $connection->prepare("update rezultat set nota_init = " . $nota_init1 . "  where codex=" . $results6 . "  ");
            $statement8->execute();
        
        	$statement14 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE rezultat SET nota_init =':nota_init1' WHERE codex=':results6';') ");
            $statement14->bindParam(':nota_init1', $nota_init1);
        	$statement14->bindParam(':results6', $results6);
            $statement14->execute();
        
        	$statement9 = $connection->prepare("update rezultat set nota_init = " . $nota_init2 . "  where codex=" . $results7 . "  ");
            $statement9->execute();
        
        	$statement15 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE rezultat SET nota_init =':nota_init2' WHERE codex=':results7';') ");
            $statement15->bindParam(':nota_init2', $nota_init2);
        	$statement15->bindParam(':results7', $results7);
            $statement15->execute();
        
        	$statement10 = $connection->prepare("update rezultat set nota_init = " . $nota_init3 . "  where codex=" . $results4 . "  ");
            $statement10->execute();
        
        	$statement16 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE rezultat SET nota_init =':nota_init3' WHERE codex=':results4';') ");
            $statement16->bindParam(':nota_init3', $nota_init3);
        	$statement16->bindParam(':results4', $results4);
            $statement16->execute();

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }
 
 	function UpdateElev($nume,$init,$prenume,$cnp,$nota_init1,$nota_init2)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement1 = $connection->prepare("update elev set nume= :nume ,init_tata= :init ,prenume= :prenume where cnp=:cnp ");
        	$statement1->bindParam(':nume', $nume);
        	$statement1->bindParam(':init', $init);
        	$statement1->bindParam(':prenume', $prenume);
        	$statement1->bindParam(':cnp', $cnp);
        	$statement1->execute();
        
        	$statement11 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE elev SET nume=':nume',init_tata=':init' ,prenume=':prenume' WHERE cnp=':cnp';') ");
        	$statement11->bindParam(':nume', $nume);
        	$statement11->bindParam(':init', $init);
        	$statement11->bindParam(':prenume', $prenume);
            $statement11->bindParam(':cnp', $cnp);
            $statement11->execute();
        
            $statement2 = $connection->prepare("update users set nume=:nume ,prenume= :prenume where cnp=:cnp  ");
        	$statement2->bindParam(':nume', $nume);
        	$statement2->bindParam(':prenume', $prenume);
        	$statement2->bindParam(':cnp', $cnp);
        	$statement2->execute();
        
        	$statement12 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE users SET nume=':nume',prenume=':prenume' WHERE cnp=':cnp';') ");
        	$statement12->bindParam(':nume', $nume);
        	$statement12->bindParam(':prenume', $prenume);    
        	$statement12->bindParam(':cnp', $cnp);
            $statement12->execute();
        	
        	$statement6 = $connection->prepare("select codex from examen,elev,proba where examen.code=elev.code and examen.codpr=proba.codpr and cnp= :cnp and tip_proba=1 ");
        	$statement6->bindParam(':cnp', $cnp);
        	$statement6->execute();
        	$results6 = null;
            while ($row = $statement6->fetch()) {
                $results6 = $row['codex'];
            }
        
        	$statement7 = $connection->prepare("select codex from examen,elev,proba where examen.code=elev.code and examen.codpr=proba.codpr and cnp= :cnp and tip_proba=2 ");
        	$statement7->bindParam(':cnp', $cnp);
        	$statement7->execute();
        	$results7 = null;
            while ($row = $statement7->fetch()) {
                $results7 = $row['codex'];
            }
        
        	$statement8 = $connection->prepare("update rezultat set nota_init = " . $nota_init1 . "  where codex=" . $results6 . "  ");
            $statement8->execute();
        
        	$statement14 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE rezultat SET nota_init =':nota_init1' WHERE codex=':results6';') ");
            $statement14->bindParam(':nota_init1', $nota_init1);
        	$statement14->bindParam(':results6', $results6);
            $statement14->execute();
        
        	$statement9 = $connection->prepare("update rezultat set nota_init = " . $nota_init2 . "  where codex=" . $results7 . "  ");
            $statement9->execute();
        
        	$statement15 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE rezultat SET nota_init =':nota_init2' WHERE codex=':results7';') ");
            $statement15->bindParam(':nota_init2', $nota_init2);
        	$statement15->bindParam(':results7', $results7);
            $statement15->execute();

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }

 	function GetNumeForContestatie()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select nume,init_tata,prenume "
                . "from elev,proba,examen,rezultat "
                . "where elev.code = examen.code "
                . "and proba.codpr=examen.codpr "
                . "and rezultat.codex=examen.codex "
                . "and nota_cont <> 0.0 "
                . "order by elev.code,proba.tip_proba ");
            
            // Binding variables
            //$statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nume']." ".$row['init_tata'].". ".$row['prenume'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetCNPForContestatie()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select cnp "
                . "from elev,proba,examen,rezultat "
                . "where elev.code = examen.code "
                . "and proba.codpr=examen.codpr "
                . "and rezultat.codex=examen.codex "
                . "and nota_cont <> 0.0 "
                . "order by elev.code,proba.tip_proba ");
            
            // Binding variables
            //$statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['cnp'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetProbaForContestatie()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select denpr "
                . "from elev,proba,examen,rezultat "
                . "where elev.code = examen.code "
                . "and proba.codpr=examen.codpr "
                . "and rezultat.codex=examen.codex "
                . "and nota_cont <> 0.0 "
                . "order by elev.code,proba.tip_proba ");
            
            // Binding variables
            //$statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denpr'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetNotaContForContestatie()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select nota_cont "
                . "from elev,proba,examen,rezultat "
                . "where elev.code = examen.code "
                . "and proba.codpr=examen.codpr "
                . "and rezultat.codex=examen.codex "
                . "and nota_cont <> 0.0 "
                . "order by elev.code,proba.tip_proba ");
            
            // Binding variables
            //$statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nota_cont'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function UpdateNotaContestatie($cnp,$nota_cont,$proba)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("update rezultat "
                . "set nota_cont=" . $nota_cont . " "
                . "where codex = (select codex "
                . "from examen,elev,proba "
                . "where examen.code=elev.code "
                . "and examen.codpr=proba.codpr "
                . "and denpr ='" . $proba . "' "
                . "and cnp ='" . $cnp . "')  ");
        	$statement->execute();
        
        	$statement15 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'UPDATE rezultat SET nota_cont=':nota_cont' WHERE codex = (select codex from examen,elev,proba where examen.code=elev.code and examen.codpr=proba.codpr and denpr =':proba' and cnp =':cnp';') ");
            $statement15->bindParam(':nota_cont', $nota_cont);
        	$statement15->bindParam(':proba', $proba);
        	$statement15->bindParam(':cnp', $cnp);
            $statement15->execute();
        
            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }
 
 function GetAllUsername()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT username from users ");
            
            // Binding variables
            //$statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['username'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetUsernameUsers($cnp)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT username "
                . "FROM users "
                . "WHERE cnp =  :cnp ");
            
            // Binding variables
        	$statement->bindParam(':cnp', $cnp);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['username'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetAllCnpUsers()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT cnp from users ");
            
            // Binding variables
            //$statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['cnp'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function InsertUser($cnp,$username,$parola)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("INSERT INTO users VALUES('" . GetNumeForElev($cnp) . "', '" . GetPrenumeForElev($cnp) . "', '" . $cnp . "', '" . $username . "', '" . $parola . "', 'elev'" . ") ");
        	$statement->execute();
        
            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }
 
 function GetCnpOfUser($username)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT cnp from users where username=:username");
            
            // Binding variables
            $statement->bindParam(':username', $username);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['cnp'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function InsertProba3($cnp,$denproba3)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
        	
        	$statement1 = $connection->prepare("SELECT code FROM elev WHERE cnp='" . $cnp . "' ");
        	$statement1->execute();
        	$results1 = null;
            while ($row = $statement1->fetch()) {
                $results1 = $row['code'];
            }
        
        	$statement2 = $connection->prepare("select codpr from proba,elev,liceu_profil where proba.codp=liceu_profil.codp and elev.codlp= liceu_profil.codlp and proba.denpr='" . $denproba3 . "' and proba.tip_proba=3 and elev.cnp='" . $cnp . "'  ");
        	$statement2->bindParam(':cnp', $cnp);
        	$statement2->execute();
        	$results2 = null;
            while ($row = $statement2->fetch()) {
                $results2 = $row['codpr'];
            }
        
        	$statement3 = $connection->prepare("INSERT INTO examen VALUES(null, " . $results1 . ", " . $results2 . " )  ");
            $statement3->execute();
        
        	$statement16 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'INSERT INTO examen VALUES(null,':results1',':results2');') ");
            $statement16->bindParam(':results1', $results1);
        	$statement16->bindParam(':results2', $results2);
            $statement16->execute();
        
        	$statement4 = $connection->prepare("select codex from examen,elev,proba where examen.code=elev.code and examen.codpr=proba.codpr and tip_proba=3 and cnp='" . $cnp . "' ");
        	$statement4->bindParam(':cnp', $cnp);
        	$statement4->execute();
        	$results4 = null;
            while ($row = $statement4->fetch()) {
                $results4 = $row['codex'];
            }
        
        	$statement5 = $connection->prepare("INSERT INTO rezultat VALUES(" . $results4 . ",0.0, 0.0) ");
            $statement5->execute();
        
        	$statement17 = $connection->prepare("INSERT INTO log VALUES('".$_SESSION["user"]."','".$_SESSION["role"]."',now(),'INSERT INTO rezultat VALUES(':results4',0.0, 0.0);') ");
            $statement17->bindParam(':results4', $results4);
            $statement17->execute();

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
    }
 
 function GetNotaContForElev($cnp,$tip_proba)
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("SELECT nota_cont "
                . "FROM rezultat,examen,elev,proba "
                . "WHERE proba.codpr=examen.codpr "
                . "AND examen.code=elev.code "
                . "AND rezultat.codex=examen.codex "
                . "AND proba.tip_proba= " . $tip_proba . " "
                . "AND elev.cnp='" . $cnp . "' ");
            
            // Binding variables
        	$statement->bindParam(':cnp', $cnp);
        	$statement->bindParam(':tip_proba', $tip_proba);

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results = $row['nota_cont'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetNumeForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select nume, init_tata, prenume \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nume']." ".$row['init_tata'].". ".$row['prenume'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetLiceuForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select denl \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denl'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetProfilForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select denp \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denp'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetProba1ForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select p1.denpr \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denpr'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
  function GetNotaInit1ForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select r1.nota_init \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nota_init'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 	 function GetNotaCont1ForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select r1.nota_cont \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nota_cont'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
  function GetProba2ForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select p2.denpr \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denpr'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetNotaInit2ForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select r2.nota_init \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nota_init'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 	 function GetNotaCont2ForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select r2.nota_cont \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nota_cont'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
   function GetProba3ForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select p3.denpr \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['denpr'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetNotaInit3ForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select r3.nota_init \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nota_init'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 	 function GetNotaCont3ForRezultat()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select r3.nota_cont \n "
                . "from rezultat r1, rezultat r2, rezultat r3, examen e1, examen e2, examen e3, elev, proba p1, proba p2, proba p3, liceu, profil, liceu_profil \n "
                . "where profil.codp= liceu_profil.codp \n "
                . "and liceu.codl=liceu_profil.codl \n "
                . "and elev.codlp=liceu_profil.codlp \n "
                . "and p1.tip_proba = 1 \n "
                . "and p2.tip_proba = 2 \n "
                . "and p3.tip_proba = 3 \n "
                . "and r1.codex = e1.codex \n "
                . "and e1.code = elev.code \n "
                . "and e1.codpr = p1.codpr \n "
                . "and r2.codex = e2.codex \n "
                . "and e2.code = elev.code \n "
                . "and e2.codpr = p2.codpr \n "
                . "and r3.codex = e3.codex \n "
                . "and e3.code = elev.code \n "
                . "and e3.codpr = p3.codpr \n "
                . "and elev.code in (select elev.code from examen,elev where elev.code=examen.code group by elev.code having count(examen.code)=3) \n "
                . "order by elev.nume,elev.init_tata,elev.prenume ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['nota_cont'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetUserForLog()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select user from log order by date desc ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['user'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetRolForLog()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select rol from log order by date desc ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['rol'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetDateForLog()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select date from log order by date desc ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['date'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 
 function GetActiuneForLog()
    {
        $DBServer = "localhost";
        $DBName= "cb269";
        $DBUsername = "cb269";
        $DBPassword = "ritl8pyc";
    
        try
        {
            $connection = new PDO("mysql:host=$DBServer;dbname=$DBName;port=3306", $DBUsername, $DBPassword);

            // Setting the atribute from error to exception so I can catch it 
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // No exception has occurred
            // print("Connected successfully"."<br/>")

            // Preparing statement
            $statement = $connection->prepare("select actiune from log order by date desc ");

            // Executing statement
            $statement->execute();

            // Getting the data
            $results = null;
            
            while ($row = $statement->fetch()) {
                $results[] = $row['actiune'];
            }

            // Closing the connection (destroying the object)
            $connection = null;
        }
        catch(PDOException $e)
        {
            // Exception occurred
            print("Connection failed. Cause: " . $e->getMessage());
        }  
        
        return $results;
    }
 ?>
 </body>
</html>
