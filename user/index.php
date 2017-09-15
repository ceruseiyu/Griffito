<?php
    session_start();
    if(isset($_SESSION['login_user'])) {
        require('../resource/cp.php');
    } else {
        header('Location: ../index.php');
    }
?>