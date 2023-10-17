<?php 
session_start();
ob_start();

    require_once('../dao/pdo.php');
    require_once('../dao/sanpham.php');
    require_once('../dao/global.php');
    require_once('../dao/danhmuc.php');
    require_once('public/head.php');
    require_once('public/nav.php');
    
    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'home':
                require_once('public/home.php');
                break;
            case 'categories':
                $dsdm= danhmuc_all();
                require_once('public/categories.php');
                break;
            case 'updatedmform':
                require_once('public/updatedmform.php');
                break;
            case 'updatespform':
                if(isset($_GET['idproduct']) && ($_GET['idproduct'] > 0)) {
                    $dsdm= danhmuc_all();
                    $id = $_GET['idproduct'];
                    $productDetail = get_chitiet($id);
                }
                require_once('public/updatespform.php');
                break;
                case 'updatedsp':
                    if(isset($_POST['updatedsp'])) {
                    $idsp = $_POST['idsp'];
                    $name = $_POST['name'];
                    $img = $_FILES['my_img']['name'];
                    $price = $_POST['price'];
                    $saleprice = $_POST['price2'];
                    $des = $_POST['mota'];
                    $bestseller = $_POST['hot'];
                    $sale = $_POST['sale'];
                    $iddm = $_POST['cata'];

                    $old_img = $_POST['old_img'];
                    $todir = '../'.PATH_IMG;
                        // UPLOAD TO HOST
                        // chuyển hình vào upload/imgs/users
                      move_uploaded_file( $_FILES['avatar']['tmp_name'],
                       $todir . basename($_FILES['my_img']['name'] ));
                        //  Xóa hình cũ
                         // LẤY HÌNH CŨ
                         $old_img = $_POST['old_img'];
                        // Đường dẫn hình cũ
                        $img_file = './'.PATH_IMG.$old_img;
                        // CHECK xem có tồn tại k
                        if(file_exists($img_file)) {
                            // unlink($img_file);
                        }
                    hang_hoa_update($idsp,$name,$img,$price,$saleprice,$des,$sale,$bestseller,$iddm);
                    header('location: index.php?page=products');

                    }
                    break;
            case 'products':
                $productlist = get_sp();
                $dsdm= danhmuc_all();
                require_once('public/products.php');
                break;
            // THEM PRODUCT
            case 'addproduct' :
                if(isset($_POST['addProduct']) 
                && 
                isset($_FILES['my_img']))
                {
                    $name = $_POST['name'];
                    $img = $_FILES['my_img']['name'];
                    $price = $_POST['price'];
                    $saleprice = $_POST['price2'];
                    $des = $_POST['des'];
                    $sale = $_POST['sale'];
                    $bestseller = $_POST['hot'];
                    $iddm = $_POST['cata'];
                    $todir = '../'.PATH_IMG;

                    // chuyển hình vào upload/imgs
                    move_uploaded_file( $_FILES['my_img']['tmp_name'],
                     $todir . basename($_FILES['my_img']['name'] ));

                    // Thêm dzô db, mệt vãi
                    hang_hoa_insert($name,$img,$price,$saleprice,$des,$sale,$bestseller,$iddm);
                    header('location: index.php?page=products');
                }
                break;
            case 'deletesp':
                // xóa sp
                if(isset($_GET['idproduct'])&&($_GET['idproduct']>0)) {
                    $idproduct = $_GET['idproduct'];
                    // xóa file trên host
                    $img_file = '../'.PATH_IMG.getimg($idproduct);
                    if(file_exists($img_file)) {
                        unlink($img_file);
                    }
                    delete_sp($idproduct);   
                    header('location: index.php?page=products');

                }
                // show sp
                $productlist = get_sp();
                require_once('public/products.php');
                break;
            case 'users':
                require_once('public/users.php');
                break;
                // THEM CATA
             case 'add':
             if(isset($_POST['add'])) {
                $name = $_POST['name'];
                $tb = danhmuc_insert($name);
                $dsdm= danhmuc_all();
                header('location: index.php?page=categories');
             }

                    break;
            case 'delete':
                if($_GET['id'] > 0 && ($_GET['id'])) {
                    $iddm = $_GET['id'];
                    danhmuc_delete($iddm);
                    header('location: index.php?page=categories');
                }
                break;
            case 'edit' :
                    if(isset($_GET['id']) && ($_GET['id'] > 0 )) {
                        $id = $_GET['id'];
                        $detail_cata = detail_cata($id);
                    }
                include_once('public/updatedmform.php');
                break;
                // UPDATE CATA
            case 'updated' :
                // if(isset($_GET['updated'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    danhmuc_update($id,$name);
                    header('location: index.php?page=categories');
                // };
                break;
            default:
                require_once('public/404.php');
        }
    }else{
        require_once('public/home.php');
    }
 
    require_once('public/footer.php');
?>