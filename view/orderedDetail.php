<?php
$idOrder = $_GET['id'];
extract($_SESSION['user']);
print_r($orderDetail[0]['price']);
print_r($orderDetail);
$imgFile = PATH_IMG . 'users/' . $_SESSION['user']['avatar'];
$html_order_product = '';

for ($i=0; $i < count($orderDetail); $i++) { 
    # code...
    $imgProductFile = PATH_IMG  . $orderDetail[$i]['img'];
    $price_html = "";
    if($orderDetail[$i]['sale'] == 1) {
        $price_html =
         '
        <p class="text-base  xl:text-lg leading-6">'.number_format($orderDetail[$i]['saleprice'],2).' đ<span class="text-red-300 line-through">'.number_format($orderDetail[$i]['price'],2).' đ</span></p>
        ';
    } else {
        $price_html =
        '
       <p class="text-base  xl:text-lg leading-6">'.number_format($orderDetail[$i]['price'],2).' đ<span class=" hidden text-red-300 line-through">'.$orderDetail[$i]['price'].'</span></p>
       ';
    }
    $html_order_product .='
    <div class="mt-4 md:mt-6 flex flex-col md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
    <div class="pb-4 md:pb-8 w-full md:w-40">
        <img class="w-full hidden md:block" src="'.$imgProductFile.'" alt="product img" />
    </div>
    <div class="border-b border-gray-200 md:flex-row flex-col flex justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
        <div class="w-full flex flex-col justify-start items-start space-y-8">
            <h3 class="text-xl  xl:text-2xl font-semibold leading-6 text-gray-800">'.$orderDetail[$i]['name'].'</h3>
            <div class="flex justify-start items-start flex-col space-y-2">
                <p class="text-sm  leading-none text-gray-800"><span class=" text-gray-300">Giá: </span> '.$price_html.'</p>
                <p class="text-sm  leading-none text-gray-800"><span class=" text-gray-300">Số lượng: </span>'.$orderDetail[$i]['quantity'].'</p>
            </div>
        </div>

    </div>
</div>
    ';
}
   

?>

<div class="py-14 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
            <div class="flex justify-start item-start space-y-2 flex-col">
                <h1 class="text-3xl  lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800">Order #<?=$idOrder?></h1>
                <p class="text-base font-medium leading-6 text-gray-600">
                    <?=$orderDetail[0]['ngaydat']?>
                </p>
            </div> 
            <div class="mt-10 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
                <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                    <div class="flex flex-col justify-start items-start  bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                        <p class="text-lg md:text-xl  font-semibold leading-6 xl:leading-5 text-gray-800">Sản Phẩm</p>
                        <!-- PRODUCT -->
                        <?php
                        echo $html_order_product;
                        ?>
                        <!-- PRODUCT -->
                    </div>
                    <div class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                        <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50  space-y-6">
                            <h3 class="text-xl  font-semibold leading-5 text-gray-800">Summary</h3>
                            <div class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                                <div class="flex justify-between w-full">
                                    <p class="text-base  leading-4 text-gray-800">Tổng tiền</p>
                                    <p class="text-base leading-4 text-gray-600"><?=number_format($orderDetail[0]['tongtien'],2)?> d</p>
                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <p class="text-base  leading-4 text-gray-800">Shipping</p>
                                    <p class="text-base leading-4 text-gray-600">0đ</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center w-full">
                                <p class="text-base  font-semibold leading-4 text-gray-800">Tổng cộng</p>
                                <p class="text-base font-semibold leading-4 text-gray-600"><?=number_format($orderDetail[0]['tongtien'],2)?> d</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50  w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                    <h3 class="text-xl  font-semibold leading-5 text-gray-800">Customer</h3>
                    <div class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                        <div class="flex flex-col justify-start items-start flex-shrink-0">
                            <div class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
                                <img  class="w-16" src="<?=$imgFile?>" alt="avatar" />
                                <div class="flex justify-start items-start flex-col space-y-2">
                                    <p class="text-base  font-semibold leading-4 text-left text-gray-800"><?=$name?></p>
                                    <p class="text-sm leading-5 text-gray-600">Còn 10 đơn chưa giao.</p>
                                </div>
                            </div>
    
                            <div class="flex justify-center text-gray-800  md:justify-start items-center space-x-4 py-4 border-b border-gray-200 w-full">
                                <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/order-summary-3-svg1.svg" alt="email">
                                <p class="cursor-pointer text-sm leading-5 "><?=$email?></p>
                            </div>
                        </div>
                        <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                            <div class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                                <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4 xl:mt-8">
                                    <p class="text-base  font-semibold leading-4 text-center md:text-left text-gray-800">Địa chỉ nhận hàng</p>
                                    <p class="w-48 lg:w-full xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600"><?=$location?></p>
                                </div>
                                <div class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4">
                                    <p class="text-base  font-semibold leading-4 text-center md:text-left text-gray-800">Số điện thoại</p>
                                    <p class="w-48 lg:w-full xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600"><?=$phone?></p>
                                </div>
                            </div>
                            <div class="flex w-full justify-center items-center md:justify-start md:items-start">
                                <a href="index.php?pg=orderedList" class="text-center mt-6 md:mt-0 py-5 hover:bg-black  hover:text-white transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 border border-gray-800 font-medium w-96 2xl:w-full text-base font-medium leading-4 text-gray-800">Về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    