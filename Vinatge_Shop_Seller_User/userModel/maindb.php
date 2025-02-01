 
<?php
 
 function getConnection(){
     $con = mysqli_connect('127.0.0.1', 'root', '', 'demo');
     return $con;
 }

 function login($username, $password){
     $con = getConnection();
     $sql = "select * from user where username='{$username}' and password='{$password}'";
     $result = mysqli_query($con, $sql);
     $count = mysqli_num_rows($result);

     if($count ==1){
         return true;
     }else{
         return false;
     }
 }

 function addUser($username, $full_name, $password, $email, $phoneno, $nidNumber, $tinNumber, $companyname){
     $con = getConnection();
     $sql = "insert into user VALUES('', '{$username}', '{$full_name}', '{$password}', '{$email}', '{$phoneno}', '{$companyname}', '{$nidNumber}', '{$tinNumber}')" ;  
     if(mysqli_query($con, $sql)){
         return true;
     } else{
         return false;
     }
 }

 




function updateUser($id, $username, $password){
    $con = getConnection();
    $sql = "UPDATE user SET username='$username', password='$password' where id='$id'";
    if(mysqli_query($con, $sql)){
        return true;
    } else{
        return false;
    }
}


function deleteUser($id){
    $con = getConnection();
    $sql = "DELETE FROM user where id=$id";
    if(mysqli_query($con, $sql)){
        return true;
    } else{
        return false;
    }
}

function getUser($id){
    $con = getConnection();
    $sql = "select * from user where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getAllUser(){
    $con = getConnection();
    $sql = "select * from user";
    $result = mysqli_query($con, $sql);

    $users = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    }
    
    return $users;
}

function query($email, $comment){
    $con = getConnection();
    $sql = "insert into query VALUES('{$email}', '{$comment}')";
    if(mysqli_query($con, $sql)){
        return true;
    } else{
        return false;
    }
}


 

?>