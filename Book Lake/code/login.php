<?php 
    use google\appengine\api\cloud_storage\CloudStorageTools;
    $default_bucket = CloudStorageTools::getDefaultGoogleStorageBucketName();

    session_start(); 
    // If the session is logged in, direct to main page 
    if(isset($_SESSION['current_user_id'])) {
        header("Location: main.php"); 
        exit();
    }

    // If the form is submitted, ...
    if (isset($_POST['submit'])) {
    
        // If the fields are set and not empty, read the user.txt file
        if (isset($_POST["uname"]) && isset($_POST["pword"]) && !empty(trim($_POST['uname'])) && !empty(trim($_POST['pword']))){
            // Localhost:
            // $file = fopen("user.txt","r");
            // Hardcode bucket name:
            // $file = fopen('gs://s3736719-myapi.appspot.com/user.txt','r');
            
            // If the user.txt file exist in the default bucket
            if (file_exists("gs://${default_bucket}/user.txt")) {
                $file = fopen("gs://${default_bucket}/user.txt",'r');
                $valid = false;

                // Loop though the file to validate the user name and password
                while (!feof($file)) {
                    $line = fgets($file);
                    $array = explode(";", $line);
                    if (trim($array[0]) == trim($_POST['uname']) && trim($array[1]) == trim($_POST['pword'])){
                        $valid = true;
                        break;
                    }
                }
                fclose($file);

                // If the account is valid, direct to main page
                if($valid) {
                    $_SESSION['current_user_id'] = trim($_POST["uname"]); 
                    header("Location: main.php"); 
                    exit();
                // Else, display invlaid input error msg
                } else {
                    echo "User name or password is invalid"; 
                }
                
             // Else, display no file error msg
             } else {
                 echo "No user information, please register first";
            }
        // Else, display empty input error msg
        } else {
                echo "User name or password cannot be empty";
        }
    }                                      
?>
<html> 
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login page</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div>Username:<input type="text" placeholder="Enter your username" name="uname"></div>
            <div>Password:<input type="password" placeholder="Enter your password" name="pword"></div>
            <div><input type="submit" name="submit" value="Log in"><a href="register.php">  Register</a></div> 
            <div></div> 
        </form>
    </body> 
</html>

