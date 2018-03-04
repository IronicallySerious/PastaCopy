<?php
    session_start();
?>

<!DOCTYPE>
<html>
    <head>
            <title>Library</title>
            <link href="https://fonts.googleapis.com/css?family=Armata" rel="stylesheet">
            <link rel="icon" type="image/png" href="/images/pastacopy.png">
            <link rel="stylesheet" href="/css/LibraryPageStyle.css">
<script>
window.onload = function(e) 
            {
                console.log(e);
                e.preventDefault();

                // Set mouse hover and hover out mechanics for log out and back buttons
                document.getElementById("logoutbutton").onmouseout = function(e) {
                    this.style.backgroundColor='white';
                    this.style.color='black';
                    this.innerHTML="Log Out";
                }
                document.getElementById("logoutbutton").onmouseover = function() {
                    this.style.backgroundColor='black';
                    this.style.color='white';
                    this.innerHTML=":'(";
                }

                document.getElementById("backbutton").onmouseout = function() {
                    this.style.backgroundColor='white';
                    this.style.color='black';
                }
                document.getElementById("backbutton").onmouseover = function() {
                    this.style.backgroundColor='black';
                    this.style.color='white';
                }

                // Set on click events for logout button and back button
                document.getElementById("logoutbutton").onclick = function() {
                    window.location.href = "/php/logout.php";
                }
                document.getElementById("backbutton").onclick = function() {
                    window.location.href = "/php/dashboard.php";
                }
            } 
</script>

    </head>

<body background="/images/background.jpg">
	<span class="heading">
		Library
	</span>

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

    <div class="pasteview">

<?php

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

    $user = $_SESSION["username"];
	$sql = "SELECT * FROM `pastas` WHERE `username`= '$user'" ;
	$result = mysqli_query($link,$sql);
	$N = mysqli_num_rows($result);

	    while($row = $result->fetch_array()) // For every result in the query results
		{
			echo '<div class="paste"><p class="sneak">' . substr($row["pasta"],0,15) .'</p><p><u class="link"><a target="_blank" href="/view.php?link=' . $row["link"] . '">' . $row["link"] . '</a></u></p>'; // Insert a flexbox inside the pasteviewer for each result and create a link to the paste
			

				if($row['public'] == 1)
				{
					 $url = 'changetoprivate.php?link='.$row["link"];
                    echo '<button
                            class="pubbutton"  
                            onclick="window.location.href=\''.$url.'\'">Public</button>'; // Adds a php script to run after the button is clicked

				}
				else if($row['public'] == 0)
				{
					$url = 'changetopublic.php?link='.$row["link"];
                    echo '<button
                            class="pubbutton"  
                            onclick="window.location.href=\''.$url.'\'">Private</button>'; // Adds a php script to run after the button is clicked	// Same funcitonality as above but different script is fired
				}

            $url = 'deletepaste.php?link='.$row["link"];
            echo '<button
                    id="deletebutton"
                    class="pubbutton"  
                    style="background-color:red"
                    onclick="window.location.href=\''.$url.'\'">Delete</button></div>';
			
		}
	}
    	
?>
    </div>

    <button class="logoutbutton" style="position:fixed; bottom: 10px;" id="backbutton">
    	Back
    </button>

</body>

</html>