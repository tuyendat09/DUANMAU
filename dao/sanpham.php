<?php
require_once 'pdo.php';

function hang_hoa_insert($name,$img,$price,$saleprice,$des,$sale,$hot,$iddm){
    $sql = "INSERT INTO sanpham(name, img, price, saleprice, des,sale ,bestseller ,iddm) VALUES (?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $name, $img, $price, $saleprice,$des,$sale,$hot,$iddm);
}

function hang_hoa_update($ma_hh, $name,$img,$price,$saleprice,$des,$sale,$hot,$iddm){
    $sql = "UPDATE sanpham SET name=?,img=?,price=?,saleprice=?,des=?,sale=?,bestseller=?, iddm=? WHERE id=?";
    pdo_execute($sql,$name, $img, $price, $saleprice,$des,$sale,$hot,$iddm, $ma_hh);
}

function get_sp() {
    $sql = "SELECT * FROM sanpham ORDER BY id ASC";
    return pdo_query($sql);
}

function get_dssp_sale($limi){
    $sql = 'SELECT * FROM sanpham WHERE sale=1 ORDER BY id DESC limit '.$limi;
    return pdo_query($sql);
}
function get_dssp_best($limi){
        $sql = 'SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit '.$limi;
    return pdo_query($sql);
}
function get_dssp_view($limi){
    $sql = "SELECT * FROM sanpham ORDER BY view DESC limit ".$limi;
    return pdo_query($sql);
}

function get_dssp_sale_by_cata($sale,$cata,$limi){
    $sql = "SELECT * FROM sanpham where iddm=? and sale=? ORDER BY view DESC limit ".$limi;
    return pdo_query($sql,$cata, $sale);
}

function get_dssp($result,$iddm,$limi){
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($iddm>0){
        $sql .=" AND iddm=".$iddm;
    }
    if ($result!="") {
        $sql .=" AND name like '%".$result."%'";
    }
    $sql .= " ORDER BY id DESC limit ".$limi;
    return pdo_query($sql);
}

function getsp_splienquan($iddm,$idsp){
    $sql = "SELECT * FROM sanpham WHERE iddm=".$iddm." AND id<>".$idsp." ORDER BY id DESC";
    return pdo_query($sql);
}


function get_chitiet($id){
    $sql = "SELECT * FROM sanpham where id like " .$id;
    return pdo_query_one($sql);
}

function getimg($idsp){
    $sql = "SELECT img FROM sanpham WHERE id=".$idsp;
    $img = pdo_query_one($sql);
    return $img['img'];
}

function delete_sp($id) {
    $sql = "DELETE FROM sanpham WHERE id=".$id;
    return pdo_query_one($sql);  
}