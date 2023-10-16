<?php
    extract($detail);
    // $img_chitiet = $img;
    // $name_chitiet = $name;
    $price_chitiet = "";
    if($sale == 1) {
        $price_chitiet .= '
        <del>'.number_format($price,3).' đ</del>
        <span>'.number_format($saleprice,3).' đ</span>
        ';
    } else {
        $price_chitiet .= '
        <span>'.number_format($price,3).' đ</span>
        ';
    }
    // $des_chitiet = $des;
    $html_relate_product = '';
    foreach ($relateProduct as $item) {
        $linkct = 'index.php?pg=chitiet&id=' . $item['id'];
        $html_relate_product .='
        <a href="' . $linkct . '">
        <div class="box25 mr15 mb">
        <div class="best"></div>
        <img src="view/layout/images/'.$item['img'].'" alt="">
        <p class="text-center mt-4 text-black font-semibold">'.$item['name'].'</p>
        </a>
        <span class="price">'.number_format($item['price'],3).'đ</span>
        <button class="p-2 hover:bg-second border-second border-2  transition duration-300 hover:text-white">Đặt hàng</button>
    </div>
        ';
    }

?>

<section class="containerfull">
        <div class="container">
            <div class="boxleft mr2pt mt-4 menutrai">
                <h1 class="text-2xl font-bold text-left">DANH MỤC</h1><br><br>
                <a href="#">Cà phê</a>
                <a href="#">Trái cây</a>
                <a href="#">Trà</a>
                <a href="#">Bánh</a>
            </div>
            <div class="boxright">
                <h1 class="text-2xl my-4 font-bold">SẢN PHẨM CHI TIỂT</h1><br>
                <!-- CHI TIET -->
                <div class="containerfull mr30">
                    <div class="col6 imgchitiet mb-4">
                        <img src="view/layout/images/<?=$img?>" alt="">
                    </div>
                    <div class="col6 textchitiet">
                        <h2 class="text-xl"><?=$name?></h2>
                        <p class="my-4"> <span class="font-bold">Giá:</span>
                            <?=$price_chitiet?>
                         </p>
                         <h1 class=" text-left text-xl">Mô tả:</h1>
                         <p class="my-4"><?=$des?></p>
                         <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" name="name" value="<?=$name?>">
                                <input type="hidden" name="img" value="<?=$img?>">
                                <input type="hidden" name="price" value="<?=$price?>">
                                <button class="p-2 hover:bg-second border-2 border-second text-second hover:text-main transition duration-300 hover:text-white" type="submit" name="addcart" >Đặt hàng</button>
                          </form>
                    </div>
                </div>
                <!-- CHI TIET -->
                <hr>
                <h1 class="my-4">SẢN PHẨM LIÊN QUAN</h1>
                <div class="containerfull mr30">
                 <?=$html_relate_product?>
                </div>
            </div>


        </div>
    </section>