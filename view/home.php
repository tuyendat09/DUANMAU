<?php
// echo $_SESSION['logged'];
$html_allsp_hot_cofe = '';
foreach ($all_spBest_cofe as $sp) {
    extract($sp);
    $linkct = 'index.php?pg=chitiet&id=' . $id;
    $html_allsp_hot_cofe .= '<div class="box25 mr15">
                                <a href="' . $linkct . '">
                                <img src="view/layout/images/' . $img . '" alt="">
                                <p class="text-center mt-4 text-second font-bold">'.$name.'</p>
                                <span class="price text-second ">' . number_format($price,3) . ' đ</span>
                                </a>
                                <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" name="name" value="'.$name.'">
                                <input type="hidden" name="img" value="'.$img.'">
                                <input type="hidden" name="price" value="'.$price.'">
                                <button class="p-2 hover:bg-second bg-opacity-0 border-2 border-second transition duration-300 hover:text-main text-second font-bold" type="submit" name="addcart" >Đặt hàng</button>
                                </form>
                        </div>';
}


$html_iPhone_sale = '';
foreach ($dssp_sale_iPhone as $sp) {
    extract($sp);
    $linkct = 'index.php?pg=chitiet&id=' . $id;
    if ($bestseller == 1) {
        $best = '<div class="best"></div>';
    } else {
        $best = '';
    }
    $html_iPhone_sale .= '
    <a href="'.$linkct.'">
    <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer relative">
        <div>
            <img src="./'.PATH_IMG.''.$img.'" alt="" />
          </div>
          <div class="py-4 px-4 bg-white">
              <h3 class="text-lg font-semibold text-gray-600">'.$name.'</h3>
              <div class="flex justify-between items-center mt-4">
              <p class="text-lg font-thin">'.number_format($price,3).' đ</p>
              <form action="index.php?pg=addcart" method="post">
              <input type="hidden" name="name" value="'.$name.'">
              <input type="hidden" name="img" value="'.$img.'">
              <input type="hidden" name="price" value="'.$price.'">
              <input type="hidden" name="quantity" value="1">
              <button class="py-2 px-2 hover:bg-black border-black border-2 transition duration-300 hover:text-white" type="submit" name="addcart" >Đặt hàng</button>
              </form>
              </div>
          </div>
      </div>
  </a>

  ';
}
$html_dssp_best = '';
foreach ($dssp_best as $sp) {
    extract($sp);
    $linkct = 'index.php?pg=chitiet&id=' . $id;
    $html_dssp_best .= '

    <a href="'.$linkct.'">
    <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer relative">
        <div>
            <img src="./'.PATH_IMG.''.$img.'" alt="" />
          </div>
          <div class="py-4 px-4 bg-white">
              <h3 class="text-lg font-semibold text-gray-600">'.$name.'</h3>
              <div class="flex justify-between items-center mt-4">
              <p class="text-lg font-thin">'.number_format($price,3).' đ</p>
              <form action="index.php?pg=addcart" method="post">
              <input type="hidden" name="name" value="'.$name.'">
              <input type="hidden" name="img" value="'.$img.'">
              <input type="hidden" name="price" value="'.$price.'">
              <input type="hidden" name="quantity" value="1">
              <button class="py-2 px-2 hover:bg-black border-black border-2 transition duration-300 hover:text-white" type="submit" name="addcart" >Đặt hàng</button>
              </form>
              </div>
          </div>
      </div>
  </a>
    ';
}

$html_dssp_view = '';
foreach ($dssp_view as $sp) {
    extract($sp);
    $linkct = 'index.php?pg=chitiet&id=' . $id;

    if ($bestseller == 1) {
        $best = '<div class="best"></div>';
    } else {
        $best = '';
    }
    $html_dssp_view .= '

    <a href="'.$linkct.'">
    <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer relative">
        <div>
            <img src="./'.PATH_IMG.''.$img.'" alt="" />
          </div>
          <div class="py-4 px-4 bg-white">
              <h3 class="text-lg font-semibold text-gray-600">'.$name.'</h3>
              <div class="flex justify-between items-center mt-4">
              <p class="text-lg font-thin">'.number_format($price,3).' đ</p>
              <form action="index.php?pg=addcart" method="post">
              <input type="hidden" name="name" value="'.$name.'">
              <input type="hidden" name="img" value="'.$img.'">
              <input type="hidden" name="price" value="'.$price.'">
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

<div class="object-contain mt-4">
    <img class="w-full" src="https://i.pinimg.com/originals/8e/f7/26/8ef726ffe903afa19aa545e23f3b9c72.png" alt="">
</div>
<div class="">

  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Sản phẩm HOT</h2>
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      <!-- SINGLE -->
    <?=$html_dssp_best?>
      <!-- SINGLE -->
      <!-- More products... -->
    </div>
  </div>
</div>

<div class="">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Sản phẩm xem nhiều</h2>
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      <!-- SINGLE -->
    <?=$html_dssp_view?>
      <!-- SINGLE -->
      <!-- More products... -->
    </div>
  </div>
</div>

<div class="">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">iPhone mới ra mắt</h2>
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      <!-- SINGLE -->
    <?=$html_iPhone_sale?>
      <!-- SINGLE -->
      <!-- More products... -->
    </div>
  </div>
</div>


