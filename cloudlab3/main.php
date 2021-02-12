<?php
session_start();
 echo "Logged in as ".$_SESSION['id'];;
 ?>

<html>
  <body>
     <a href="login.html">log out</a>
     <hr>
     <h1>Main Content</h1>
  </body>

</html>
