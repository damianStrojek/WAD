<?php
    // Damian Strojek 184407 2021 WAI
    require '../../vendor/autoload.php';

    require_once '../dispatcher.php';
    require_once '../routing.php';
    require_once '../controllers.php';

    // Aspekty globalne
    session_start();

    // Kontroler do wywołania : 
    $action_url = $_GET['action'];
    dispatch($routing, $action_url);

?>