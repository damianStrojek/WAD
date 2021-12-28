<!-- Damian Strojek 184407 2021 WAI -->
<!doctype html>
<html lang="en">
<head>
    <title>My hobby - ESPORT Support</title>
    <meta name="Author" content="Damian Strojek nr 184407, semestr 1 EiT Grupa 2 Podgrupa A">
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
                    <li class="active"><a href="/support"><b>Support</b></a></li>
                </ul>
            </nav>
        </header>
        <section style="margin-bottom: -11vh;">
            <h2 style="margin-bottom: -10px;">Support</h2>
            <p style="text-align: center;">
                If you want to contact me just fill out the form and wait for my response :
            </p>
        </section>
        <section id="form" class="centerForm">
            <form name="form" class="formSupport" method="GET" enctype="multipart/form-data">
                <h4>FORM</h4>
                <p>
                    <label for="name">Enter Name:  
                    <input type="text" name="name" id="name" placeholder="First" required></label>
                    <label for="surname">Enter Surname:  
                    <input type="text" name="surname" id="surname" placeholder="Last"></label>
                </p>
                <p>
                    <label for="email">Enter your email:  
                    <input type="email" name="email" id="email" required></label>
                    <label for="age">When were you born?
                    <input type="date" name="birthday" id="age" min="2000-01-01" >
                    </label>
                </p>
                <p>
                    Gender:
                    <label for="male">
                        <input type="radio" name="gender" id="male" value="male">Male
                    </label>
                    <label for="female">
                        <input type="radio" name="gender" id="female" value="female">Female<br><br>
                    </label>
                    <label for="college">College: 
                    <select name="college" id="college">
                        <option value="Not selected">*Please select*</option>
                        <option value="PG">Politechnika Gdanska</option>
                        <option value="UG">Uniwersytet Gdanski</option>
                        <option value="PW">Politechnika Wroclawska</option>
                        <option value="WAT">Wojskowa Akademia Techniczna</option>
                    </select>
                    </label>
                </p>
                <p>
                    <label for="message">Enter your message:<br><br>
                    <textarea name="message" id="message" required></textarea></label>
                </p>
                <p>
                    <label for="file">File: 
                    <input type="file" id="file" name="file">
                    </label>
                </p>
                <p>
                    <label for="human">If you are a human please mark here ->
                    <input type="checkbox" name="Human" id="human" value="Yes" required>
                    </label>
                </p>
                <button type="submit" class="buttonSupport">Submit</button>
                <button type="reset" class="buttonSupport">Reset</button>
            </form>
        </section>
        <footer>
            <p class="footerText">DAMIAN STROJEK 2020</p>
            <a href="https://facebook.com/" target="_blank"><img class="footerIcons" src="static/img/facebookicon.svg" alt=""></a>
            <a href="https://instagram.com/" target="_blank"><img class="footerIcons" src="static/img/instagramicon.svg" alt=""></a>
            <a href="https://github.com/" target="_blank"><img class="footerIcons" src="static/img/githubicon.svg" alt=""></a>
        </footer>
    </body>
</html>