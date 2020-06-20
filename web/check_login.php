<?php
    require_once './session.php';
    require_once '../services/service.php';

    $services = new Services();
    echo $_SESSION['author_session'];

    if ($_SESSION['author_session'] == "ADMIN") {
        $services->redirect('manager.php'); // premission
    }
    if ($_SESSION['author_session'] == "USER") {
        $services->redirect('home.php'); // premission
    }

?>