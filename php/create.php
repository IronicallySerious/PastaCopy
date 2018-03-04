<?php
    session_start();
?>

<html>
<head>
    <title>Create a Paste</title>
                <link href="https://fonts.googleapis.com/css?family=Armata" rel="stylesheet">
                <link rel="icon" type="image/png" href="/images/pastacopy.png">
                <link rel="stylesheet" href="/css/CreatePageStyle.css">
                <script type="text/javascript" src="/js/create.js"></script>
                
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
<div class="pasteeditorplaceholder">
    <p class="tagline">
        <span style="color:white;font-size:50px;">Create a pasta</span>
    </p>
            <div class="pasteeditor">
                <form action="/php/HandlePaste.php" method="post">                    
                    <textarea class="text" name="pasta" rows="14" cols="10" wrap="soft"> </textarea>
                    <input class="checkbox" type="checkbox" name="public" value="publicbool" checked><span style="color:white;">Publically shareable</span><br>
                    <input id="post" class="logoutbutton" style="width:150px;" id="submitbutton" type=submit name="submit" value="Post this Pasta">
                    <input id="resetbutton" class="resetbutton logoutbutton" style="margin-left:50px;color:white;background-color:black" type=reset name=reset value="Reset">
                </div>
            </form>
            </div>

        <button class="backbutton" id="discardbutton">
            Discard
        </button>
    </div>

</body> 

</html>