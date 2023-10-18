<?php
if(!$_SESSION['user']) {
  $imgFile = "";
} else {
  $imgFile = PATH_IMG.'users/'.$_SESSION['user']['avatar'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffe House</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://kit.fontawesome.com/e5ff98b392.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/layout/css/style.css">
</head>

<body class="">
    <header>
  <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
      <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
          <a href="index.php" class="flex items-center">
              <img src="view/layout/images/logo.png" class="mr-3 h-6 sm:h-9 h-16 w-20 object-cover" alt="DatShop Logo" />
              <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">DatShop</span>
          </a>
          <div class="flex items-center lg:order-2">
          <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
              <!-- ACCOUT -->
              
<?php

$html_user = "";
$html_user .= "'border-indigo-700 transform transition duration-300'
";

if ($_SESSION['logged'] == 0) {
    echo '
    <a href="index.php?pg=dangnhap" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Đăng nhập</a>
    <a href="index.php?pg=dangky" class="text-white bg-black hover:bg-black focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Đăng ký</a>
    ';
}  else {

    echo '
    <div class="bg-gray-200 flex justify-center items-center dark:bg-gray-500 z-10 mt-4">
  <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 w-64  shadow flex justify-center items-center z-99">
      <div @click="open = !open" class="relative border-b-4 border-transparent py-3" :class="{'.$html_user. ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
        <div class="flex justify-center items-center space-x-3 cursor-pointer">
          <div class="w-12 h-12 rounded-full overflow-hidden border-2 dark:border-white border-gray-900">
            <img src="'.$imgFile.'" alt="" class="w-full h-full object-cover">
          </div>
          <div class="font-semibold dark:text-white text-gray-900 text-lg">
            <div class="cursor-pointer">'.$_SESSION['user']['username'].'</div>
          </div>
        </div>
        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3 dark:bg-gray-800 bg-white rounded-lg shadow border dark:border-transparent mt-5">
          <ul class="space-y-3 dark:text-white">
            <li class="font-medium">
              <a href="index.php?pg=user" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                <div class="mr-3">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                Account
              </a>
            </li>
            <li class="font-medium">
              <a href="#" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                <div class="mr-3">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                Setting
              </a>
            </li>
            <hr class="dark:border-gray-700">
            <li class="font-medium">
              <a href="index.php?pg=logout" class="flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                <div class="mr-3 text-red-600">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </div>
                Đăng xuất
              </a>
            </li>
          </ul>
        </div>
      </div>
  </div>
</div>
    ';
  
}
?>
              <!--  LOG-->
              <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                  <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </button>
          </div>
          <div class="flex flex-col justify-center">
            <div>
              <div class="overflow-hidden z-0 rounded-full relative p-3">
                <form action="index.php?pg=sanpham" method="post" class="relative flex z-50 bg-white rounded-full">
                  <input name="result" type="text" placeholder="Nhập từ khóa" class="rounded-full flex-1 py-2 px-2 text-gray-700 focus:outline-none">
                  <button name="timkiem" type="submit" class="bg-indigo-500 text-white rounded-full font-semibold  hover:bg-indigo-400 focus:bg-indigo-600 focus:outline-none px-2 ">Search</button>
                 </form>
                 
                <div class="glow glow-1 z-10 bg-pink-400 absolute"></div>
                <div class="glow glow-2 z-20 bg-purple-400 absolute"></div>
                <div class="glow glow-3 z-30 bg-yellow-400 absolute"></div>
                <div class="glow glow-4 z-40 bg-blue-400 absolute"></div>
              </div>
            </div>
          </div>
          <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
              <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                  <li>
                      <a href="index.php?pg=home" class="block py-2 pr-4 pl-3 text-black rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Trang Chủ</a>
                  </li>
                  <li>
                      <a href="index.php?pg=sanpham" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Sản phẩm</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
</header>

