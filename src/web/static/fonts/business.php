<?php

use MongoDB\BSON\ObjectID;

// Połączenie z bazą danych
function get_db(){
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

// Funkcja wstawiająca znak wodny do zdjęcia
function watermark($watermark, $fileExt, $fileName){
    if($fileExt == 'png'){
        $image = imagecreatefrompng('images/'.$fileName.'.'.$fileExt);
    }
    else{
        $image = imagecreatefromjpeg('images/'.$fileName.'.'.$fileExt);
    }

    $stamp = imagecreatetruecolor(200, 70);
    imagefilledrectangle($stamp, 0, 0, 199, 169, 0x05AFF2);
    imagefilledrectangle($stamp, 9, 9, 190, 60, 0xFFFFFF);
    imagestring($stamp, 5, 20, 20, $watermark, 0x2E424A);

    $right = 10;
    $bottom = 10;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

    imagecopymerge($image, $stamp, imagesx($image) - $sx - $right, imagesy($image) - $sy - $bottom, 0, 0, imagesx($stamp), imagesy($stamp), 70);

    if($fileExt == 'png'){
        imagepng($image, 'images/'.$fileName.'watermark'.'.'.$fileExt);
    }
    else{
        imagejpeg($image, 'images/'.$fileName.'watermark'.'.'.$fileExt);
    }
    imagedestroy($image);
}

function thumbnail($fileExt, $fileName){
    // Według zaleceń rozmiar 200x125
    $width = 200;
    $height = 125;
    if($fileExt == 'png'){
        $image = imagecreatefrompng('images/'.$fileName.'.'.$fileExt);
        $image = imagescale($image, $width, $height);
        imagepng($image, 'images/'.$fileName.'thumbnail'.'.'.$fileExt);  
        imagedestroy($image);
    }
    else{
        $image = imagecreatefromjpeg('images/'.$fileName.'.'.$fileExt);
        $image = imagescale($image, $width, $height);
        imagejpeg($image, 'images/'.$fileName.'thumbnail'.'.'.$fileExt);
        imagedestroy($image);
    }
}

function toDataBase($watermark, $fileExt, $fileName, $title, $author){
    $db = get_db();

    $image = [
        'watermark' => $watermark,
        'title' => $title,
        'author' => $author,
        'extension' => $fileExt,
        'photo' => 'images/'.$fileName.'.'.$fileExt,
        'photoWatermark' =>'images/'.$fileName.'watermark'.'.'.$fileExt,
        'photoThumbnail' => 'images/'.$fileName.'thumbnail'.'.'.$fileExt,
    ];

    $db->gallery->insertOne($image);
}

function getCertainImages($skip, $limit){
    $db = get_db();
    $query = [];
    $opts = ['skip' => $skip, 'limit' => $limit,];
    $images = $db->gallery->find($query, $opts);
    return $images;
}

function getImages(){
    $db = get_db();
    $images = $db->gallery->find();
    return $images;
}

function sessionImages($pages){
    $photos = array();
    $db = get_db();

    $images = $db->gallery->find();

    foreach($images as $image){
        for ($int = 1; $int <= $pages; $int++){
            $id = $image['_id'].'';
            if (isset($_SESSION['C'.$int])){
                if (array_key_exists($id, $_SESSION['C'.$int])){
                    array_push($photos, $image);      
                }
            }
        }
    }
    return $photos;
}

function certainSessionImages($skip, $limit, $photos){
    $query = [];
    $opts = ['skip' => $skip, 'limit' => $limit,];

    $images = array();

    for ($int = $skip; $int < $skip+$limit; $int++){
        if (isset($photos[$int])){
            array_push($images, $photos[$int]);
        }
    }

    return $images;
}

// Funkcja usuwająca elementy kolekcji użytkownicy
function delete_user_collection_data(){
    $db = get_db();
    $db->users->drop([]);
}

// Funkcja sprawdza i dodaje do bazy danych nowego użytkownika
function check_and_add_new_user($email, $login, $password, $password_repeat){
    if(empty($email) || empty($login) || empty($password) || empty($password_repeat)){
        return 'Not all sections were filled.';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return 'Given email is not correct.';
    }

    $db = get_db();
    $logins = $db->users->find([
        'login' => $login
    ])->toArray();
    $emails = $db->users->find([
        'email' => $email
    ])->toArray();

    if(count($logins) !== 0){
        return 'Given login is already taken, please register with new login.';
    }
    if(count($emails) !== 0){
        return 'Given email is already taken, please login with it or register with new email.';
    }
    if($password == $password_repeat){
        $db->users->insertOne((object)[
            'email' => $email,
            'login' => $login,
            'password' => hash("sha512", $password)
        ]);
        return 'Registration is complete!';
    }
    else{
        return "Given passwords doesn't match. They should be identical.";
    }
}

// Funkcja sprawdzająca nowego użytkownika
function check_old_user($login, $password, &$user_id){
    if(empty($login) || empty($password)){
        return 'One of the fields is empty. Please fill it and continue.';
    }

    $db = get_db();
    $user = $db->users->find([
        'login' => $login,
        'password' => hash("sha512", $password)
    ])->toArray();

    if(count($user) !== 0){
        $user_id = $user[0]->_id;
        return 'You logged in.';
    }
    else{
        return 'Login credentials are invalid. Please try again.';
    }
}

?>