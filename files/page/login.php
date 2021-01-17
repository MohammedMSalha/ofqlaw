<?php 
include('../../index.php');
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION['userid']) && isset($_SESSION["type"]) && isset($_SESSION['email']) ) {
    header("Location: /dashboard");
    exit();
} 
include(INC_ROOT."functions.php");
include(LOGIN_PARTS."header.php");
include(CONTENT."login.php");
include(LOGIN_PARTS."footer.php");
