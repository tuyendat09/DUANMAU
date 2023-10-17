<?php
$imgFile = PATH_IMG.'users/'.$_SESSION['avatar'];
?>

<style>
  #menu-toggle:checked + #menu {
   display: block;
}
</style>

<div class=" flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 mb-56">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="view/layout/images/logo-bahozone-03-icon-h80.png" alt="Your Company">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Tùy chỉnh</h2>
  </div>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="index.php?pg=updateuser" method="POST"
    enctype="multipart/form-data">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Tài khoản</label>
        <div class=" mt-2">
          <input type="hidden" name="username" value="<?=$_SESSION['user']?>">
          <input disabled="disabled" value="<?=$_SESSION['user']?>" id="aaaa" name="username" type="text" autocomplete="email"  class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-main sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Mật khẩu mới</label>
        </div>
        <div class=" relative mt-2">
          <input placeholder="••••••••" id="password" name="password" type="password" autocomplete="current-password"  class="
          px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm input-pass
          ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 f
          ocus:ring-inset focus:ring-main sm:text-sm sm:leading-6 inline">
          <span class="show-pass absolute right-2 top-1.5 text-second font-bold hover:text-black transition duration-300 cursor-pointer">Hiện</span>
        </div>
      </div>
      <div class=" mt-2">
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Tên</label>
          <input placeholder="Tên" value="" id="name" name="name" type="text" autocomplete="email"  class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-main sm:text-sm sm:leading-6">
        </div>
        <div class=" mt-2">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
          <input placeholder="Email" value="" id="email" name="email" type="text" autocomplete="email"  class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-main sm:text-sm sm:leading-6">
        </div>
        <div class=" mt-2">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Ảnh đại diện</label>
          <input  name="avatar" type="file" class="px-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-main sm:text-sm sm:leading-6">
            <img src="<?=$imgFile?>" alt="" class="h-24 rounded-full w-24 object-cover	mt-4">
            <input type="hidden" name="old_img" value="<?=$_SESSION['avatar']?>">
        </div>

      <div>
        <button type="submit" name="updateuser" class="flex w-full justify-center rounded-md border-second border-2 text-second px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-second focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 transition duration-300 text-black hover:text-white">Lưu</button>
      </div>
    </form>
    </div>
  </div>

  <div class="bg-gray-200 min-h-screen pb-24 pt-2">

  <div class="container mx-auto max-w-3xl mt-8 hidden">

<!--     @if (session('alert'))
          <p>{{ session('alert') }}</p>
    @endif -->

    <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0">Account Settings</h1>
    <ul class="flex border-b border-gray-300 text-sm font-medium text-gray-600 mt-3 px-6 md:px-0">
      <li class="mr-8 text-gray-900 border-b-2 border-gray-800"><a href="#_" class="py-4 inline-block">Profile Info</a></li>
      <li class="mr-8 hover:text-gray-900"><a href="#_" class="py-4 inline-block">Security</a></li>
      <li class="mr-8 hover:text-gray-900"><a href="#_" class="py-4 inline-block">Billing</a></li>
    </ul>
    <form action="index.php?pg=updateuser" method="POST" enctype="multipart/form-data">
      <div class="w-full bg-white rounded-lg mx-auto mt-8 flex overflow-hidden rounded-b-none">
        <div class="w-1/3 bg-gray-100 p-8 hidden md:inline-block">
          <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Profile Info</h2>
          <p class="text-xs text-gray-500">Update your basic profile information such as Email Address, Name, and Image.</p>
        </div>
        <div class="md:w-2/3 w-full">
          <div class="py-8 px-16">
            <label for="name" class="text-sm text-gray-600">Name</label>
            <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text" name="username" value="<?=$_SESSION['user']?>">

          </div>
          <hr class="border-gray-200">
          <div class="py-8 px-16">
            <label for="email" class="text-sm text-gray-600">Email Address</label>
            <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text" name="email" value="12312312">
          </div>
          <hr class="border-gray-200">
          <div class="py-8 px-16 clearfix">
            <label for="photo" class="text-sm text-gray-600 w-full block">Photo</label>
            <input type="hidden" name="old_img" value="<?=$_SESSION['avatar']?>">
            <img class="rounded-full w-16 h-16 border-4 mt-2 border-gray-200 float-left" id="photo" src="<?=$imgFile?>" alt="photo">
            <div class="bg-gray-200 text-gray-500 text-xs mt-5 ml-3 font-bold px-4 py-2 rounded-lg float-left hover:bg-gray-300 hover:text-gray-600 relative overflow-hidden cursor-pointer">
              <input type="file" name="avatar" onchange="loadFile(event)" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"> Change Photo
            </div>
          </div>

        </div>

      </div>
      <div class="p-16 py-8 bg-gray-300 clearfix rounded-b-lg border-t border-gray-200 flex justify-between">
        <p class=" text-xs text-gray-500 tracking-tight mt-2">Click on Save to update your Profile Info</p>
        <!-- <button type="submit" name="updateuser" class="bg-black transition hover:bg-opacity-0 duration-300 border-2 hover:border-black text-white text-sm font-medium px-6 py-2 rounded uppercase cursor-pointer">Lưu</button> -->
        <button type="submit" name="updateuser" class="flex w-full justify-center rounded-md border-second border-2 text-second px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-second focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 transition duration-300 text-black hover:text-white">Lưu</button>

      </div>
    </form>
  </div>
</div>

<script>
  const showPass = document.querySelector('.show-pass');
  const inputPass = document.querySelector('.input-pass');

  showPass.addEventListener('click', () => {
    showPass.classList.toggle('hide-pass');
    if(showPass.classList.contains('hide-pass')) {
      showPass.innerHTML = "Ẩn"
      inputPass.type = "text"
    } else {
      showPass.innerHTML = "Hiện"
      inputPass.type = "password"
    }
  })
</script>

