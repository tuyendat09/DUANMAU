<?php
?>
<section class="bg-gray-50 dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-40 w-auto" src="https://png.pngtree.com/template/20190928/ourmid/pngtree-smartphone-shop-sale-logo-design-image_312693.jpg" alt="Your Company">
        </div>
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
          Đặt lại mật khẩu
        </h1>
        <form class="space-y-4 md:space-y-6" action="index.php?pg=resetPass" method="POST">
          <div>
            <label for="email" class="mt-4 block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mật khẩu mới</label>
            <input value="" type="password" name="password" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="••••••••" required="">
          </div>
          <button type="submit" name="resetSubmit" class="w-full text-black bg-prim hover:bg-black border-black border-2 hover:text-white transition duration-300 ary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Đặt lại mật khẩu</button>
      </div>
    </div>

    </form>
  </div>
  </div>
  </div>
</section>
