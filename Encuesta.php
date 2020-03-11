<?php 
include('includes/header.html'); 
require('bd/bd.php');

if(!isset($_SESSION)){
    session_start();
    $username=$_SESSION['username'];
}else{
    header('Location: login.php');
}
$promedio=0;

if (isset($_POST['P_1']) && isset($_POST['P_2']) && isset($_POST['P_3']) && isset($_POST['P_4']) && isset($_POST['P_5'])
&& isset($_POST['P_6']) && isset($_POST['P_7']) && isset($_POST['P_8']) && isset($_POST['P_9']) && isset($_POST['P_10'])
&& isset($_POST['P_11']) && isset($_POST['P_12']) && isset($_POST['P_13']) && isset($_POST['P_14'])&& isset($_POST['P_15'])
&& isset($_POST['P_16'])){
    foreach($_POST['P_1'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_2'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_3'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_4'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_5'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_6'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_7'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_8'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_9'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_10'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_11'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_12'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_13'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_14'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_15'] as $selected){
    $promedio=$promedio + $selected;    
  }
  foreach($_POST['P_16'] as $selected){
    $promedio=$promedio + $selected;
    
       
  }
$promedio=$promedio/16;

$sql3="SELECT * FROM tb_estudiante WHERE username=:username";
$stmt=$conn->prepare($sql3);
$stmt->bindParam(':username',$_SESSION['username']);
$stmt->execute();
$user=$stmt->fetch(PDO::FETCH_ASSOC);

$sql2="SELECT Cod_P FROM tb_materia WHERE Cod_materia=:Cod_materia";
$stmt2=$conn->prepare($sql2);
$stmt2->bindParam(':Cod_materia',$user['Cod_materia']);
$stmt2->execute();
$Materia=$stmt2->fetch(PDO::FETCH_ASSOC);

$sql="INSERT INTO tb_promedio_p (Cod_P,Promedio) VALUES (:Cod_P,:Promedio) ";
$stmt3=$conn->prepare($sql);
$stmt3->bindParam(':Cod_P',$Materia['Cod_P']);
$stmt3->bindParam(':Promedio',$promedio);


if($stmt3->execute()){
    $message="Encuesta Realizada con exito";
    $encuesta_r=TRUE;

$sql4="UPDATE tb_estudiante SET Encuesta_R=:Encuesta_R WHERE username=:username";
$stmt4=$conn->prepare($sql4);
$stmt4->bindParam(':username',$_SESSION['username']);
$stmt4->bindParam(':Encuesta_R',$encuesta_r);
$stmt4->execute();

$sql5="SELECT Promedio FROM tb_promedio_p WHERE Cod_P=:Cod_P";
$stmt5=$conn->prepare($sql5);
$stmt5->bindParam(':Cod_P',$Materia['Cod_P']);
$stmt5->execute();

$acum=0;
$acum2=0;
while($Promedio_ant=$stmt5->fetch(PDO::FETCH_ASSOC)){
    $acum=$acum+$Promedio_ant['Promedio'];
    $acum2++;
}


$promedio= ($promedio + $acum)/$acum2;

 $sql6="UPDATE tb_profesor SET Prom_Def=:Prom_def WHERE Cod_P=:Cod_P";
 $stmt6=$conn->prepare($sql6);
 $stmt6->bindParam(':Cod_P',$Materia['Cod_P']);
 $stmt6->bindParam(':Prom_def',$promedio);
 $stmt6->execute();
    header('Location: contenido.php');

}else{
    $message="Error al guardar la encuesta";
}
 
}else{
    $message="Por Favor rellene toda la encuesta";
}


?>



<body> 

    <title>Encuesta</title>
    <?php  if (!empty($message)): ?>
<div class="alert alert-dark" role="alert"><?= $message ?></div>
<?php endif; ?>
    <div style="width: 420px; margin-left: 90px; margin-top: 60px">
        <form>
            <div class="container" style="font-size: 17px; padding: 0px">
                <label>UNIVERSIDAD DE ORIENTE</label> 
                <label>VICERRECTORADO ACADEMICO</label> 
                <label>NUCLEO DE NUEVA ESPARTA</label>
                <label>COORDINACION DE POSTGRADO EN</label>
                <label>CIENCIAS ADMINISTRATIVAS</label>
            </div>
            <br>
        </form>
    </div>  
    <div style="width: 470px; margin-left: 90px">
        <div style="font-size: 17px; padding: 0px;" >
            <p>ENCUESTA DE OPINION DEL PARTICIPANTE SOBRE LOS MODELOS DE LA</p>
            <p><strong>MAESTRIA EN CIENCIAS ADMINISTRATIVAS</strong></p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
<br>
<br>
<div class="mx-auto" style="width: 1200px;">
<form action="Encuesta.php" method="post">
    <table class="table table-bordered table-sm table-mx-auto">
    
        <thead>
            <tr>
                <th scope="col">Nº</th>
                <th scope="col">MODULO(MATERIAL-INSTRUCCIONAL)</th>
                <th scope="col">5</th>
                <th scope="col">4</th>
                <th scope="col">3</th>
                <th scope="col">2</th>
                <th scope="col">1</th>
                <th scope="col">0</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <th>La organizacion y presentacion del modulo es atractivo</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_1[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_1[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_1[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_1[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_1[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_1[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">2</th>
            <th>Las instrucciones en el modulo facilitan el uso del material</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_2[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_2[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_2[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_2[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_2[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_2[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">3</th>
            <th>El lenguaje utilizado utilizado es comprensible</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_3[]"value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_3[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_3[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_3[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_3[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_3[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">4</th>
            <th>Recomienda bibliografia actualizada y otros recursos de aprendizaje</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_4[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_4[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_4[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_4[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input"  name="P_4[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_4[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">5</th>
            <th>Los objetivos estan formulados de forma clara y precisa</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_5[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_5[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_5[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_5[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_5[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_5[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">6</th>
            <th>Los objetivos tienen secuencia logica</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_6[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_6[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_6[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input"  name="P_6[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_6[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input"  name="P_6[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">7</th>
            <th>Los contenidos son coherentes con el objetivo</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_7[]"  value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_7[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input"  name="P_7[]"  value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_7[]"  value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input"  name="P_7[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_7[]"  value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">8</th>
            <th>los contenidos estan actualizados y son relevantes</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_8[]"  value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_8[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_8[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_8[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_8[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_8[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">9</th>
            <th> Los contenidos pueden ser desarrollados en el tiempo previsto</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_9[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_9[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_9[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_9[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_9[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_9[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">10</th>
            <th>Existe coherencia entre los contenidos y las acticidades practicas para su logro </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_10[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_10[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_10[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_10[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_10[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_10[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">11</th>
            <th>Las estrategias metodologicas fomentan la participacion</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_11[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_11[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_11[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_11[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_11[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_11[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">12</th>
            <th>Estimula el trabajo en equipo</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_12[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_12[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_12[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_12[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_12[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_12[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">13</th>
            <th>Propicia la investigacion y busqueda personal </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input"  name="P_13[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_13[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_13[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_13[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_13[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_13[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">14</th>
            <th>Responde a las necesidades e intereses de los participantes</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_14[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_14[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_14[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_14[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_14[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_14[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">15</th>
            <th>Los ejercicios facilitan la transferencia de conocimiento</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_15[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_15[]" value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_15[]" value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_15[]" value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_15[]" value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_15[]" value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
            <tr>
            <th scope="row">16</th>
            <th>planifica las actividades en funcion al tiempo</th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_16[]" value="5" id="5">
                <label class="form-check-label" for="5">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_16[]"  value="4" id="4">
                <label class="form-check-label" for="4">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_16[]"  value="3" id="3">
                <label class="form-check-label" for="3">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_16[]"  value="2" id="2">
                <label class="form-check-label" for="2">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_16[]"  value="1" id="1">
                <label class="form-check-label" for="1">
                    
                </label>
                </div>
            </th>
            <th>
                <div class="form-check">
                <input type="checkbox" class="form-check-input" name="P_16[]"  value="0" id="0">
                <label class="form-check-label" for="0">
                    
                </label>
                </div>
            </th>
            </tr>
        </tbody>   
    </table>

    <div style="margin-left: 1000px">
        <a href="./contenido.php" class="btn btn-secondary">Cancelar</a> 
        <button type="submit" value="Send" class="btn btn-primary">Enviar</button>
    </div>
    </form>
</div>
</body>