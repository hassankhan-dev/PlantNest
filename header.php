<?php
    session_start();
    if(isset($_SESSION['userDetails'])){
        $userName = $_SESSION['userDetails']['userName'];
    }

    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("location:./index.php");
    }
    
?>