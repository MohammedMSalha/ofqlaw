<?php 
session_start();

if(!isset($_SESSION["username"]) || !isset($_SESSION['userid']) || !isset($_SESSION['email']) || !isset($_SESSION['type'])) {
    header("Location: /login");
    exit();
}else{
    $status=CreateTables::user_check_status($_SESSION['userid']);
        
    if(!$status){
            $_SESSION["username"]=null;
            $_SESSION["email"]=null;
            $_SESSION["type"]=null;
            $_SESSION["userid"]=null;
            header("Location: /login");
            exit();
    }
    if($_SESSION['type']==2){
         
            header("Location: /dashboard");
            exit();
   
    }
}
 