<?php
    session_start();

    $pasta = NULL;
    $public = false;
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $pasta = DisinfectText($_POST["pasta"]); // To stop SQL injections or JS scripts
        if(isset($_POST["public"]))
        {
            $public = true;
        }
        else 
        {
            $public = false;
        }
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
        mysqli_query($link,"USE PastaCopy");

        // Treating user data to be stored carefully in the database
        $public_int = (int) $public; 
        $currenttime = date("H:i:s");
        $currentdate = date("Y-m-d");
        $username = $_SESSION["username"];

        function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
        {
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $str .= $keyspace[random_int(0, $max)];
            }
            return $str;
        }

        $pastelink = random_str(10);

        $sql = "INSERT INTO `pastas`(`serial_number`, `username`, `public`, `date_of_creation`, `time_of_creation`, `pasta`, `link`) 
                VALUES (DEFAULT,'$username','$public_int','$currentdate','$currenttime','$pasta','$pastelink');";
        
        if(mysqli_multi_query($link,$sql)) // If INSERT query is successful
            {
                echo mysqli_error($link);
                
                // Redirect to the library
                 echo '<script type="text/javascript">
                    window.location.href = "/php/library.php"
                    </script>';
            }
        else // If INSERT query was unsuccessful
        {
            echo mysqli_error($link);
        }

    }

?>