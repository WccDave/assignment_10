<?php
session_start();  
if(isset($_SESSION["name"]))  
{  
    function init(){
        
       
        return ['<h3>Login Success, Welcome - '.$_SESSION['name'].'</h3>'];
    }
      
}  
else  
{  
     header("location:index.php?page=login");  
}  


?>

