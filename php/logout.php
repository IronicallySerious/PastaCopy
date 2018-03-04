<?php
    session_start();
    $_SESSION["username"] = NULL;
    session_destroy();
    // Redirect to login page
    echo '<script> 
    console.log("yo");
                window.location.href="/index.php";
          </script>';
?>