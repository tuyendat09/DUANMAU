<?php
$imgFile = PATH_IMG.'users/'.$_SESSION['avatar'];
?>


</div>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 mb-56">
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

