<?php
    session_start();
?>
<!DOCTYPE>
<html>
    <head>
            <title>Dashboard</title>
            <link href="https://fonts.googleapis.com/css?family=Armata" rel="stylesheet">
            <link rel="icon" type="image/png" href="/images/pastacopy.png">
            <link rel="stylesheet" href="/css/DashboardPageStyle.css">
            <script type="text/javascript" src="/js/dashboard.js"></script>
            
    </head>

    <body background="/images/background.jpg">
        <nav>
            <div class="navtext">
                <img src="/images/pastacopy.png" width="20px" class="icon">
                <div>PastaCopy- <?php echo $_SESSION["username"]?></div>
            </div>
        </nav>

        <div class="logout">
                <button class="logoutbutton" id="logoutbutton">
                    Log Out
                </button>
        </div>

        <div class="placeholder">
            <button class="create" id="create">
                <p class="createtext">CREATE</p>
            </button>
            <button class="create" id="library">
                <p class="createtext">LIBRARY</p>
            </button>
        </div>
    </body>
</html>