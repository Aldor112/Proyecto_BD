<?php 
include('../includes/header.html');
require('../bd/bd.php');

$message="";
    
if (!empty($_POST['Nomb_materia']) && !empty($_POST['Cod_materia']) && !empty($_POST['Cred']) ) {
    $sql = "INSERT INTO tb_materia (Nomb_materia,Cod_materia,Cred) VALUES (:Nomb_materia, :Cod_materia,:Cred)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Nomb_materia', $_POST['Nomb_materia']);
    $stmt->bindParam(':Cod_materia',$_POST['Cod_materia']);
    $stmt->bindParam(':Cred',$_POST['Cred']);
    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<body>
<?php  if(!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>
<div class="mt-2">
        <!--Formulario para registrar materias -->
    <form action="registrar_Materia.php" method="post">
        <div class="form-group col-md-8" >
        <div class="row">
            <div class="col">
                <label for="">Nombre de la materia: </label>
                <input type="text" name="Nomb_materia" id="" placeholder="">
            </div>
            <div class="col">
                <label for="">Codigo de la materia:</label>
                <input type="text" name="Cod_materia" id="">
            </div>
            <div class="col">
                <label for=""> Creditos de la materia:</label>
                <input type="text" name="Cred" id="">
            </div>
            <button type="submit" value="Send" class="btn btn-primary">Registrar Materia</button>
        </div>
        </div>
    </form>
    </div>
</body>