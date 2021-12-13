
<?php

 session_start();  

 $host = "localhost";  
 $username = "dlloyd51";  
 $password = "X4QJRzzv5wwq";  
 $database = "dlloyd51";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["submit"]))  
      {  
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM adminMod WHERE email = :email AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          
                          'email'     =>     $_POST["email"],  
                          'password'     =>     $_POST["password"]
                            
                     )  
                ); 
                $row = $statement->fetch(PDO::FETCH_ASSOC); 
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                    $_SESSION["status"] = $row['status'];
                    $_SESSION["name"] = $row['name'];
                    $_SESSION["email"] = $_POST["email"];  
                     
                     header("location:index.php?page=welcome");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 
 
 ?>
 
 
 <!DOCTYPE html>
<html lang="en">
	<head>
		<title>PHP Form Validation Example</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
	</head>

	<body class="container">  
           
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                  
                <h1>Login</h1>
                <form method="post" action="index.php?page=login">
                    <div class="form-group">
                        <label for="email">Email address </label>
                        <input type="text" class="form-control" id="email" name="email" value="dave@daveadmin.com" >
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="Scott" >
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>  
           </div>  
            
      </body>  
 </html>  