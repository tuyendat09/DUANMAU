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


function userInsert($username, $pass)
{
    $sql = "INSERT INTO khachhang(username, password, active, role) 
    VALUES (?,?,?,?)";
    pdo_execute($sql, $username, $pass, 0,0);
}


function userUpdate($username, $name, $pass, $avatar ,$email,$location,$phone)
{
    $sql = "UPDATE khachhang SET name=?,password=? ,avatar=?,email=?,location=?,phone=? WHERE username=?";
    pdo_execute($sql, $name, $pass, $avatar, $email,$location ,$phone ,$username);
}

function resetPass($password,$username) {
    $sql = "UPDATE khachhang SET password=? WHERE username=?";
    pdo_execute($sql, $password,$username);
}

// function userUpdate($username, $pass, $name, $avatar, $email) {
//     $sql = "UPDATE khachhang SET password=?, name=?, avatar=?, email=? WHERE username=?";
//     pdo_execute($sql, [$pass, $name, $avatar, $email, $username]);
// }
