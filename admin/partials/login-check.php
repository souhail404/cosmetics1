<?php
if(!isset($_SESSION['login-check']))
{
    
    $_SESSION['no-login']="<div class='fail-message'>plaese enter the username and password to login</div>";
    header("location:".SITEURL.'admin/login.php');
}
?>