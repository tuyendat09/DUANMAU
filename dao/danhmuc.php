<?php
require_once 'pdo.php';


// /**
//  * Thêm loại mới
//  * @param String $ten_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
function danhmuc_insert($ten_danhmuc){
    $check = danhmuc_exist($ten_danhmuc);
    if ($check == 0 ) {
        $sql = "INSERT INTO danhmuc(name) VALUES(?)";
        pdo_execute($sql, $ten_danhmuc);
        $ee = 0;
    } else {
        $ee = 1;
    }    
    return $ee;
}
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
function danhmuc_update($ma_danhmuc, $ten_danhmuc){
    $sql = "UPDATE danhmuc SET name=? WHERE id=?";
    pdo_execute($sql, $ten_danhmuc, $ma_danhmuc);
}

function detail_cata($id){
    $sql = "SELECT * FROM danhmuc where id like " .$id;
    return pdo_query_one($sql);
}
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
function danhmuc_delete($ma_danhmuc){
    $sql = "DELETE FROM danhmuc WHERE id=?";
    if(is_array($ma_danhmuc)){
        foreach ($ma_danhmuc as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_danhmuc);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_all(){
    $sql = "SELECT * FROM danhmuc ORDER BY id DESC";
    return pdo_query($sql);
}
// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_select_by_id($ma_danhmuc){
//     $sql = "SELECT * FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_one($sql, $ma_danhmuc);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
function danhmuc_exist($ten_danhmuc){
    $sql = 'SELECT count(name) FROM danhmuc WHERE name = "'.$ten_danhmuc.'" ' ;
    return pdo_query_value($sql);
}

