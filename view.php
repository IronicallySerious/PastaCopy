<?php
    session_start();
?>

<html>
<head>
    <title>Pasta Viewer</title>
                <link href="https://fonts.googleapis.com/css?family=Armata" rel="stylesheet">
                <link rel="icon" type="image/png" href="/images/pastacopy.png">
                <link rel="stylesheet" href="/css/ViewPageStyle.css">
                <script type="text/javascript" src="/js/view.js"></script>
</head>

<body background="/images/background.jpg">
        <nav>
            <div class="navtext">
                <img src="/images/pastacopy.png" width="20px" class="icon">
                <div>PastaCopy- <?php 
                					if($_SERVER["REQUEST_METHOD"]=="GET")
								    {
								        $pastalink = $_GET["link"]; 
								    	echo $pastalink;
								    }
                				?>
                					
				</div>
            </div>
        </nav>

        <div class="logout">
                <button class="logoutbutton" id="homebutton">
                    Home
                </button>
        </div>

        <div class="textareadiv">
        	<textarea class="text" name="pasta" rows="30" cols="100" wrap="soft">
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
			    	$pastalink = $_GET["link"];
					$sql = "SELECT `public`,`pasta` FROM `pastas` WHERE `link`='$pastalink'";
			        mysqli_query($link,"USE PastaCopy");
			        $result = mysqli_query($link,$sql);

			        while($row = $result->fetch_array()) // For every result in the query results
					{

						if($row["public"] == 1) // For security puposes
                        {
                            echo $row['pasta'];
                        }
                        else if($row["public"] == 0)
                        {

                            echo "::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::THIS IS A PRIVATE PASTA::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::\n\nChevron Raynes 'accidentally' hacks into her college mainframe and finds blueprints to a billion dollar satellite belonging to none other than the Mafia. As if that wasn't bad enough, when the blueprints and a certain Professor go missing, Chevron is thrown under the Mafia's radar. Soon she's running for her life with not one but three Mafias behind her, in a race to get the blueprints. 

                                Adrian DeLuca is a genius who has a talent for psychology and manipulation. He may be the youngest Mafia Boss ever, but his raw ambition and ruthlessness scares people twice as old as him. So what happens when his only chance of getting the billion dollar blueprint is a headstrong, intelligent little girl who was probably just in the wrong place at the wrong time?

                                An adventure where the two unlikely allies travel the globe to solve cryptic clues and pull off the heist of the century without killing each other. Laced with humor and romance.

                                *Strong Language*";
                        }
					}  
			    }

			    $link->close();

				?> 

        	</textarea>
        </div>
</body> 

</html>