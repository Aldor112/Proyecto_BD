<?php 
include('includes/header.html');
include('includes/navbar2.html');
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

if(is_null($arr['Cod_materia'])){
    $materia='No tiene inscrita ninguna materia';
}else{
   /* $sql="SELECT Nomb_materia FROM tb_materia WHERE Cod_materia=:Cod_materia";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':Cod_Materia',$arr['Cod_Materia']);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    $materia=$arr['Cod_materia']; */
    $materia= $arr['Cod_materia'];

}
 if(is_null($arr['Encuesta_R'])){
     $encuesta='No ha resuelto la Encuesta';
 }

?> 


<body>
<ul class="list-group list-group-flush">
  <li class="list-group-item"><?php echo $username ?> </li>
  <li class="list-group-item">Materia inscrita: <?php echo $materia ?></li>
  <li class="list-group-item">Promedio Ponderado: <?php echo $encuesta ?> <a href="Encuesta.php" class="btn btn-primary">Realizar encuesta</a></li>
  </ul>
</body>