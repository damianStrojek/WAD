<!-- Damian Strojek 184407 2021 WAI -->
<!doctype html>
<html lang="en">
    <head>
        <title>My hobby - ESPORT Tickets</title>
        <meta name="Author" content="Damian Strojek nr 184407, semestr 3 Informatyka">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="static/css/main.css" type="text/css" />
        <link rel="stylesheet" href="static/css-fontello/fontello.css" type="text/css" />
        <link rel="stylesheet" href="static/jquery-ui/jquery-ui.css" />
        <link rel="icon" href="static/img/icon.svg" />

        <meta charset="UTF-8" />

        <script src="static/functions.js"></script>

        <noscript>
            <style>
                #dialog-1 {
                    display: block;
                }
                #dialog-2 {
                    display: none;
                }
            </style>
	    </noscript>
    </head>
    <body onload="orders(); button_confirmed(); text_area(); button_reset();">
        <header>
            <nav>
                <ul id="navColor">
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
                    <li style="cursor: pointer;" onclick="changeLight();"><a><b id="buttonLight">Light</b></a></li>
                </ul>
            </nav>
        </header>
        <!-- Logowanie się użytkownika-->
        <section style="text-align: center;">
            <h2>Tickets for IEM Katowice 2022</h2>
            <p>
                <?php if(!empty($_SESSION['user_id'])): ?>
                    <a href="logout"><input class="login" type="button" value="Log out"/></a>
                <?php else:?>
                    <a href="login"><input class="login" type="button" value="Log in"/></a>
                    <a href="register"><input class="login" type="button" value="Register"/></a>
                <?php endif?>
            </p>
            </br></br>
            <h3><div id="completed_orders" style="text-align: center;">
                How many orders have been realized on our webpage - 
            </div></h3>
        </section>
        <!-- Realizacja zamówienia przez użytkownika-->
        <div>
            <form id="form" action="action.php" method="post">
                <fieldset id="fieldset">
                    <h2>Ordering form</h2>

                    <h3>Choose the day:</h3>
                    <label for="first">First day
                        <input type="radio" checked="checked" name="radio" id="1day" value="1">
                    </label>
                    <br/>
                    <label for="second">Second day
                        <input type="radio" name="radio" id="2day" value="2">
                    </label>
                    <br/>
                    <label for="third">Third day
                        <input type="radio" name="radio" id="3day" value="3">
                    </label>
                    <br/>
                    <label for="pass">Pass
                        <input type="radio" name="radio" id="pass" value="Pass">
                    </label>
                    <br/><br/>

                    <input id="numberOfTickets" type="button" class="buttonBefore" onclick="numberOf_tickets();" value="Confirm selection" />
                    <br/><br/>

                    <div id="textareaForNumberOfTickets"></div>

                    <h3>Variant of the ticket:</h3>
                    <select>
                        <option value="pick">Choose the variant</option>
                        <option value="default">Default</option>
                        <option value="vip">VIP</option>
                        <option value="GODMODE">GODMODE</option>
                    </select>

                    <h3>Ticket extras (you are able to pick more than one):</h3>
                    <input type="checkbox" name="animal" value="Animal" />Animal<br />
                    <input type="checkbox" name="kid" value="Kid" />Kid below 12 yrs old<br />
                    <input type="checkbox" name="baggage" value="Baggage" />Additional baggage (more than 5kg)<br />
                    <input type="checkbox" name="sitted" value="Sitted place" />Reserved sitted place<br />
                    
                    <h3>Additional comment:</h3>
                    <textarea id="textarea" rows="9" cols="100">Here you are able to write additional comment to your order</textarea>

                    <h3>Realisation date of your order:</h3>
                    <input id="datepicker" type="text" value="Choose realisation date" /> 

                    <h3>Realisation method:</h3>
                    <input id="method" type="text" name="method" title="Fill in realisation method" />
                    <br/><br/>
                    
                    <input id="orders" onclick="numberOf_orders();" type="submit" value="Send the order" /> <br />
                    <br/>
                    <input id="reset" type="reset" value="Reset the form" />
                </fieldset>
            </form>
        </div>
        <div><br/><br/>
        <footer id="footer">
            <p class="footerText" id="footerText">DAMIAN STROJEK 2020</p>
            <a href="https://facebook.com/" target="_blank"><img class="footerIcons" src="static/img/facebookicon.svg" alt=""></a>
            <a href="https://instagram.com/" target="_blank"><img class="footerIcons" src="static/img/instagramicon.svg" alt=""></a>
            <a href="https://github.com/" target="_blank"><img class="footerIcons" src="static/img/githubicon.svg" alt=""></a>
        </footer>

    </body>
</html>