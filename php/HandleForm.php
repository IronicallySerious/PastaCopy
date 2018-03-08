<?php
    session_start();
?>
<!DOCTYPE>
<html>

<head>
</head>

<body background="/images/background.jpg">
<?php
    //session_start();
    $username = NULL;
    $password = NULL;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username = DisinfectText($_POST["username"]); // To stop SQL injections or JS scripts
        $password = DisinfectText($_POST["password"]);
    }

    // Stops any cross site scripting attempts by returning a disinfected text string
    function DisinfectText($data)
    {
        $data = htmlspecialchars(stripslashes(trim($data)));
        return $data;
    }

        $configs = include('config.php');

    // Setting a link to the MySQL datadase
    $link = new mysqli($configs['host'],$configs['username'],$configs['password']);

    if($link->connect_error)
    {
        die("Connection failed" . mysqli_connect_error());
    }
    else
    {
        if(!isset($_POST["newaccount"])) // If "I already have an account" was not checked
        {
            // Insert the credentials into the database
            $hashpass = sha1($password); // Hashing the password to be safe
            $sql = "USE PastaCopy;
                    INSERT INTO `PastaCopy`(`serial_number`, `username`, `password`, `pastes`) VALUES (DEFAULT,'$username','$hashpass','NULL')";
            
            
            if(mysqli_multi_query($link,$sql)) // If INSERT query is successful
            {
                echo mysqli_error($link);
                $_SESSION["username"]=$username; // To be used in the dashboard page
                
                // Redirect to the dashboard
                echo '<script type="text/javascript">
                    window.location.href = "/php/dashboard.php"
                    </script>'; 
            }
        }

        else // If "I already have an account" was checked
        {
            // Look for the credentials in the database
            $hashpass = sha1($password);
            $sql = "SELECT `serial_number`, `username`, `password`, `pastes` FROM `PastaCopy` WHERE `password`='$hashpass' AND `username`='$username'";
            mysqli_query($link,"USE PastaCopy");
            $result = mysqli_query($link,$sql);
            
            if($result) // If the query hasn't failed
            {
                if(mysqli_num_rows($result)==1) // If only one (username,password) set is found
                {
                    $_SESSION["username"]=$username;
                    echo '<script type="text/javascript">
                    window.location.href = "/php/dashboard.php"
                    </script>';
                }
                
                else // If none or more than 1 set is found
                {
                    // Redirect to a failure message
                    echo '<script type="text/javascript">
                    window.location.href = "/php/indexfailed.php"
                    </script>';
                }
                
            }
            // Look UP! Below are only bug fixing mechanisms
            // ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^
            // | | | | | | | | | | | | | | | |
            // | | | | | | | | | | | | | | | |
            // | | | | | | | | | | | | | | | |
            
            
            
            // Developer section 
            else
            {
                echo "`SELECT` query failed";
            }
            {
                echo 'Error'. mysqli_error($link);
            }
        
        }
    }

    $link->close();

?>


</body>

</html>