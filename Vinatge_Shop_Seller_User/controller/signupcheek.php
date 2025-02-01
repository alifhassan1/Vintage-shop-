<?php
session_start();
require_once('../userModel/maindb.php');

if (isset($_REQUEST['submit'])) {
    $username = trim($_REQUEST['username']);
    $full_name = trim($_REQUEST['fullname']);
    $password = trim($_REQUEST['password']);
    $email = trim($_REQUEST['email']);
    $phoneno = $_REQUEST['phone'];
    $confirm_pass = trim($_REQUEST['confirmpassword']);
    $companyname = $_REQUEST['companyname'];
    $nidNumber = $_REQUEST['nidNumber'];
    $tinNumber = $_REQUEST['tinNumber'];

    

    if (empty($username)) 
    {
        echo "Username is required<br>";
    } 
    else if (strlen($username) < 3)
     {
        echo "Username must be at least 3 characters long<br>";
    } 
    else if (empty($full_name)) 
    {
        echo "Full name is required<br>";
    } else {
       
        $wordCount = 0;
        $inWord = false;

        for ($i = 0; $i < strlen($full_name); $i++) {
            $char = $full_name[$i];

            
            if ($char != ' ') {
                if (!$inWord) {
                    $inWord = true;
                    $wordCount++;
                }
            } else {
                $inWord = false; 
            }
        }

        if ($wordCount <2) 
        {
            echo "Full name must have at least 3 words<br>";
        }
         else if (empty($email)) 
         {
            echo "Email is required<br>";
        } 
        else 
        {
           
            $atCount = 0;
            $dotCount = 0;
            $atPosition = -1; 
            $dotPosition = -1; 
            $isValid = true; 

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

                
                if (
                    $atCount > 1 || 
                    ($dotCount > 0 && $dotPosition <= $atPosition + 1) || 
                    ($i == 0 && $char == '@') || 
                    ($i == strlen($email) - 1 && ($char == '@' || $char == '.')) 
                ) {
                    $isValid = false;
                    break;
                }
            }

            if (!$isValid || $atCount != 1 || $dotCount < 1 || $dotPosition <= $atPosition) {
                echo "Invalid email format<br>";
            }
             else if (empty($phoneno)) 
             {
                echo "Phone number is required<br>";
            }
             else if (empty($password))
             {
                echo "Password is required<br>";
            }
             else if (strlen($password) < 5)
             {
                echo "Password must be at least 5 characters long<br>";
            } 
            else if (empty($confirm_pass)) 
            {
                echo "Confirmation password is required<br>";
            } 
            else if ($password !== $confirm_pass) 
            {
                echo "Passwords do not match<br>";
            }
            else if (empty($companyname)) 
            {
                echo "Company name is required<br>";
            } 
            else if (empty($nidNumber)) 
            {
                echo "Nid Number is required<br>";
            } 
            else if (empty($tinNumber)) 
            {
                echo "Tin Number is required<br>";
            } 

            else
             {
                $status = addUser($username, $full_name, $password, $email, $phoneno, $companyname, $nidNumber, $tinNumber);
                if ($status) {
                    header('location:../view/signin.php');
                } else {
                    echo "Could not add user to the database<br>";
                }
            }
        }
    }
} else {
    header('location:signup.html');
}
?>
