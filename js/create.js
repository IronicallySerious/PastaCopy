
                    window.onload = function(e) 
                    {
                        var DiscardClickCount = 0;
                        var DiscardMainColor='red';
                        console.log(e);
                        e.preventDefault();

                        // Set mouse hover and hover out mechanics for post, reset and log out buttons
                        document.getElementById("post").onmouseout = function() 
                        {
                            this.style.backgroundColor='white';
                            this.style.color='black';
                            this.value="Post this Pasta";
                        }
                        document.getElementById("post").onmouseover = function() 
                        {
                            this.style.backgroundColor='green';
                            this.style.color='white';
                            this.value=":D";
                        }
                        document.getElementById("resetbutton").onmouseout = function() 
                        {
                            this.style.backgroundColor='black';
                            this.style.color='white';
                        }
                        document.getElementById("resetbutton").onmouseover = function() 
                        {
                            this.style.backgroundColor='gray';
                            this.style.color='black';
                        }
                        document.getElementById("logoutbutton").onmouseout = function() 
                        {
                            this.style.backgroundColor='white';
                            this.style.color='black';
                            this.innerHTML="Log Out";
                        }
                        document.getElementById("logoutbutton").onmouseover = function() 
                        {
                            this.style.backgroundColor='black';
                            this.style.color='white';
                            this.innerHTML=":'(";
                        }
                        document.getElementById("discardbutton").onmouseover = function() 
                        {
                            this.style.backgroundColor = DiscardMainColor;
                            this.style.color='black';
                        }
                        document.getElementById("discardbutton").onmouseout = function() 
                        {
                            this.style.backgroundColor='white';
                            this.style.color='red';
                        }

                        // Set on click events for post, reset, logout buttons
                        document.getElementById("logoutbutton").onclick = function() 
                        {
                            window.location.href = "/php/logout.php";
                        }
                        document.getElementById("discardbutton").onclick = function() 
                        {
                            if(DiscardClickCount == 0)
                            {
                                DiscardClickCount++;
                                this.innerHTML = "Sure?";
                                this.backgroundColor="yellow";
                                DiscardMainColor = 'yellow';
                            }
                            else if(DiscardClickCount == 1)
                            {
                                DiscardClickCount++;
                                this.backgroundColor="gray";
                                DiscardMainColor = 'gray';
                                this.innerHTML = "Think again...";    
                            }
                            else if(DiscardClickCount == 2)
                            {
                                window.location.href = "/php/dashboard.php";
                            }
                        }
                    } 
          