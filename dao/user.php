<?php
require_once "pdo.php";


function getUser($user, $pass)
{
    if ($pass == "") {
        $sql = "SELECT * FROM khachhang where username= '$user'";
    } else {
        $sql = "SELECT * FROM khachhang where username= '$user' AND password='$pass'";
    }
    return pdo_query_one($sql);
}

function checkUser($user)
{
    $sql = "SELECT * FROM khachhang where username= '$user'";
    return pdo_query_one($sql);
}


function userInsert($username, $pass, $active, $role)
{
    $sql = "INSERT INTO khachhang(username, password, active, role) 
    VALUES (?,?,?,?)";
    pdo_execute($sql, $username, $pass, $active, $role);
}


// function userUpdate($username, $pass, $name, $avatar ,$email) {
//     $sql = "UPDATE khachhang SET password= ".$pass.",name=".$name." ,avatar=".$avatar.",email=".$email." WHERE username=".$username."";
//      pdo_execute($sql);
// }

function userUpdate($username, $pass, $name, $avatar, $email) {
    $sql = "UPDATE khachhang SET password=?, name=?, avatar=?, email=? WHERE username=?";
    pdo_execute($sql, [$pass, $name, $avatar, $email, $username]);
}
