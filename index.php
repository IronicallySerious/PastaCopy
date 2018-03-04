<!DOCTYPE html>
<html>

<head>
    <title>PastaCopy</title>
    <link href="https://fonts.googleapis.com/css?family=Armata" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/pastacopy.png">
    <link rel="stylesheet" href="css/LoginPageStyle.css">
</head>

<body background="images/background.jpg">
    <div class="headingholder">
        <img src="images/pastacopy.png" class="topimage" width="8%">
        <div class="heading">
            PastaCopy
        </div>
    </div>
    <div class="welcomenote">
        <h1 class="tagline">The social paste sharing website</h1>
    </div>
    <div>
        <section class="formsection">
                <form action="php/HandleForm.php" method="post">

                        <div class="field fieldchildren">
                            <p style="margin-right:3px">Username</p>
                            <input type=text name="username" size=30>
                        </div>
                        <div class="field fieldchildren">
                            <p style="margin-right:3px">Password</p>
                            <input type=password name="password" size=30>
                        </div>
                        <div class="fieldchildren">
                                <input type="checkbox" name="newaccount" value="newaccount" checked>I already have an account<br>
                        </div>
                    <div class="buttons" style="justify-content:center;">
                        <input id="submitbutton" type=submit name="submit" value="Submit">
                        <input id="resetbutton" class="resetbutton" type=reset name=reset value="Reset">
                    </div>
                </form>
        </section>
    </div>
</body>

</html>