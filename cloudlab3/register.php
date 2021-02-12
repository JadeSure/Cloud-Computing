<?php
$id = $_POST['userid'];
$psw = $_POST['psw'];

if(isset($id) && isset($psw)){
  if ($id !== '' && $psw !== ''){
    $handle = fopen('gs://s3677615-storage/users.txt','w');
    fwrite($handle,$id);
    fwrite($handle,',');
    fwrite($handle,$psw);
    header('Location:/login.html');
  }else{
        die('User name or password cannot be empty');
    }
}

 ?>

<html>
  <body>

    <form action="" method = "post">
      <div>userid:<input type="text" name ="userid"></div>
      <div>Password:<input type="password" name = "psw"></div>
      <br/>
      <div><input type="submit" value = "Register"></div>


    </form>
  </body>

</html>
