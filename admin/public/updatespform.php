<?php

echo var_dump($productDetail);
echo var_dump($dsdm);
$sale_price_txt = "";
if($productDetail['saleprice'] == "") {
$sale_price_txt = "";
} else {
$sale_price_txt = $productDetail['saleprice'];
}
$img_file = "";
if($productDetail['img'] != "") {
    $file_img = "../".PATH_IMG.$productDetail['img'];
    if(file_exists($file_img)) {
        $img_file='
        <img  class="mb-3" style="display:block;" src="'.$file_img.'" alt="
        ';
    } else {
        $img_file = "Chưa có hình";
    }
}

$cata_list_html = "";
foreach ($dsdm as $key) {
    $selected = "";
    if($id = $productDetail['id']) {
        $selected = "selected";
    } else {
        $selected = "";
    }
    $cata_list_html .= '
    <option '.$selected.' value="'.$key['id'].'">'.$key['name'].'</option>
    ';
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chuyên mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chuyên mục</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title ">Danh sách chủ đề</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form action="index.php?page=updatedsp" method="POST"
                        enctype="multipart/form-data">>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" value="<?=$productDetail['name']?>">
                                    <input type="hidden" name="idsp" value="<?=$productDetail['id']?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="price" placeholder="Giá sản phẩm" value="<?=$productDetail['price']?>">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="price2" placeholder="Giá cũ sản phẩm"value="<?=$sale_price_txt?>">
                                </div>
                                <div class="mb-3">
                                    <label for="topic-name" class="col-form-label">Hình ảnh</label>
                                    <input type="file" name="my_img" class="col-form-label" id="my_img">
                                    <br>
                                    <input type="hidden" value='<?=$productDetail['img']?>' name="old_img">
                                    <?=$img_file?>
                                </div>
                                <br>
                                <div class="mb-3">
                          <select class="form-control select2" name="sale">
                                <option value="0">Không SALE</option>
                                <option value="1">SALE</option>
                            </select>
                    </div>
                                <div class="mt-3 mb-3">
                               <select class="form-control select2" name="hot">
                                     <option value="0">Sản phẩm không hot</option>
                                     <option value="1">Sản phẩm hot</option>
                              </select>
                    </div>
                                <div class="mb-3">
                                    <label for="topic-name" class="col-form-label" >Mô tả</label>
                                    <textarea name="mota" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid" class="col-form-label"></textarea>                        
                                </div>
                            
                            </div>
                            <div class="mb-3">
                        <div class="form-group">
                            <label for="level" class="col-form-label">Chọn danh mục:</label>
                            <select class="form-control select2" name="cata">
                                <?=$cata_list_html?>
                            </select>
                        </div>
                    </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" name="updatedsp" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

