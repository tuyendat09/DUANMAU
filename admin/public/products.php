<?php

    $product_html = '';
    $stt = 1;
    $cata_html ='';
    
    foreach ($dsdm as $key) {
        extract($key);
        $cata_html .= 
        '
        <option selected name="iddm" value="'.$id.'">'.$name.'</option>
        ';
    }
    foreach ($productlist as $item) {
        extract($item);
        if($img!="") {
            $img_file = '../'.PATH_IMG.$img;
            if(is_file($img_file)) {
                $img = '<img src="'.$img_file.'" width="80">';
            }else {
                $img = '';
            }
        }else {
            $img = '';
        }

        $linkedit = '<a href="index.php?page=updatespform&idproduct='.$id.'">Sửa</a>';
        $linkdel = '<a href="index.php?page=deletesp&idproduct='.$id.'">Xóa</a>';
       

        $product_html.='<tr>
                            <td>'.$stt.'</td>
                            <td>'.$img.'</td>
                            <td>'.$name.'</td>
                            <td>'.number_format($price,3).' đ</td>
                            <td>'.$linkedit.' - '.$linkdel.'</td>
                        </tr>';
                        $stt++;
    }

    echo var_dump($dsdm)

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default">
                    Thêm sản phẩm mới
                </button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title ">Danh sách chủ đề</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Hình</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?=$product_html?>
                                
                                </tbody>
                                <!-- <tfoot>

                                <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên chủ đề</th>
                                        <th scope="col">Chế độ</th>
                                        <th scope="col">Số lượng câu hỏi</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </tfoot> -->
                            </table>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm sản phẩm</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?page=addproduct" 
            method="POST"
              enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="price" placeholder="Giá sản phẩm">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="price2" placeholder="Giá sale">
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Hình ảnh</label>
                      <input type="file" name="my_img" id="my_img" class="col-form-label">
                    </div>
                    <div class="mb-3">
                          <select class="form-control select2" name="hot">
                                <option value="0">Sản phẩm không hot</option>
                                <option value="1">Sản phẩm hot</option>
                            </select>
                    </div>
                    <div class="mb-3">
                          <select class="form-control select2" name="sale">
                                <option value="0">Không SALE</option>
                                <option value="1">SALE</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="topic-name" class="col-form-label">Mô tả</label>
                        <textarea name="des" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid" class="col-form-label"></textarea>                        
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="level" class="col-form-label">Chọn danh mục:</label>
                            <select class="form-control select2" name="cata">
                                <?=$cata_html?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" name="addProduct"  class="btn btn-primary">Thêm mới</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>