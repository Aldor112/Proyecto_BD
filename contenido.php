<?php 
include('includes/header.html');
if(!isset($_SESSION)){
    session_start();
    $username=$_SESSION['username'];
}else{
    header('Location: login.php');
}
?> 


<a href="logout.php">logout</a>
<body>
<ul class="list-group list-group-flush">
  <li class="list-group-item"><?php echo $username ?> </li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  </ul>
</body>