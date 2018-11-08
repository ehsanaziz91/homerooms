<?php

    session_start();
    $_SESSION["userid"];

    unset($_SESSION["userid"]);

    session_unset();

    session_destroy();

    header("location:loginPage.php");
	
?>