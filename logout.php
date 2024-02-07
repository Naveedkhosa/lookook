<?php
session_start();
if(isset($_SESSION['logged_user_id'])){
    session_unset();
    session_destroy();
}
    
header("location:login");