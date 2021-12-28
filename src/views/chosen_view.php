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
            <h2>Chosen photos from gallery</h2>
            <div class="gallery">
                <form method="POST">
                    <div class="imagesGallery">
                        <?php foreach($images as $image):?>
                            <div class="imageGallery">
                                <input type="checkbox" name="<?=$image['_id']?>"/>
                                <br>
                                <a href="<?=$image['photoWatermark']?>" target="_blank"><img src="<?=$image['photoThumbnail']?>" alt="<?=$image['watermark']?>"></a>
                                <br/>
                                <p>Title: <span><?=$image['title']?></span></p>
                                <p>Author: <span><?=$image['author']?></span></p>
                            </div>
                        <?php endforeach ?>
                        <br>
                    </div>

                    <div class="paging">
                        <?php 
                            for ($page = 1; $page <= $pages; $page++) {
                                echo '<a href="/chosen?page='.$page.'">'.$page.' strona  '.'</a>';
                            }
                        ?>
                    </div>
                    <br>
                    <input type="submit" value="Delete chosen photos" class="buttonGallery">
                </form>
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