<?php 
include('../includes/header.html');
require('../bd/bd.php');

$message="";

?>

<body>
     <!--Formulario Para estudiante-->
     <div class="mt-2">
    <form action="registro.php" method="post">
        <div class="form-group col-md-8" >
        <div class="row">
            <div class="col">
                <label for="">Nombre del usuario a registrar: </label>
                <input type="text" name="username" id="" placeholder="">
            </div>
            <div class="col">
                <label for="">Contraseña de la cuenta:</label>
                <input type="password" name="Cod_materia" id="">
            </div>
            <div class="col">
                <label for="">  Codigo de la materia que estudia: </label>
                <input type="text" name="Cod_materia" id="">
            </div>
            <button type="submit" value="Send" class="btn btn-success">Registrar Estudiante</button>
        </div>
        </div>
    </form>
    </div>
</body>