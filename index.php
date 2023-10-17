<?php
session_start();

ob_start();
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if(!isset($_SESSION['wrong'])) {
    $_SESSION['wrong'] = 0;
}

if(!isset($_SESSION['lastprice'])) {
    $_SESSION['lastprice'] = 0;
}



if(!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = 0;
}




if (!isset($_SESSION['registerDone'])) {
    $_SESSION['registerDone'] = 0;
}

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [];
}



// $_SESSION['lastprice'] = 0;
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
                 
                    if(isset($_GET['delID']) && ($_GET['delID'] >= 0)) {
                        $del_id = $_GET['delID'];
                        unset($_SESSION['cart'][$del_id]);
                        header('location: index.php?pg=viewcart');
                    } 

                       include 'view/cart.php';    
                    break;
            case 'sanpham':
                $dsdm= danhmuc_all();

                if(!isset($_GET['iddm'])){
                    $iddm=0;
                }else{
                    $iddm=$_GET['iddm'];
                }

                if(isset($_POST['timkiem'])) {
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
                        $_SESSION['user'] = [
                            'username' => $userCheck['username'],
                            'pass' => $userCheck['password'],
                            'name' => $userCheck['name'],
                            'avatar' => $userCheck['avatar'],
                            'email' => $userCheck['email'],
                            'active' => $userCheck['active'],
                            'role' => $userCheck['role'],
                            'location' => $userCheck['location'],
                            'phone' => $userCheck['phone']

                        ];
                        header('location: index.php');
                    }
                  } else {
                      $_SESSION['user']['username'] = $username;
                      header('location: index.php?pg=dangnhap&wrong=1');
                      
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
                      header('location: index.php?pg=dangky&dup=0');
                  }
                }
            break;
            case 'logout' :
                $_SESSION['user'] = [
                    'username' => "",
                    'pass' => "",
                    'name' => "",
                    'avatar' => "",
                    'email' => "",
                    'active' => "",
                    'role' => ""
                ];
                $_SESSION['logged'] = 0;

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
                        $location = $_POST['location'];
                        $phone = $_POST['phone'];

                        // CHECK VI TRI TRONG
                        if($password == "") {
                            $password = $_SESSION['user']['pass'];
                        }
                        if ($name == "") {
                            $name = $_SESSION['user']['name'];
                        }
                        if ($email == "") {
                            $email = $_SESSION['user']['email'];
                        }
                        if ($avatar == "") {
                            $avatar = $_SESSION['user']['avatar'];
                        }
                        if ($location == "") {
                            $location = $_SESSION['user']['location'];
                        }
                        if ($phone == "") {
                            $phone = $_SESSION['user']['phone'];
                        }
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
                            // unlink($img_file);
                        }
                        // CAP NHAT LAI SESSION
                        $_SESSION['user'] = [
                            'username' => $username,
                            'pass' => $password,
                            'name' => $name,
                            'avatar' => $avatar,
                            'email' => $email,
                            'location' => $location,
                            'phone' => $phone,

                        ];
                        // DELETE FORM HOST
                        userUpdate(
                            $_SESSION['user']['username'],
                            $_SESSION['user']['name'],
                            $_SESSION['user']['pass'],
                            $_SESSION['user']['avatar'],
                            $_SESSION['user']['email'],
                            $_SESSION['user']['location'],
                            $_SESSION['user']['phone']
                            
                        );
                        header('location: index.php?pg=user');
                    }
                    break;

            case 'checkout': 
                if (isset($_POST['submit'])) {
                    $test = $_POST['radio'];
                    $email = $_POST['name'];
                    $location = $_POST['location'];
                    $phone = $_POST['phone'];
                  }

                  if(isset($_GET['delID']) && ($_GET['delID'] >= 0)) {
                    $del_id = $_GET['delID'];
                    unset($_SESSION['cart'][$del_id]);
                    header('location: index.php?pg=checkout');
                } 
                include_once "view/checkout.php";
                break;

                case 'ordered' :
                    include "view/ordered.php";
                    break;
            default:
                include "view/home.php";
                break;
        }
    }
    

    include "view/footer.php";
