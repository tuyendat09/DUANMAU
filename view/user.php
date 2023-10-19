<?php
$imgFile = PATH_IMG . 'users/' . $_SESSION['user']['avatar'];
?>


<style>
  #menu-toggle:checked+#menu {
    display: block;
  }
</style>

<div class="bg-gray-200 min-h-screen pb-24 pt-2">
  <div class="container mx-auto max-w-3xl mt-8">
    <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0">Tài khoản</h1>
    <ul class="flex border-b border-gray-300 text-sm font-medium text-gray-600 mt-3 px-6 md:px-0">
      <li class="mr-8 text-gray-900 border-b-2 border-gray-800"><a href="#_" class="py-4 inline-block">Thông tin tài khoản</a></li>
      <li class="mr-8 hover:text-gray-900"><a href="index.php?pg=orderedList" class="py-4 inline-block">Đơn hàng đã đặt</a></li>
      <li class="mr-8 hover:text-gray-900"><a href="#_" class="py-4 inline-block">Liên kết</a></li>
    </ul>
    <form action="index.php?pg=updateuser" method="POST" enctype="multipart/form-data">
      <div class="w-full bg-white rounded-lg mx-auto mt-8 flex overflow-hidden rounded-b-none">
        <div class="w-1/3 bg-gray-100 p-8 hidden md:inline-block">
          <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Thông tin</h2>
          <p class="text-xs text-gray-500">Cập nhật thông tin tài khoản của bạn.</p>
        </div>

        <div class="md:w-2/3 w-full">
          <div class="py-8 px-16">
            <label for="password" class="text-sm text-gray-600">Mật khẩu</label>
            <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text" name="password" placeholder="••••••••">
          </div>
          <hr class="border-gray-200">
          <div class="py-8 px-16">
            <label for="name" class="text-sm text-gray-600">Tên</label>
            <input type="hidden" name="username" value="<?= $_SESSION['user']['username'] ?>">
            <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text" name="name" value="<?= $_SESSION['user']['name'] ?>">
          </div>
          <hr class="border-gray-200">
          <div class="py-8 px-16">
            <label for="email" class="text-sm text-gray-600">Địa chỉ Email</label>
            <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text" name="email" value="<?= $_SESSION['user']['email'] ?>">
          </div>
          <div class="py-8 px-16">
            <label for="location" class="text-sm text-gray-600">Địa chỉ</label>
            <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text" name="location" value="<?= $_SESSION['user']['location'] ?>">
          </div>
          <div class="py-8 px-16">
            <label for="phone" class="text-sm text-gray-600">Số Điện Thoại</label>
            <input class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500" type="text" name="phone" value="<?= $_SESSION['user']['phone'] ?>">
          </div>
          <hr class="border-gray-200">
          <div class="py-8 px-16 clearfix">
            <label for="photo" class="text-sm text-gray-600 w-full block">Photo</label>
            <input type="hidden" name="old_img" value="<?= $_SESSION['user']['avatar'] ?>">
            <img class=" my-4 rounded-full w-16 h-16 border-4 mt-2 border-gray-200 float-left" id="photo" src="<?= $imgFile ?>" alt="photo">
            <div class="bg-gray-200 text-gray-500 text-xs mt-5 ml-3 font-bold px-4 py-2 rounded-lg float-left hover:bg-gray-300 hover:text-gray-600 relative overflow-hidden cursor-pointer">
              <input type="file" name="avatar" onchange="loadFile(event)" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"> Change Photo
            </div>
          </div>

        </div>

      </div>
      <div class="p-16 py-8 bg-gray-300 clearfix rounded-b-lg border-t border-gray-200 flex justify-between">
        <p class=" text-xs text-gray-500 tracking-tight mt-2">Click on Save to update your Profile Info</p>
        <!-- <button type="submit" name="updateuser" class="bg-black transition hover:bg-opacity-0 duration-300 border-2 hover:border-black text-white text-sm font-medium px-6 py-2 rounded uppercase cursor-pointer">Lưu</button> -->
        <button type="submit" name="updateuser" class="flex  justify-center rounded-md border-black border-2 text-black px-6 py-1.5 text-sm font-semibold leading-6 shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 transition duration-300 text-black hover:text-white">Lưu</button>

      </div>
    </form>
  </div>
</div>

<script>
  const showPass = document.querySelector('.show-pass');
  const inputPass = document.querySelector('.input-pass');

  showPass.addEventListener('click', () => {
    showPass.classList.toggle('hide-pass');
    if (showPass.classList.contains('hide-pass')) {
      showPass.innerHTML = "Ẩn"
      inputPass.type = "text"
    } else {
      showPass.innerHTML = "Hiện"
      inputPass.type = "password"
    }
  })
</script>
</div>