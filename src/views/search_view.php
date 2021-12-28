<!-- Damian Strojek 184407 2021 WAI -->
<!doctype html>
<html lang="en">
    <head>
        <title>My hobby - ESPORT Gallery chosen photos</title>
        <meta name="Author" content="Damian Strojek nr 184407, semestr 3 Informatyka">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="static/css/main.css" type="text/css">
        <link rel="icon" href="static/img/icon.svg">

        <meta charset="UTF-8" />

        <script>
           function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "search_ajax?q=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>
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
            <h2>Search for a photo in database :</h2>    
            <form>
                Title of the photo : <input type="text" onkeyup="showHint(this.value);">
            </form>
            <p>Suggestions: <div class="gallery"><div id="txtHint" class="imagesGallery"></div></div></p>
        </section>

        <footer>
            <p class="footerText">DAMIAN STROJEK 2020</p>
            <a href="https://facebook.com/" target="_blank"><img class="footerIcons" src="static/img/facebookicon.svg" alt=""></a>
            <a href="https://instagram.com/" target="_blank"><img class="footerIcons" src="static/img/instagramicon.svg" alt=""></a>
            <a href="https://github.com/" target="_blank"><img class="footerIcons" src="static/img/githubicon.svg" alt=""></a>
        </footer>
    </body>
</html>