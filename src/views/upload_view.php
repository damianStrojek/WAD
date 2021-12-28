<!-- Damian Strojek 184407 2021 WAI -->
<!doctype html>
<html lang="en">
    <head>
        <title>My hobby - ESPORT Upload</title>
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

        <section class="upload">
            <h2>Send us your photo!</h2>
            <p>Choose a photo to send :</p>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="file" id="fileToUpload" class="buttonsgallery" accept=".png, .jpg, .jpeg" required>
                <br><br>
                <input type="text" placeholder="Title:" name="title" class="buttonsgallery" required>
                <br><br>
                <?php if(isset($_SESSION['user_id'])): ?>
                    Author: <?= author(); ?>
                    <br><br>
                    <input type="radio" name="isPrivate" value="public">Public
                    <input type="radio" name="isPrivate" value="private">Private
                <?php else:?>
                    <input type="text" placeholder="Author:" name="author" class="buttonsgallery" required>
                <?php endif;?>
                <br><br>
                <input type="text" placeholder="Watermark:" name="watermark" class="buttonsgallery" required>
                <br><br>
                <input type="submit" value="Upload a photo" name="submit" class="buttonsgallery" required>
            </form>
            <?php if($isAdded == true) 
                echo $errorText;
            ?>
        </section>

        <footer>
            <p class="footerText">DAMIAN STROJEK 2020</p>
            <a href="https://facebook.com/" target="_blank"><img class="footerIcons" src="static/img/facebookicon.svg" alt=""></a>
            <a href="https://instagram.com/" target="_blank"><img class="footerIcons" src="static/img/instagramicon.svg" alt=""></a>
            <a href="https://github.com/" target="_blank"><img class="footerIcons" src="static/img/githubicon.svg" alt=""></a>
        </footer>
    </body>
</html>