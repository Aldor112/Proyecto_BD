<?php 
include('../includes/header.html');
require('../bd/bd.php');

$message="";

?>
<body>
<div class="mt-2">
        <!--Formulario para registrar materias -->
    <form action="registro.php" method="post">
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