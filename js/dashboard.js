
            window.onload = function(e) 
            {
                console.log(e);
                e.preventDefault();

                // Set mouse hover and hover out mechanics for create, library and log out buttons
                document.getElementById("create").onmouseover = function() 
                {
                    this.style.backgroundColor='white';
                }
                document.getElementById("library").onmouseover = function() 
                {
                    this.style.backgroundColor='white';
                }

                document.getElementById("create").onmouseout = function() 
                {
                    this.style.backgroundColor='aqua';
                }
                document.getElementById("library").onmouseout = function() 
                {
                    this.style.backgroundColor='aqua';
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

                // Set on click events for create, library, logout buttons
                document.getElementById("create").onclick = function() 
                {
                    window.location.href = "/php/create.php";
                }
                document.getElementById("library").onclick = function() 
                {
                    window.location.href = "/php/library.php";
                }
                document.getElementById("logoutbutton").onclick = function() 
                {
                    window.location.href = "/php/logout.php";
                }
            } 
           