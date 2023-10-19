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

function cartInsert($IDUser,$IDProduct,$IDBill,$quantity) {
    $sql = "INSERT INTO cart(IDUser, IDPRoduct, IDBill,Quantity) 
    VALUES (?,?,?,?)";
    pdo_execute($sql,$IDUser,$IDProduct,$IDBill,$quantity);
}

function billInsert($tongtien,$ngaydat,$ghichu, $idUser,$name,$location,$ship,$phone,$email) {
        $sql = "INSERT INTO bill(tongtien, ngaydat, ghichu,IDUser,name,location,ship,phone,email) 
        VALUES (?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql,$tongtien,$ngaydat,$ghichu,$idUser,$name,$location,$ship,$phone,$email);
}

function getIDBill(){
    $sql = "SELECT id FROM bill order by ID desc limit 1";
    return pdo_query($sql);
}
function curdate() {
    return date('Y-m-d');
}

function orderedBill_detail($id) {
    $sql = "
    SELECT sanpham.name,bill.ngaydat,bill.tongtien, sanpham.img, sanpham.price, sanpham.saleprice, sanpham.sale, cart.quantity
    FROM sanpham
    JOIN cart ON sanpham.id = cart.IDProduct
    JOIN bill ON cart.IDBill = bill.id
    WHERE bill.id = ".$id.";
";
return pdo_query($sql);
    
}

function orderedBill($idUser) {
    $sql = "
    SELECT id, ngaydat
    FROM bill
    WHERE IDUSer = ".$idUser."";
return pdo_query($sql);
    
}