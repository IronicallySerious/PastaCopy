
                    window.onload = function(e) 
                    {
                        console.log(e);
                        e.preventDefault();

                        // Set mouse hover and hover out mechanics for log out buttons
                        document.getElementById("homebutton").onmouseout = function() 
                        {
                            this.style.backgroundColor='white';
                            this.style.color='black';
                            this.innerHTML="Home";
                        }
                        document.getElementById("homebutton").onmouseover = function() 
                        {
                            this.style.backgroundColor='black';
                            this.style.color='white';
                            this.innerHTML=":')";
                        }

                        // Set on click events for logout button
                        document.getElementById("homebutton").onclick = function() 
                        {
                            window.location.href = "/index.php";
                        }
                        
                    } 
       