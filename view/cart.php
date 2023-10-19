<?php

$html_cart = '';
$total_cart = 0;
$keys = array_keys($_SESSION['cart']);
$i = 1;

if(count($_SESSION['cart']) == 0) {
  $_SESSION['lastprice'] = 0;
  } 

foreach ($_SESSION['cart'] as $item) {
  extract($item);
  $link_delete = 'index.php?pg=viewcart&delID=' . $keys[$i-1];
  $i++;

  $total = $price * $quantity;
  $total_cart += $total;
  $_SESSION['lastprice'] = $total_cart;

  $img_file = './' . PATH_IMG . $img;
  $html_cart .= '

    <div class="justify-between mb-6 rounded-lg bg-zinc-100 p-6 shadow-md sm:flex sm:justify-start">
    <img src="' . $img_file . '" alt="product-image" class="w-full rounded-lg sm:w-40" />
    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
      <div class="mt-5 sm:mt-0">
        <h2 class="text-lg font-bold text-gray-900">' . $name . '</h2>
      </div>
      <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
        <div class="flex items-center border-gray-100">
          <span class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
          <input class="h-8 w-8 border bg-white text-center text-xs outline-none" type="number" value="' . $quantity . '" min="1" />
          <span class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
        </div>
        <div class="flex items-center space-x-4">
          <p class="text-sm">' . number_format($total, 3) . ' d</p>
          <a href="' . $link_delete . '">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
    ';
}

// COUPON
$trueCoupon = "191102";

// GIÁ NHẬP ĐÚNG COUPON
$salePrice = $_SESSION['lastprice'] - ($_SESSION['lastprice'] * 0.2);
$minusPrice = 0;

if (isset($_POST['send'])) {
  $couponCode = $_POST['couponCode'];
  if ($couponCode == $trueCoupon) {
    $_SESSION['lastprice'] = $salePrice;
    $minusPrice = $total_cart - $_SESSION['lastprice'];
  }  else {
    $_SESSION['lastprice'] = $total_cart;
  }
}
?>
<style>
  @layer utilities {

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  }
</style>

<body>
  <div class=" mb-4 bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
      <div class="rounded-lg md:w-2/3 bg-white p-6">
        <!-- ITEM -->
        <?= $html_cart ?>
        <!-- ITEM -->
      </div>
      <!-- Sub total -->
      <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Tổng giỏ hàng</p>
          <p class="text-gray-700"><?= number_format($total_cart, 3) . " đ" ?></p>
        </div>
        <hr class="my-4">
        <div class="mb-2 flex justify-between">
          <p class="text-gray-700">Giá đã giảm</p>
          <p class="text-gray-700"><?= number_format($minusPrice,3) . " đ" ?></p>
        </div>
        <form action="index.php?pg=viewcart" method="post">
          <input class="border border-black p-1 my-4" type="text" placeholder="Nhập coupon" name="couponCode"> <br>
          <button class='
                inline-block p-1 w-24 h-8 
                hover:bg-black hover:text-white border-2 border-black
                transition duration-300' type="submit" name="send">Nhập</button>
        </form>
        <hr class="my-4" />
        <div class="flex justify-between">
          <p class="text-lg font-bold">Tổng</p>
          <div class="">
            <p class="mb-1 text-lg font-bold"><?= number_format($_SESSION['lastprice'], 3) . " đ" ?></p>
          </div>
        </div>
        <button class="mt-6 w-full rounded-md bg-black py-1.5 font-medium text-blue-50 ">
          <a href="index.php?pg=checkout">Thanh Tón</a>
        </button>
      </div>
    </div>
  </div>
</body>