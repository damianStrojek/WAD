<?php
    // Damian Strojek 184407 2021 WAI
    $db = get_db();
    $q = $_REQUEST['q'];
    $hint = "";

    if ($q !== "") {
        $query = ['title' => ['$regex' => $q, '$options' => 'i']];
        $images = $db->gallery->find($query)->toArray();
        $howMany = count($images);

        if($howMany !== 0){
            foreach($images as $name){
                $image = "<div class='imageGallery'><a href='".$name['photoWatermark']."' target='_blank'><img src='".$name['photoThumbnail']."' alt='".$name['watermark']."' /><br>";
                $desc = "<p>Title: <span>".$name['title']."</span></p><p>Author: <span>".$name['author']."</span></p></div>";
                echo $image;
                echo $desc;
            }
        }
        else{
            echo "no suggestion";
        }
    }
?>