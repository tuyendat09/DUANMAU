<?php
$flag_html = "";

if (isset($_GET['dup']) &&  ($_GET['dup'] == 1)) {
  $flag_html .= '
  <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 mx-auto mt-8" role="alert">
  <p class="font-bold">Tên đăng nhập đã tồn tại</p>
</div>
  ';
} else if (isset($_GET['dup'])) {
  $flag_html .= '
 <div class="bg-green-100 border-l-4 border-orange-500 text-black p-4 mx-auto mt-8" role="alert">
 <p class="font-bold">Đăng ký thành công</p>
</div>
 ';
}


?>

<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-40 w-auto" src="https://png.pngtree.com/template/20190928/ourmid/pngtree-smartphone-shop-sale-logo-design-image_312693.jpg" alt="Your Company">
        </div>
        <?=$flag_html?>
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          Create and account
        </h1>
        <form class="space-y-4 md:space-y-6" action="index.php?pg=register" method="POST">
          <div>
            <?php

            ?>
            <label for="email" class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tên đăng nhập</label>
            <input type="text" name="username" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mật khẩu</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
          </div>
          <div>
            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nhập lại mật khẩu</label>
            <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
          </div>
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
            </div>
            <div class="ml-3 text-sm">
              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Tôi chấp nhận <a class="font-medium text-zinc-500 hover:underline hover:text-black transition duration-300 dark:text-primary-500" href="#">Điều khoản người dùng</a></label>
            </div>
          </div>
          <button type="submit" name="register" class="w-full text-black border-2 border-black bg-prim hover:bg-black hover:text-white transition duration-300 ary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Tạo tài khoản</button>
          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Đã có tài khoản? <a href="index.php?pg=dangnhap" class="font-medium text-zinc-500 hover:text-black transition hover:underline dark:text-primary-500">Đăng nhập</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</section>

<?php



?>