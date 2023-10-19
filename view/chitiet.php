<?php
    extract($detail);
    // $img_chitiet = $img;
    // $name_chitiet = $name;
    $price_chitiet = "";
    if($sale == 1) {
        $price_chitiet .= '
        <del>'.number_format($price,3).' đ</del>
        <span>'.number_format($saleprice,3).' đ</span>
        ';
    } else {
        $price_chitiet .= '
        <span>'.number_format($price,3).' đ</span>
        ';
    }
    // $des_chitiet = $des;
    $html_relate_product = '';
    foreach ($relateProduct as $item) {
        $linkct = 'index.php?pg=chitiet&id=' . $item['id'];
        $html_relate_product .='
        <a href="' . $linkct . '">
        <div class="box25 mr15 mb">
        <div class="best"></div>
        <img src="view/layout/images/'.$item['img'].'" alt="">
        <p class="text-center mt-4 text-black font-semibold">'.$item['name'].'</p>
        </a>
        <span class="price">'.number_format($item['price'],3).'đ</span>
        <button class="p-2 hover:bg-second border-second border-2  transition duration-300 hover:text-white">Đặt hàng</button>
    </div>
        ';
    }

    $img_file = './'.PATH_IMG.$img;

?>



<section class="containerfull hidden">
        <div class="container">
            <div class="boxleft mr2pt mt-4 menutrai">
                <h1 class="text-2xl font-bold text-left">DANH MỤC</h1><br><br>
                <a href="#">Cà phê</a>
                <a href="#">Trái cây</a>
                <a href="#">Trà</a>
                <a href="#">Bánh</a>
            </div>
            <div class="boxright">
                <h1 class="text-2xl my-4 font-bold">SẢN PHẨM CHI TIỂT</h1><br>
                <!-- CHI TIET -->
                <div class="containerfull mr30">
                    <div class="col6 imgchitiet mb-4">
                        <img src="view/layout/images/<?=$img?>" alt="">
                    </div>
                    <div class="col6 textchitiet">
                        <h2 class="text-xl"><?=$name?></h2>
                        <p class="my-4"> <span class="font-bold">Giá:</span>
                            <?=$price_chitiet?>
                         </p>
                         <h1 class=" text-left text-xl">Mô tả:</h1>
                         <p class="my-4"><?=$des?></p>
                         <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" name="name" value="<?=$name?>">
                                <input type="hidden" name="img" value="<?=$img?>">
                                <input type="hidden" name="price" value="<?=$price?>">
                                <input type="hidden" name="id" value="<?=$id?>">
                                <button class="p-2 hover:bg-second border-2 border-second text-second hover:text-main transition duration-300 hover:text-white" type="submit" name="addcart" >Đặt hàng</button>
                          </form>
                    </div>
                </div>
                <!-- CHI TIET -->
                <hr>
                <!-- RELATE -->
                <h1 class="my-4">SẢN PHẨM LIÊN QUAN</h1>
                <div class="containerfull mr30">
                 <?=$html_relate_product?>
                </div>
            </div>

        </div>
    </section>

    <section class="text-gray-700 body-font overflow-hidden bg-white">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200" src="<?=$img_file?>">
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        <h2 class="text-sm title-font text-gray-500 tracking-widest"></h2>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?=$name?></h1>
        <div class="flex mb-4">
          <span class="flex items-center">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <span class="text-gray-600 ml-3">4 Reviews</span>
          </span>
          <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>
            </a>
          </span>
        </div>
        <p class="leading-relaxed">Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra jean shorts keytar banjo tattooed umami cardigan.</p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
          <div class="flex ml-6 items-center">
            <div class="relative">
              <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                  <path d="M6 9l6 6 6-6"></path>
                </svg>
              </span>
            </div>
          </div>
        </div>
        <div class="flex justify-between">
          <span class="title-font font-medium text-2xl text-gray-900"><?=number_format($price,3)?> d</span>
          <form action="index.php?pg=addcart" method="post">
                                <input type="hidden" name="name" value="<?=$name?>">
                                <input type="hidden" name="img" value="<?=$img?>">
                                <input type="hidden" name="price" value="<?=$price?>">
                                <button name="addcart"  type="submit" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Button</button>
                          </form>
        </div>
      </div>
    </div>
  </div>
</section>