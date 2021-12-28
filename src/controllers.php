<?php
    // Damian Strojek 184407 2021 WAI   
    require_once 'business.php';

    function index(&$model){
        return 'index_view';
    }

    function statistics(&$model){
        return 'statistics_view';
    }

    function counterstrike(&$model){
        return 'counterstrike_view';
    }

    function leagueoflegends(&$model){
        return 'leagueoflegends_view';
    }

    function buying(&$model){
        return 'buying_view';
    }

    function support(&$model){
        return 'support_view';
    }

    function search(&$model){
        return 'search_view';
    }

    function search_ajax(&$model){
        return '../functions/search_ajax';
    }

    function gallery(&$model){
        $photos = getImages();
        $quantity = count($photos);
        $pageSize = 5;
        $pages = ceil($quantity/$pageSize);
        $model['pages'] = $pages;
        $model['page'] = 1;

        if(!isset($_GET['page'])){
            $page = 1;
            $model['page'] = $page;
        }
        else{
            $page = $_GET['page'];
            $model['page'] = $page;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $_SESSION['C'.$model['page']] = $_POST;
        }

        $skip = ($page - 1) * $pageSize;
        $limit = $pageSize;

        $certainPhotos = getCertainImages($skip, $limit, $pages);
        $model['images'] = $certainPhotos;

        return 'gallery_view';
    }

    function gallery_private(&$model){
        $author = author();
        $photos = getImagesPrivate($author);
        $model['images'] = $photos;
        return 'gallery_private_view';
    }

    function upload(&$model){
        $model['isAdded'] = false;
        $private = 'public';
        $author = 'noone';

        if(isset($_POST['submit'])){
            $model['errorText'] = false;
                
            $file = $_FILES['file'];
            $title = $_POST['title'];

            if(isset($_SESSION['user_id'])){
                $author = author();
                $private = $_POST['isPrivate'];
            }
            else{
                $author = $_POST['author'];
            }

            $watermark = $_POST['watermark'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $isOk = true;

            $fileExtension = explode('.', $fileName);
            $fileActualExtension = strtolower(end($fileExtension));
            $fileNewName = uniqid('', true);

            $mimeType = getimagesize( $file['tmp_name'] )['mime'];
            $fileElements = explode('/', $mimeType);
            $fileExt = strtolower(end($fileElements));

            $allowed = array('jpg', 'jpeg', 'png');
            $fileDestination = 'images/'.$fileNewName.'.'.$fileActualExtension;

            if(!in_array($fileExt, $allowed)){
                $model['errorText'] = "You can't upload a file with this extension!";
                $isOk = false;
                $model['isAdded'] = true;
            }
            else{
                if($fileSize > 1048576){
                    $model['errorText'] = "This file is too big!";
                    $isOk = false;
                    $model['isAdded'] = true;
                }
            }

            if($isOk){
                move_uploaded_file($fileTmpName, $fileDestination);
                $model['isAdded'] = true;
                watermark($watermark, $fileActualExtension, $fileNewName);
                thumbnail($fileActualExtension, $fileNewName);
                toDatabase($watermark, $fileActualExtension, $fileNewName, $title, $author, $private);
            }
        }
        return 'upload_view';
    }

    function chosen(&$model){
        $dbphotos = getImages();
        $dbquantity = count($dbphotos);
        $dbPageSize = 5;
        $dbpages = ceil($dbquantity/$dbPageSize);

        $photos = sessionImages($dbpages);
        $quantity = count($photos);
        $pageSize = 5;
        $pages = ceil($quantity/$pageSize);
        $model['pages'] = $pages;
        $model['page'] = 1;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            for($int = 1; $int <= $dbpages; $int++){
                if(isset($_SESSION['C'.$int])){
                    $chosen = $_SESSION['C'.$int];
                    foreach($_POST as $element=>$value){
                        if($element){
                            $chosen2 = array_keys($chosen);
                            if(array_search($element, $chosen2) !== false){
                                $key = array_search($element, $chosen2);
                                unset($chosen[$chosen2[$key]]);
                            }
                        }
                    }
                    $_SESSION['C'.$int] = $chosen;
                }
            }
            return 'redirect:chosen';
        }

        if(!isset($_GET['page'])){
            $page = 1;
            $model['page'] = $page;
        }
        else{
            $page = $_GET['page'];
            $model['page'] = $page;
        }

        $skip = ($page - 1) * $pageSize;
        $limit = $pageSize;

        $certainPhotos = certainSessionImages($skip, $limit, $photos);
        $model['images'] = $certainPhotos;

        return 'chosen_view';
    }

    function register(&$model){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $register_result = check_and_add_new_user($_POST['email'], $_POST['login'], $_POST['password'], $_POST['password_repeat']);
            $_SESSION['register_result'] = $register_result;
            return 'redirect: '.$_SERVER['HTTP_REFERER'];
        }
        else{
            return 'register_view';
        }
    }

    function login(&$model){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $login_result = check_old_user($_POST['login'], $_POST['password'], $user_id);
            $_SESSION['user_id'] = $user_id;
            $_SESSION['login_result'] = $login_result;
            return 'redirect: '.$_SERVER['HTTP_REFERER'];
        }
        else{
            return 'login_view';
        }
    }

    function logout(&$model){
        $_SESSION['user_id'] = NULL;
        return 'redirect: '.$_SERVER['HTTP_REFERER'];
    }

?>