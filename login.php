<?php 
session_start(); 
include("includes/header.html"); 
include('includes/navbar2.html');
require("bd/bd.php");

if(!empty($_POST['username']) && !empty($_POST['password'])){
    $records=$conn->prepare("SELECT * FROM tb_estudiante WHERE username=:username");
    $records->bindParam(':username',$_POST['username']);
    $records->execute();
    $results=$records->fetch(PDO::FETCH_ASSOC);

    $message="";

    if(password_verify($_POST['password'],$results['contrasena'])){
        $_SESSION['username']=$results['username'];
        $message="Login Exitoso";
        header('Location: contenido.php');
    }else{
        $message="Correo o Contraseña Incorrectas";
    }
}
?>
<title>Login</title>

<body>
<?php  if (!empty($message)): ?>
<div class="alert alert-dark" role="alert"><?= $message ?></div>
<?php endif; ?>
<div class="col-md-4 mx-auto">
        <div class="card mt-4 text-center"> 
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <form  method="POST">
                <div class="form-group">
                    <input type="" name="username" class="form-control" placeholder="Nombre de usuario" autofocus>                   
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="" class="form-control" placeholder="Contrasena">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" value="send">Conectar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>