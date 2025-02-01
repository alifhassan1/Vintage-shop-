<?php
require_once('../userModel/maindb.php');

if (isset($_REQUEST['submit'])) {
    $email = trim($_REQUEST['email']);
    $comment = trim($_REQUEST['comment']);


    if (empty($email) || empty($comment)) {
        echo "Null input";
    } else {
        $atCount = 0;
        $dotCount = 0;
        $atPosition = 0;
        $dotPosition = 0;

       
        for ($i = 0; $i < strlen($email); $i++) {
            $char = $email[$i];

            if ($char == '@') {
                $atCount++;
                $atPosition = $i;
            }

            if ($char == '.') {
                $dotCount++;
                $dotPosition = $i;
            }

            if (($atCount > 1) || 
                ($dotCount > 0 && $dotPosition <= $atPosition + 1) || 
                ($i == 0 && $char == '@') || 
                ($i == strlen($email) - 1 && ($char == '@' || $char == '.'))) {
                echo "Invalid email<br>";
                
            }
        }

       
        

        
        if ($atCount == 1 && $dotCount > 0 && $dotPosition > $atPosition) {
            $status = query($email, $comment);
            if ($status) {
              
                echo "Contratulations Submitted Successfully";
            } else {
                echo "Comment not added";
            }
        }
    }
} else {
    header('location:../view/contract.html');
}
?>
