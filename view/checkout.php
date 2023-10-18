<?php
if($_SESSION['logged'] == 1) {
  $customerName = $_SESSION['user']['name'];
  $location = $_SESSION['user']['location'];
  $phone = $_SESSION['user']['phone'];
  $email = $_SESSION['user']['email'];
} else {
  $customerName = "";
  $location = "";
  $phone = "";
  $email = "";
}


// echo var_dump($_SESSION['cart']);
$keys = array_keys($_SESSION['cart']);
$i = 0;
$total_cart = 0;
print_r($keys);



$html_cart = "";
foreach ($_SESSION['cart'] as $key) {
  extract($key);
  $imgFile = PATH_IMG . $img;
  $i++;
  $link_delete = 'index.php?pg=checkout&delID=' . $keys[$i-1];

  $total = $price * $quantity;
  $total_cart += $total;




  $html_cart .= '
  <div class="flex flex-col rounded-lg bg-white sm:flex-row">
  <img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="' . $imgFile . '" alt="" />
  <div class="flex w-full flex-col px-4 py-4">
  <div class="flex justify-between">
  <span class="font-semibold">' . $name . '</span>
  <a href="' . $link_delete . '">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
</svg>
  </a>
  </div>
    <p class="text-lg font-bold">' . number_format($total, 3) . ' đ</p>

  </div>
</div>
  ';
}

$salePrice =   $total_cart - $_SESSION['lastprice'];

?>



<form action="index.php?pg=ordered" method="post" class="my-8">
  <div class="flex flex-col items-center border-b bg-white py-4 sm:flex-row sm:px-10 lg:px-20 xl:px-32">
    <a href="#" class="text-2xl font-bold text-gray-800">DatShop</a>
    <div class="mt-4 py-2 text-xs sm:mt-0 sm:ml-auto sm:text-base">
      <div class="relative">
        <ul class="relative flex w-full items-center justify-between space-x-2 sm:space-x-4">
          <li class="flex items-center space-x-3 text-left sm:space-x-4">
            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-200 text-xs font-semibold text-emerald-700" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
            </a>
            <span class="font-semibold text-gray-900">Shop</span>
          </li>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
          <li class="flex items-center space-x-3 text-left sm:space-x-4">
            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-600 text-xs font-semibold text-white ring ring-gray-600 ring-offset-2" href="#">2</a>
            <span class="font-semibold text-gray-900">Shipping</span>
          </li>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
          </svg>
          <li class="flex items-center space-x-3 text-left sm:space-x-4">
            <a class="flex h-6 w-6 items-center justify-center rounded-full bg-gray-400 text-xs font-semibold text-white" href="#">3</a>
            <span class="font-semibold text-gray-500">Complete</span>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
    <div class="px-4 pt-8">
      <p class="text-xl font-medium">Order Summary</p>
      <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
      <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
        <!-- PRODUCT -->
        <!-- SINGLE -->
        <?= $html_cart ?>
        <!-- SINGLE -->
        <!-- PRODUCT -->
      </div>

      <p class="mt-8 text-lg font-medium">Shipping Methods</p>
      <form class="mt-5 grid gap-6" method="post" action="index.php">
        <div class="relative">
          <input class="peer hidden" id="radio_1" type="radio" name="radio" value="Tại Cửa Hàng" checked />
          <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
          <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_1">
            <img class="w-14 object-contain" src="/images/naorrAeygcJzX0SyNI4Y0.png" alt="" />
            <div class="ml-5">
              <span class="mt-2 font-semibold">Nhận tại cửa hàng</span>
              <p class="text-slate-500 text-sm leading-6">Nhận sản phẩm tại cửa hàng</p>
            </div>
          </label>
        </div>
        <div class="relative">
          <input class="peer hidden" id="radio_2" type="radio" name="radio" value="Giao Hàng" />
          <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
          <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_2">
            <img class="w-14 object-contain" src="/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" />
            <div class="ml-5">
              <span class="mt-2 font-semibold">Giao tận nơi</span>
              <p class="text-slate-500 text-sm leading-6">Giao trong 2-4 giờ</p>
            </div>
          </label>
        </div>
      </form>
    </div>
    <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
      <p class="text-xl font-medium">Thông tin thanh toán</p>
      <p class="text-gray-400">Điền thông tin để đến bước tiếp theo.</p>
      <div class="">
        <label for="email" class="mt-4 mb-2 block text-sm font-medium">Tên</label>
        <div class="relative">
          <input value="<?=$customerName?>" type="text" name="name" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
            </svg>
          </div>
        </div>
        <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Địa chỉ</label>
        <div class="relative">
          <input value="<?=$location?>" type="text" id="card-holder" name="location" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Your full name here" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <img src="view/layout//images/location.png" class="h-4 w-4 text-gray-400" alt="">
          </div>
        </div>
        <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Email</label>
        <div class="relative">
          <input value="<?=$email?>" type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <img src="view/layout/images/mail.png" class="h-4 w-4 text-gray-400" alt="">
          </div>
        </div>
        <label for="phone" class="mt-4 mb-2 block text-sm font-medium">Điện thoại</label>
        <div class="relative">
          <input value="<?=$phone?>" placeholder="xxxx-xxx-xxx" type="text" name="phone" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <img src="view/layout/images/smartphone.png" class="h-4 w-4 text-gray-400" alt="">
          </div>
        </div>
        
        <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Ghi chú</label>
        <div class="relative">
          <textarea rows="4" placeholder="Ghi chú" type="text" name="note" class=" mt-4 w-full rounded-md border border-gray-200 px-4 py-3 pl-2 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500">
          </textarea>
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <!-- <img src="view/layout/images/smartphone.png" class="h-4 w-4 text-gray-400" alt=""> -->
          </div>
        </div>
        <!-- Total -->
        <div class="mt-6 border-t border-b py-2">
          <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-gray-900">Tổng đơn</p>
            <p class="font-semibold text-gray-900"><?= number_format($total_cart, 3) ?> đ</p>
          </div>
          <div class="flex items-center justify-between">
            <p class="text-sm font-medium text-gray-900">Tiền giảm</p>
            <p class="font-semibold text-gray-900">
              <?= number_format($salePrice, 3) . " đ" ?>
            </p>
          </div>
        </div>
        <div class="mt-6 flex items-center justify-between">
          <p class="text-sm font-medium text-gray-900">Tổng</p>
          <p class="text-2xl font-semibold text-gray-900"><?= number_format($_SESSION['lastprice'], 3) ?> đ</p>
        </div>
        <!-- END TOTAL -->
      </div>
      <button type="submit" name="submit" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
    </div>
  </div>
</form>

</body>

</html>