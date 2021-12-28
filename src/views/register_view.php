<!-- Damian Strojek 184407 2021 WAI -->
<!doctype html>
<html lang="en">
    <head>
        <title>My hobby - ESPORT Tickets</title>
        <meta name="Author" content="Damian Strojek nr 184407, semestr 3 Informatyka">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="static/css/main.css" type="text/css">
        <link rel="icon" href="static/img/icon.svg">

        <meta charset="UTF-8" />

        <script src="static/jquery-3.5.1.min.js"></script>
        <script src="static/functions.js"></script>
    </head>
    <body>
        <header>
            <nav>
                <ul style="list-style-type:none;">
                    <li><img src="static/img/headphones.svg" class="logo" alt="logo"/></li>
                    <li><a href="/index"><b>Home page</b></a></li>
                    <li><a href="/statistics"><b>Statistics</b></a></li>
                    <li class="dropdown"><a><b>Games</b></a>
                        <div class="dropdown-content">
                            <a href="/counterstrike">Counter Strike</a>
                            <a href="/leagueoflegends">League of Legends</a>
                            <a href="/buying">Buy ticket</a>
                        </div>
                    </li>
                    <li class="dropdown"><a><b>Gallery</b></a>
                        <div class="dropdown-content">
                            <a href="/gallery">Gallery</a>
                            <a href="/upload">Upload photo</a>
                            <a href="/chosen">Chosen photos</a>
                            <a href="/search">Search photo</a>
                        </div>
                    </li>
                    <li><a href="/support"><b>Support</b></a></li>
                </ul>
            </nav>
        </header>

        <section>
            <h2>Register</h2>
            <form action="" method="post" enctype="multipart/form-data">  

                <fieldset>
                    <input type="hidden" name="help" value="register"/>

                    <div class="fieldset1" >
                        <label for="email">E-mail address</label>  
                        <div>
                            <input id="email" name="email" type="text" placeholder="">
                        </div>
                    </div> </br> 


                    <div class="fieldset">
                        <label for="login">Login</label>  
                        <div>
                            <input id="login" name="login" type="text" placeholder="">
                        </div>
                    </div> </br>

                    <div class="fieldset">
                        <label for="password">Password</label>  
                        <div>
                            <input id="password" name="password" type="password" placeholder="">
                        </div>
                    </div> </br>

                    <div class="fieldset">
                        <label for="password_repeat">Repeat password</label>  
                        <div>
                            <input id="password_repeat" name="password_repeat" type="password" placeholder="">
                        </div>
                    </div> </br>

                    <input type="submit" value="Register"/>

                    <?=$_SESSION['register_result']?>
                    <?php $_SESSION['register_result'] = null ?>
                
                </fieldset>
			
		    </form> </br>
		
            <div style="text-align: center;">
                <a href="buying"><input class="login" type="button" value="Go back to tickets"/></a>
            </div> 

        </section>
        <footer>
            <p class="footerText">DAMIAN STROJEK 2020</p>
            <a href="https://facebook.com/" target="_blank"><img class="footerIcons" src="static/img/facebookicon.svg" alt=""></a>
            <a href="https://instagram.com/" target="_blank"><img class="footerIcons" src="static/img/instagramicon.svg" alt=""></a>
            <a href="https://github.com/" target="_blank"><img class="footerIcons" src="static/img/githubicon.svg" alt=""></a>
        </footer>
    </body>
</html>