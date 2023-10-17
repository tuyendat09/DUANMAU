<?php
$html_dm = '';
foreach ($dsdm as $dm) {
    extract($dm);
    $link = 'index.php?pg=sanpham&iddm=' . $id;
    $html_dm .= '
        <li>
        <a href="' . $link . '">' . $name . '</a>
        </li>
        
        ';
}
$html_dssp = '';
foreach ($dssp as $sp) {
    extract($sp);
    $linkct = 'index.php?pg=chitiet&id=' . $id;

    if ($bestseller == 1) {
        $best = '<div class="best"></div>';
    } else {
        $best = '';
    }
    $html_dssp .= '
        

        <a href="' . $linkct . '">
        <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer relative">
            <div>
                <img src="./' . PATH_IMG . '' . $img . '" alt="" />
              </div>
              <div class="py-4 px-4 bg-white">
                  <h3 class="text-lg font-semibold text-gray-600">' . $name . '</h3>
                  <div class="flex justify-between items-center mt-4">
                  <p class="text-lg font-thin">' . number_format($price, 3) . ' đ</p>
                  <form action="index.php?pg=addcart" method="post">
                  <input type="hidden" name="name" value="' . $name . '">
                  <input type="hidden" name="img" value="' . $img . '">
                  <input type="hidden" name="price" value="' . $price . '">
                  <input type="hidden" name="quantity" value="1">
                  <button class="py-2 px-2 hover:bg-black border-black border-2 transition duration-300 hover:text-white" type="submit" name="addcart" >Đặt hàng</button>
                  </form>
                  </div>
              </div>
          </div>
      </a>
';
}
?>

<div class="container flex gap-6">
    <div class="flex-cols w-64 mt-8">
        <h class="text-left text-2xl font-bold ">DANH MỤC</h><br><br>
        <ul>
            <?= $html_dm; ?>
        </ul>
    </div>

    <!-- PRODUCT LIST -->
    <div class="">
        <div class="mx-auto max-w-2xl mt-8 mb-16 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Sản Phẩm</h2>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <!-- SINGLE -->
                <?= $html_dssp ?>
                <!-- SINGLE -->
                <!-- More products... -->
            </div>
        </div>
    </div>

</div>