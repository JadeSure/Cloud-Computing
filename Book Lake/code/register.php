<?php
    use google\appengine\api\cloud_storage\CloudStorageTools;
    $default_bucket = CloudStorageTools::getDefaultGoogleStorageBucketName();

    // If the form is submitted, ...
    if (isset($_POST['submit'])) {
        
        // If the fields are set and not empty, read the user.txt file
        if(isset($_POST["uname"]) && isset($_POST["pword"]) && !empty(trim($_POST['uname'])) && !empty(trim($_POST['pword']))) {
            // Localhost:
            // $file = fopen("user.txt","r");
            // Hardcode bucket name:
            // $file = fopen('gs://s3736719-myapi.appspot.com/user.txt','r');
            
            // If the user.txt file exist in the default bucket
            if (file_exists("gs://${default_bucket}/user.txt")) {
                $file = fopen("gs://${default_bucket}/user.txt",'r');
                $exist = false;

                // Loop though the file to check if the user name exist
                while (!feof($file)) {
                    $line = fgets($file);
                    $array = explode(";", $line);
                    if (trim($array[0]) == trim($_POST['uname'])) {
                        $exist = true;
                        break;
                    }
                }
                fclose($file);
                
                // If the account already exist, display error msg
                if ($exist){
                    echo trim($_POST["uname"]).' already existed!';

                // Else, write the new account into user.txt file
                } else {
                        // $file = fopen("user.txt", "a");
                        // $file = fopen('gs://s3736719-myapi.appspot.com/user.txt','r');
                        // $file_new = fopen('gs://s3736719-myapi.appspot.com/user.txt','w');
                        $file = fopen("gs://${default_bucket}/user.txt", 'r');
                        $file_new = fopen("gs://${default_bucket}/user.txt", 'w');

                        // Write old records
                        while (!feof($file)) {
                            $line = fgets($file);
                            fwrite($file_new, $line);
                        } 

                        // Append new record
                        fwrite($file_new, trim($_POST["uname"]).";".trim($_POST["pword"])."\n");

                        fclose($file);
                        fclose($file_new);

                        // Redirect to login page
                        header("Location: login.php"); 
                        exit();
                }
                
            // Else, create new user.txt file
            } else {
                $file_new = fopen("gs://${default_bucket}/user.txt", 'w');
                fwrite($file_new, trim($_POST["uname"]).";".trim($_POST["pword"])."\n");
                fclose($file_new);
                
                // Redirect to login page
                header("Location: login.php"); 
                exit();
            }

        // Else, display empty input error msg
        } else {
            echo "User name or password cannot be empty";
        }
                                                                      
    }
?>
<html>
    <head>
        <title>Registration page</title>
    </head>
    <body>
        <h2>Registration Form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div>Username:<input type="text" placeholder="Enter your username" name="uname"></div>
            <div>Password:<input type="password" placeholder="Enter your password" name="pword"></div>
            <div><input type="submit" name="submit" value="Register"></div>
        </form>
    </body>
</html> 
