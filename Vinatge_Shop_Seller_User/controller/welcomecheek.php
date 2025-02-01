<?php
session_start();
 
if(isset($_REQUEST['signup']))
{
    //$_SESSION['status1']=true;
    header('location:../view/signup.php');
}
elseif(isset($_REQUEST['signin']))
{
    header('location:../view/signin.php');
}




?>