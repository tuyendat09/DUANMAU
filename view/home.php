<?php
$html_iPhone_sale = '';

foreach ($dssp_sale_iPhone as $sp) {
    extract($sp);
    $linkct = 'index.php?pg=chitiet&id=' . $id;
    if ($bestseller == 1) {
        $best = '<div class="absolute text-white  text-center  rounded-xl top-0 h-8 w-16 bg-black">HOT</div>';
    } else {
        $best = '';
    }
    $html_iPhone_sale .= '
    <a href="'.$linkct.'">
        <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer relative">
        '. $best .'
        <div style="height:280px;">
            <img class="object-contain h-full"src="./'.PATH_IMG.''.$img.'" alt="" />
          </div>
          <div class="py-4 px-4 bg-white">
              <h3 class="text-lg font-semibold text-gray-600">'.$name.'</h3>
              <div class="flex justify-between items-center mt-4">
              <div>
              <span class="block text-lg font-semibold">'.number_format($saleprice,3).' đ</span>
              <del class="block text-lg font-thin">'.number_format($price,3).' đ</del>
              </div>

              <form action="index.php?pg=addcart" method="post">
              <input type="hidden" name="name" value="'.$name.'">
              <input type="hidden" name="img" value="'.$img.'">
              <input type="hidden" name="price" value="'.$saleprice.'">
              <input type="hidden" name="id" value="'.$id.'">
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
  <div class="absolute text-white  text-center  rounded-xl top-0 h-8 w-16 bg-black">HOT</div>

    <div style="height:280px;">
    <img class="object-contain h-full"src="./'.PATH_IMG.''.$img.'" alt="" />
  </div>
          <div class="py-4 px-4 bg-white">
              <h3 class="text-lg font-semibold text-gray-600">'.$name.'</h3>
              <div class="flex justify-between items-center mt-4">
              <p class="text-lg font-thin">'.number_format($price,3).' đ</p>
              <form action="index.php?pg=addcart" method="post">
              <input type="hidden" name="name" value="'.$name.'">
              <input type="hidden" name="img" value="'.$img.'">
              <input type="hidden" name="price" value="'.$price.'">
              <input type="hidden" name="id" value="'.$id.'">
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
      $best = '<div class="absolute text-white  text-center  rounded-xl top-0 h-8 w-16 bg-black">HOT</div>';
    } else {
        $best = '';
    }
    $html_dssp_view .= '

    <a href="'.$linkct.'">
    <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer relative">
    '.$best.'
    <div style="height:280px;">
    <img class="object-contain h-full"src="./'.PATH_IMG.''.$img.'" alt="" />
  </div>
          <div class="py-4 px-4 bg-white">
              <h3 class="text-lg font-semibold text-gray-600">'.$name.'</h3>
              <div class="flex justify-between items-center mt-4">
              <p class="text-lg font-thin">'.number_format($price,3).' đ</p>
              <form action="index.php?pg=addcart" method="post">
              <input type="hidden" name="name" value="'.$name.'">
              <input type="hidden" name="img" value="'.$img.'">
              <input type="hidden" name="price" value="'.$price.'">
              <input type="hidden" name="id" value="'.$id.'">
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
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">iPhone SALE</h2>
    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      <!-- SINGLE -->
    <?=$html_iPhone_sale?>
      <!-- SINGLE -->
      <!-- More products... -->
    </div>
  </div>
</div>


