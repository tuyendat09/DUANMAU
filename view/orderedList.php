<?php
$html_table_order = "";



for ($i=0; $i < count($order); $i++) { 
	$id = $order[$i]['id'];
	$date = $order[$i]['ngaydat'];

$html_table_order .= '
<tr>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
		<a href="index.php?pg=orderDetail&id='.$id.'">#'.$id.'</a>
</td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
'.$date.'
</td>
<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
<span
	class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
	<span aria-hidden
		class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
<span class="relative">Dilivery</span>
</span>
</td>
</tr>
';
}

?>


<style>
  #menu-toggle:checked+#menu {
    display: block;
  }
</style>

<div class="bg-gray-200 min-h-screen pb-24 pt-2">
  <div class="container mx-auto max-w-5xl mt-8">
    <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0">Tài khoản</h1>
    <ul class="flex border-b border-gray-300 text-sm font-medium text-gray-600 mt-3 px-6 md:px-0">
      <li class="mr-8 hover:text-gray-900"><a href="index.php?pg=user" class="py-4 inline-block">Thông tin tài khoản</a></li>
      <li class="mr-8 text-gray-900 border-b-2 border-gray-800"><a href="index.php?pg=orderedList" class="py-4 inline-block">Đơn hàng đã đặt</a></li>
      <li class="mr-8 hover:text-gray-900"><a href="#_" class="py-4 inline-block">Liên kết</a></li>
    </ul>
      <div class="w-full bg-white rounded-lg mx-auto mt-8 flex overflow-hidden rounded-b-none">
        <div class="w-1/4 bg-gray-100 p-8 hidden md:inline-block">
          <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Thông tin đơn hàng</h2>
          <p class="text-xs text-gray-500">Xem thông tin đơn hàng đã đặt.</p>
        </div>

        <div class="bg-white p-8 rounded-md w-full">
	<div class=" flex items-center justify-between pb-6">   
		<div class="flex items-center justify-between">
			<div class="flex bg-gray-50 items-center p-2 rounded-md">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd"
						d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
						clip-rule="evenodd" />
				</svg>
				<input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id="" placeholder="search...">
          </div>
			</div>
		</div>
		<div>
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Đơn Hàng
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Ngày Đặt
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Trạng Thái
								</th>

							</tr>
						</thead>
						<tbody>
							<!-- TR -->
  							<?=$html_table_order?>
							<!-- TR -->
						</tbody>
					</table>
					<div
						class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
						<span class="text-xs xs:text-sm text-gray-900">
                            Showing 1 to 4 of 50 Entries
                        </span>
						<div class="inline-flex mt-2 xs:mt-0">
							<button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                                Prev
                            </button>
							&nbsp; &nbsp;
							<button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                                Next
                            </button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

      </div>
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