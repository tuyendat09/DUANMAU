
<footer class="bg-black  shadow dark:bg-gray-900 ">
    <div class="w-full max-w-screen-xl mx-auto md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="index.php" class="flex items-center mb-4 sm:mb-0">
            <img src="view/layout/images/logo.png" class="mr-3 h-6 sm:h-9 h-16 w-20 object-cover" alt="DatShop Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-white dark:text-white">DatShop</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6 ">Trang chủ</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Sản phẩm</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-white-500 text-white sm:text-center dark:text-gray-400">© 2023 <a href="index.php" class="hover:underline">DatShop</a>. All Rights Reserved.</span>
    </div>
</footer>


</body>

<script>
tailwind.config = {
    corePlugins: {
    container: true,
  },

      theme: {
        container: {
            center:true,
        },
        extend: {
          colors: {
            main: '#f9e2d0',
            second: '#9a5323'
          }
        }
      }
    }
</script>
</html>