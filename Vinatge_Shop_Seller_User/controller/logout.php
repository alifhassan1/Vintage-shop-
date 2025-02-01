<?php

   
    setcookie('status', 'true', time()-10, '/');
    header('location: ../view/signin.php');
?>