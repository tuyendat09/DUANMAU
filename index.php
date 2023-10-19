<?php
session_start();
ob_start();
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if(!isset($_SESSION['lastprice'])) {
    $_SESSION['lastprice'] = 0;
}

if(!isset($_SESSION['logged'])) {
    $_SESSION['logged'] = 0;
}

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [
        'id' => NULL,
        'username' => "",
        'pass' => "",
        'name' => "",
        'avatar' => "",
        'email' => "",
        'location' => "",
        'phone' => "",
        'active' => "",
        'role' => ""
    ];
}
echo var_dump($_SESSION['user']);





// $_SESSION['lastprice'] = 0;
// $_SESSION['cart'] = [];




    // nhúng kết nối csdl
    include "dao/pdo.php";
    include "dao/danhmuc.php";
    include "dao/sanpham.php";
    include 'dao/user.php';
    include 'dao/global.php';
    include "view/header.php";

    // echo $IDBill;



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

                if (isset($_POST['addcart'])) {
                    $img = $_POST['img'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $idProduct = $_POST['id'];
                    $quantity = 1;
                    // Kiểm tra xem có session cart chưa
                    if (isset($_SESSION['cart']) && ($_SESSION['cart'] != "")) {
                      $flag = false;
                      // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
                      foreach ($_SESSION['cart'] as $key => $value) {
                        // Nếu có rồi thì tăng số lượng lên 1
                        if ($value['name'] == $name) {
                          $_SESSION['cart'][$key]['quantity'] += 1;
                          $flag = true;
                        }
                      }
                      // Nếu chưa có thì thêm vào giỏ hàng
                      if (!$flag) {
                        $product = [
                          "id" => $idProduct,
                          "img" => $img,
                          "name" => $name,
                          "price" => $price,
                          "quantity" => $quantity
                        ];
                        $_SESSION['cart'][] = $product;
                      }
                    }
                    // Nếu chưa có session cart 
                    else {
                      $product = [
                        "id" => $idProduct,
                        "img" => $img,
                        "name" => $name,
                        "price" => $price,
                        "quantity" => $quantity
                      ];
                      $_SESSION['cart'][] = $product;
                    }
                    header('Location: index.php?pg=viewcart');                 
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
                      if($userCheck['role'] == 1) {
                        header('location: admin/index.php');
                    } 
                      else {
                        $_SESSION['logged'] = 1;
                        $_SESSION['user'] = [
                            'id' => $userCheck['id'],
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
                    // kiểm tra user có tồn tại
                  if (is_array($userCheck)) {
                    header('location: index.php?pg=dangky&dup=1');
                  } else {
                      $userRegister = userInsert($username,$password);
                      header('location: index.php?pg=dangky&dup=0');
                  }
                }
            break;
            case 'forgetPass' :
                // Kiểm tra user có tồn tại hay k
                if(isset($_POST['forgetSubmit'])) {
                    $username = $_POST['username'];
                    $userCheck = getUser($username,"");
                    if (!is_array($userCheck)) {
                        header('location: index.php?pg=forgetPass&wrong=1');
                    } else {
                        $_SESSION['user']['username'] = $username;
                        header('location: index.php?pg=resetPass');

                    }
                }
                include 'view/forgetpass.php';
                break;

            case 'resetPass' :
                if(isset($_POST['resetSubmit'])) {
                    $username = $_SESSION['user']['username'];
                    $new_password = $_POST['password'];
                    resetPass($new_password,$username);
                    $_SESSION['user']['username'] = "";
                    header('location: index.php?pg=dangnhap');
                }
                include 'view/resetPass.php';
                break;

                include 'view/forgetpass.php';
                break;
            case 'logout' :
                $_SESSION['user'] = [
                    'id' => NULL,
                    'username' => "",
                    'pass' => "",
                    'name' => "",
                    'avatar' => "",
                    'email' => "",
                    'location' => "",
                    'phone' => "",
                    'active' => "",
                    'role' => ""
                ];
                $_SESSION['cart'] = [];
                $_SESSION['lastprice'] = 0;
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
                            'id' => $_SESSION['user']['id'],
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
                case 'orderedList':
                    $idUser = $_SESSION['user']['id'];
                    $order = orderedBill($idUser);
                    include 'view/orderedList.php';
                    break;
            case 'checkout': 
                if (isset($_POST['submit'])) {
                    $idUser = $_SESSION['user']['id'];
                    $ship = $_POST['radio'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $location = $_POST['location'];
                    $phone = $_POST['phone'];
                    $note = $_POST['note'];
                    $total = $_SESSION['lastprice'];
                    // NHET ZO BILL
                    billInsert($total,curdate(),$note,$idUser,$name,$location,$ship,$phone,$email);
                    // NHET SESSION CART ZO GIO HANG
                    $IDBill = getIDBill()[0]['id'];
                        foreach ($_SESSION['cart'] as $key) {
                            extract($key);
                            cartInsert($_SESSION['user']['id'],$id,$IDBill,$quantity);
                        }

                    $_SESSION['cart'] = [];
                    $_SESSION['lastprice'] = 0;
                    header('location: index.php?pg=ordered');
                  }

                  if(isset($_GET['delID']) && ($_GET['delID'] >= 0)) {
                    $del_id = $_GET['delID'];
                    unset($_SESSION['cart'][$del_id]);
                    header('location: index.php?pg=checkout');
                } 

                // TRANG THANH TOAN
                include_once "view/checkout.php";
                break;
                // TRANG THANH TOAN XONG
                case 'ordered' :
                    include "view/ordered.php";
                    break;
                // TRANG XEM LAI ORDER NEU LA USER
                case 'orderDetail' :
                    if(isset($_GET['id']) && ($_GET['id'])) {
                        $id=$_GET['id'];
                        $orderDetail = orderedBill_detail($id);
                    }
                        include "view/orderedDetail.php";
                        break;
            default:
                include "view/home.php";
                break;
        }
    }

    include "view/footer.php";
