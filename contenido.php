<?php 
if(!isset($_SESSION)){
    session_start();
    $username=$_SESSION['username'];
}else{
    header('Location: login.php');
}



echo "Hola " . $username;



?>
<a href="logout.php">logout</a>