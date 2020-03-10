<?php 
include('includes/header.html');
require('bd/bd.php');
if(!isset($_SESSION)){
    session_start();
    $username=$_SESSION['username'];
}else{
    header('Location: login.php');
}
$sql="SELECT * FROM tb_estudiante WHERE username=:username";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':username',$_SESSION['username']);
$stmt->execute();
$arr=$stmt->fetch(PDO::FETCH_ASSOC);

 if(is_null($arr['Encuesta_R'])){
     $mensaje='No ha resuelto la Encuesta';
 }

?> 


<a href="logout.php">Logout</a>
<body>
<ul class="list-group list-group-flush">
  <li class="list-group-item"><?php echo $username ?> </li>
  <li class="list-group-item">Materia inscrita: <?php echo $mensaje ?></li>
  </ul>
</body>