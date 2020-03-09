<?php 
include('../includes/header.html');
require('../bd/bd.php');

$message="";

if (!empty($_POST['username']) && !empty($_POST['contrasena']) && empty($_POST['Cod_materia'])){
    $sql="INSERT INTO tb_estudiante (username,contrasena) VALUES (:username,:contrasena)";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':username',$_POST['username']);
    $password= password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    $stmt->bindParam(':contrasena',$password);

    if ($stmt->execute()){
        $message='Usuario creado exitosamente';
    }else{
        $message='Error al Crear un Usuario';
    }
}

if (!empty($_POST['username']) && !empty($_POST['contrasena']) && !empty($_POST['Cod_materia'])){
    $sql="INSERT INTO tb_estudiante (username,contrasena,Cod_materia) VALUES (:username,:contrasena,:Cod_materia)";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':Cod_materia',$_POST['Cod_materia']);
    $stmt->bindParam(':username',$_POST['username']);
    $password= password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
    $stmt->bindParam(':contrasena',$password);
    
    if ($stmt->execute()){
        $message='Usuario creado exitosamente';
    }else{
        $message='Error al Crear un Usuario';
    }
}

?>

<body>
<?php  if(!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>
     <!--Formulario Para estudiante-->
     <div class="mt-2">
    <form action="registrar_estudiante.php" method="post">
        <div class="form-group col-md-8" >
        <div class="row form-control">
            <div class="col form-control">
                <label for="">Nombre del usuario a registrar: </label>
                <input type="text" name="username" id="" placeholder="">
            </div>
            <div class="col form-control">
                <label for="">Contraseña de la cuenta:</label>
                <input type="password" name="contrasena" id="">
            </div>
            <div class="col form-control">
                <label for="">  Codigo de la materia que estudia: </label>
                <input type="text" name="Cod_materia" id="">
            </div>
            <button type="submit" value="Send" class="btn btn-success">Registrar Estudiante:</button>
        </div>
        </div>
    </form>
    </div>
</body>