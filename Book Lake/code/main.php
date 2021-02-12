<?php
    session_start();
    // If the session is logged in, display the user name, show the log out link and kill the session
    if (isset($_SESSION['current_user_id'])) {
        echo "Logged in as ".$_SESSION['current_user_id']." "."<a href='login.php'>(log out)</a>";
        unset($_SESSION['current_user_id']);
        session_destroy();
    // Else, direct to login page
    } else {
        header("Location: login.php");
        exit();
    }
?>
<html>
<head>
  <title></title>
  <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>
<body>
<div class = "container">
    <div id= "title" class="text-center mt-5"></div>
    <h1 class="text-center">Book Lake</h1>
    <!--row-->
    <div class = "row">
      <div id= "input" class="input-group mx-auto col-lg-6 col-md-8 col-sm-12">
        <input id = "search-box" type = "text" class = "form-control" placeholder="Please Search Books!">
        <button id = "search" class="btn btn-primary" onclick="">Search</button>
          <a target="_blank" href="https://vital-chiller-254512.appspot.com/index.php" class="btn btn-secondary">See chart</a>
      </div>
    </div>

</div>
<!--output-->
<div class="book-list">
  <h2 class="text-center">Search Results</h2>
  <div id="list-output">
    <div class="row"></div>
  </div>
</div>

</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/app.js"></script>

</body>
</html>
