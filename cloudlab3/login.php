<?php
session_start();
$_SESSION['id'] = $_POST['userid'];
$_SESSION['psw'] = $_POST['psw'];
$id = $_SESSION['id'];
$psw = $_SESSION['psw'];

if(isset($id) && isset($psw)){

  $checkaccount = explode(",", file_get_contents('gs://s3677615-storage/users.txt'));
#    echo $id.$psw;
  if($checkaccount[0] == $id && $checkaccount[1] == $psw ){
    header('Location:/main.html');
    exit;
  }else{
    die('User name or password is invalid');
  }
}

 ?>


<html>
  <body>

    <form action="" method = "post">
      <div>userid:<input type="text" name ="userid"></div>
      <div>Password:<input type="password" name = "psw"></div>
      <br/>
      <div><input type="submit" value = "Log in">
          <a href="register.html">register</a>
      </div>
    </form>
  </body>

</html>
