<?php
include('includes/header.html');
include('includes/navbar.html');
require("bd/bd.php");


if(!empty($_POST['username']) && !empty($_POST['nota'])){
    $records=$conn->prepare("SELECT * FROM tb_estudiante WHERE username=:username");
    $records->bindParam(':username',$_POST['username']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);

    $message="";
    if($_POST['username']==$results['username']){
    $sql="INSERT INTO tb_notas_estudiante (Notas,Cod_materia,username) VALUES (:Notas,:Cod_materia,:username)";
    $stmt=$conn->prepare($sql);
    $stmt->bindParam(':Notas',$_POST['nota']);
    $stmt->bindParam(':Cod_materia',$results['Cod_materia']);
    $stmt->bindParam(':username',$results['username']);
    if($stmt->execute()){
        $message="Nota guardada con exito";
    }
    }else{
        $message="Este usuario no existe";
    }
}else{
    $message="Introduzca todos los datos";
}
?>

<body>
<?php  if (!empty($message)): ?>
<div class="alert alert-success" role="alert"><?= $message ?></div>
<?php endif; ?>
<div class="col-md-4 text-center">
    <div class="card-header">
        <h5>Introduzca los datos</h5>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
            <input type="" name="username" class="form-control" placeholder="Nombre de usuario" autofocus>
            </div>
            <div class="form-group">
            <input type="" name="nota" class="form-control" placeholder="Nota del parcial" autofocus>
            </div>
            <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" value="send">Introducir nota</button>
            </div>
        </form>
    </div>
</div>




</body>