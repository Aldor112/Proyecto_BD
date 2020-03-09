<?php 
include('../includes/header.html');
require('../bd/bd.php');

$message="";

?>

<body>
    <!--Formulario para registrar profesores-->
    <div class="mt-2">
    <form action="registro.php" method="post">
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