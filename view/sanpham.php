<?php
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        $link='index.php?pg=sanpham&iddm='.$id;
        $html_dm.='<a href="'.$link.'">'.$name.'</a>';
    }
    $html_dssp='';
    foreach ($dssp as $sp) {
        extract($sp);
        $linkct = 'index.php?pg=chitiet&id=' . $id;

        if($bestseller==1){
            $best='<div class="best"></div>';
        }else{
            $best='';
        }
        $html_dssp.='<div class="mt-8 box25 mr15">
        <a href="' . $linkct . '">
        ' . $best . '
        <img src="view/layout/images/' . $img . '" alt="">
        <p class="text-center mt-4 text-black">'.$name.'</p>
        <span class="price">' . number_format($price,3) . ' đ</span>
        </a>
        <form action="index.php?pg=addcart" method="post">
        <input type="hidden" name="name" value="'.$name.'">
        <input type="hidden" name="img" value="'.$img.'">
        <input type="hidden" name="price" value="'.$price.'">
        <input type="hidden" name="quantity" value="1">
        <button class="p-2 hover:bg-second border-second border-2 transition duration-300 hover:text-white" type="submit" name="addcart" >Đặt hàng</button>
        </form>
</div>';

    }
?>
<div class="containerfull ">
        <div class="bgbanner text-main font-bold text-2xl">SẢN PHẨM</div>
    </div>

    <section class="containerfull mb-6">
        <div class="container">
            <div class="boxleft mr2pt menutrai mt-4">
                <h class="text-left text-2xl font-bold">DANH MỤC</h><br><br>
                <?=$html_dm;?>
            </div>
            <div class="boxright mt-4">
                <h1 class="text-second font-bold text-2xl">SẢN PHẨM</h1><br>
                <div class="containerfull mr30">
                    <?=$html_dssp;?>
                </div>
            </div>

        </div>
    </section>

