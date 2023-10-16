<?php
session_start();
ob_start();
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if(!isset($_SESSION['wrong'])) {
    $_SESSION['wrong'] = 0;
}

if(!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = 0;
}

if (!isset($_SESSION['avatar'])) {
    $_SESSION['avatar'] = "";
}



// $_SESSION['cart'] = [];



    // nhúng kết nối csdl
    include "dao/pdo.php";
    include "dao/danhmuc.php";
    include "dao/sanpham.php";
    include 'dao/user.php';
    include 'dao/global.php';
    include "view/header.php";

    //data dành cho trang chủ
    $dssp_sale= get_dssp_sale(4);
    $dssp_best= get_dssp_best(4,0);
    $dssp_view= get_dssp_view(4);
    $dssp_sale_iPhone = get_dssp_sale_by_cata(1,1,4);
    $all_spBest_cofe = get_dssp_best(4);

    if(!isset($_GET['pg'])){

        include "view/home.php";
    }else{
        switch ($_GET['pg']) {
            case 'addcart' :
                if(isset($_POST['addcart'])) {
                    $productName = $_POST['name'];
                    $productImg = $_POST['img'];
                    $productPrice = $_POST['price'];
                    $productQuantity = 1;
                    $product = [
                        'name' => $productName,
                        'img' => $productImg,
                        'price' => $productPrice,
                        'quantity' => $productQuantity,
                    ];
                    array_push($_SESSION['cart'],$product);
                    

                    header('location: index.php?pg=viewcart');
                }
                break;
                case 'viewcart' :
                    if(isset($_GET['del']) && ($_GET['del']==1)) {
                        $_SESSION['cart'] = [];
                        header('location: index.php?pg=viewcart');
                    } else if(isset($_GET['delID']) && ($_GET['delID'] >= 0)) {
                        $del_id = $_GET['delID'];
                        unset($_SESSION['cart'][$del_id]);
                        header('location: index.php?pg=viewcart');
                    }
                    else {
                       include 'view/cart.php';    
                    }
                    break;
            case 'sanpham':
                $dsdm= danhmuc_all();

                if(!isset($_GET['iddm'])){
                    $iddm=0;
                }else{
                    $iddm=$_GET['iddm'];
                }

                if(isset($_POST['timkiem']) && ($_POST['timkiem'])) {
                    $result = $_POST['result'];
                    
                } else {
                    $result = "";
                }
                  $dssp=get_dssp($result ,$iddm,12);

                include "view/sanpham.php";
                break;
            case 'chitiet':
                if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $detail = get_chitiet($id);
                    $idCata = $detail['iddm'];
                    $relateProduct = getsp_splienquan($idCata,$id);
                    include_once 'view/chitiet.php';
                } else {
                    header('location index.php');
                }
    
                break;
                case 'dangnhap' :
                    include_once 'view/dangnhap.php';
                break;
            case 'login' :
                if(isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    $userCheck = getUser($username,$password);
                   
                  if (is_array($userCheck)) {
                    $_SESSION['wrong'] = 0;
                      if($userCheck['role'] == 1) {
                        header('location: admin/index.php');
                    } 
                      else {
                        $_SESSION['logged'] = 1;
                        $_SESSION['user'] = $userCheck['username'];
                        $_SESSION['avatar'] = $userCheck['avatar'];
                        header('location: index.php');
                    }
                  } else {
                    $_SESSION['wrong'] = 1;
                      header('location: index.php?pg=dangnhap');
                  }
                 } 
                  break;
            case 'dangky' :
                include_once 'view/dangky.php';
            break;
            case 'register' :
                if(isset($_POST['register'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $userCheck = getUser($username,"");

                  if (is_array($userCheck)) {
                    header('location: index.php?pg=dangky&dup=1');
                    ;

                  } else {
                      $userRegister = userInsert($username,$password,0,0);
                      header('location: index.php?pg=dangky');
                  }
                }
            break;
            case 'logout' :
                    $_SESSION['logged'] = 0;
                    $_SESSION['user'] = "";
                    header('location: index.php');
             case 'user': 
                include "view/user.php";
                break;
             case 'updateuser': 
                if(isset($_POST['updateuser']) && isset($_FILES['avatar'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $avatar = $_FILES['avatar']['name'];
                    userUpdate($username,$name,$password,$avatar,$email);
                    // UPLOAD TO HOST
                    $todir = './'.PATH_IMG.'users/';
                    // chuyển hình vào upload/imgs/users
                    move_uploaded_file( $_FILES['avatar']['tmp_name'],
                     $todir . basename($_FILES['avatar']['name'] ));
                    //  Xóa hình cũ
                     // LẤY HÌNH CŨ
                     $old_img = $_POST['old_img'];
                    // Đường dẫn hình cũ
                    $img_file = './'.PATH_IMG.'users/'.$old_img;
                    // CHECK xem có tồn tại k
                    if(file_exists($img_file)) {
                        unlink($img_file);
                    }
                    // DELETE FORM HOST
                    header('location: index.php?pg=user');


                }
                break;
            default:
                include "view/home.php";
                break;
        }
    }
    

    include "view/footer.php";

?>