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
    $materia= $arr['Cod_materia'];

}
 if(is_null($arr['Encuesta_R'])){
     $encuesta='No ha resuelto la Encuesta';
     $link= '<a href="Encuesta.php" class="btn btn-primary">Realizar encuesta</a>';
 }if(is_null($arr['Encuesta_R']) && is_null($arr['Notas'])){
    $encuesta='No esta inscrito en ninguna materia';
    $link='.';
 }else{
     $encuesta='Ha resuelto la encuesta';
     $link=".";
 }

?> 


<body>
<ul class="list-group list-group-flush">
  <li class="list-group-item"><?php echo $username ?> </li>
  <li class="list-group-item">Materia inscrita: <?php echo $materia ?></li>
  <li class="list-group-item">Promedio Ponderado: <?php echo $encuesta?></li>
  <?php echo $link ?>
  </ul>
</body>