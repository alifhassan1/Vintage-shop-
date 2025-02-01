<?php
require_once('../userModel/maindb.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];  
    $user = getUser($id);
} else {
    echo "No user id faund.";
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
   

    if (updateUser($id, $username, $password)) {
        header("Location: userinfo.php");
        exit;
    } else {
        echo "Could not update user.";
    }
}


?>


<html>
<head>
    <title>Update User Information</title>
</head>
<body>
    <h1>Update Information of user "<?=$user['username']?>"</h1>
    <form method="POST" onsubmit="return validateLoginForm()" action="update.php?id=<?= $id ?>">
    Username:
    <input type="text" id="username" name="username" value="<?= $user['username'] ?>" >
    <br>
    <span id="username_msg"></span><br>
    
    Password:
    <input type="password" id="password" name="password" value="<?= $user['password'] ?>" >
    <br>
    <span id="password_msg"></span><br>
    <input type="submit" value="Update">
</form>
<a href="userinfo.php">back</a>
 


<script>
function validateLoginForm() {
let username = document.getElementById('username').value;
let password = document.getElementById('password').value;
let valid = true;
 
if (username === "") {
document.getElementById('username_msg').innerHTML = "Username is required.";
document.getElementById('username_msg').style.color = 'red';
valid = false;
} else {
document.getElementById('username_msg').innerHTML = "";
}
 
if (password === "") {
document.getElementById('password_msg').innerHTML = "Password is required.";
document.getElementById('password_msg').style.color = 'red';
valid = false;
} else {
document.getElementById('password_msg').innerHTML = "";
}
 
return valid;
}
</script>
</body>
</html>
