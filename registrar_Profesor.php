<?php 
include('./includes/header.html');
include('./includes/navbar.html');
require('./bd/bd.php');

$message="";

if (!empty($_POST['Nomb_P']) && !empty($_POST['Cod_P'])) {
    $sql = "INSERT INTO tb_profesor (Nomb_P, Cod_P) VALUES (:Nomb_P, :Cod_P)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Nomb_P', $_POST['Nomb_P']);
    $stmt->bindParam(':Cod_P',$_POST['Cod_P']);

    if ($stmt->execute()) {
      $message = 'Profesor registrado con exito';
    } else {
      $message = 'Error al registrar profesor, puede el codigo puede estar ya asignado';
    }
  }
?>

<body>

<?php  if(!empty($message)): ?>
    <div class="alert alert-dark" role="alert"><?= $message ?></div>
<?php endif; ?>

    <!--Formulario para registrar profesores-->
    <div class="mt-2">
    <form action="registrar_Profesor.php" method="post">
        <div class="form-group col-md-8" >
        <div class="row">
            <div class="col">
                <label for="">Nombre del Profesor: </label>
                <input type="text" name="Nomb_P" id="" placeholder="">
            </div>
            <div class="col">
                <label for="">Codigo del Profesor:</label>
                <input type="text" name="Cod_P" id="">
            </div>
            <button type="submit" value="Send" class="btn btn-secondary">Registrar Profesor</button>
        </div>
        </div>
    </form>
    </div>

</body>