<?php
session_start();
session_destroy();
if ($_SESSION['UserPass']==""){
header('Location: login.html');
}else{
header('Location: login_final.php');
}
?>