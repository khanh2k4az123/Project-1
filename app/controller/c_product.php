<?php
    
        namespace App\controller; 
        use App\model\m_product;
        use App\model\m_page;
        use App\model\m_order;
        
    
    class c_product extends c_base{
        private $htmlProductModel;
        private $htmlPageModel;
        private $htmlOrderModel;

        function __construct(){
            $this->htmlProductModel = new m_product;
            $this->htmlPageModel = new m_page;
            $this->htmlOrderModel = new m_order;
            
        }

        function comment(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $MaTK = $_SESSION['user']['MaTK'];
                $MaSP = $_POST['MaSP'];
                $NoiDung = $_POST['NoiDung'];
                $this->htmlProductModel->binhuan_add($MaSP,$MaTK,$NoiDung);
                header("location: ".APPURL."product/detail/".$MaSP);
            }
        }
        

        function DetailProduct(){
            //preg_matchđược sử dụng để trích xuất phần số sau /product/detail/từ $_SERVER['REQUEST_URI']
            preg_match('/\/product\/detail\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
            if (isset($matches[1])) {
                $MaSP = $matches[1];
                $detail_product = $this->htmlProductModel->product_detailbyid($MaSP);
                if(is_array($detail_product)){
                    //print_r($matches);
                    $this->titlepage = $detail_product['TenSP'];
                    $this->htmlProductModel->product_updateLuotXem($MaSP);
                    $detailrelate = $this->htmlProductModel->product_lienquanRanDom($detail_product['MaDM']);
                    $loadcomment = $this->htmlProductModel->get_byproductcomment($MaSP);
                    $bannerItem = $this->htmlPageModel->load_banner_Item(); // Show banner ở trang khác
                    //Lưu vào mảng data
                    $this->data['banner_header_item'] = $bannerItem;// Show banner ở trang khác
                    $this->data['detail_product_byID'] = $detail_product;
                    $this->data['productRelate'] = $detailrelate;
                    $this->data['product_comment'] = $loadcomment;
                    //View ra trang
                    $this->renderView("v_product_detail", $this->titlepage, $this->data);
                }else{
                    header("location:".APPURL);
                }
                
                if ($_SERVER['REQUEST_METHOD']) {
                    $MaTK = $_POST['MaTK'];
                    $YeuThich = $_POST['YeuThich'];
                
                    $isInWishlist = $this->htmlProductModel->product_detaillove($MaSP, $MaTK, $YeuThich);

                    if (!$isInWishlist) {
                        // Sản phẩm chưa có trong danh sách yêu thích, thêm vào
                        $this->htmlProductModel->product_addToWishlist($MaSP, $MaTK, $YeuThich);
                        $_SESSION['wishlist_active'][$MaSP] = 'wishlist-active';
                        $_SESSION['success_thongbao'] = 'Đã thêm sản phẩm yêu thích';
                        
                    }

                    if ($isInWishlist && $isInWishlist['MaSP'] == $MaSP) {
                        // Sản phẩm đã có trong danh sách yêu thích với sản phẩm khác, xóa nó trước
                        $this->htmlProductModel->product_removeFromWishlist($MaSP, $MaTK, $YeuThich);
                        unset($_SESSION['wishlist_active'][$isInWishlist['MaSP']]);
                        $_SESSION['success_thongbao'] = 'Đã hủy yêu thích sản phẩm';
                    }
                    
                    // Thêm sản phẩm vào danh sách yêu thích
                    header("location: ".APPURL."product/detail/".$MaSP);
                    
                }
            }else{
                echo 'kk';
            }
        }

        function Product_Cart(){

            if(!isset($_SESSION['user'])){
                $_SESSION['canhbao'] = "Bạn cần đăng nhập trước khi mua hàng";
                header("location: ".APPURL."user/login");
                return; // Nếu không có return, các lệnh phía sau header vẫn có thể được thực hiện
            }

            $this->titlepage = "Trang giỏ hàng";

            //$_SERVER['REQUEST_METHOD']trả về phương thức yêu cầu (ví dụ: 'GET', 'POST', 'HEAD', 'PUT', 'DELETE', v.v.). //$_SERVER['REQUEST_METHOD']là một biến superglobal chứa phương thức yêu cầu được sử dụng để truy cập trang
            //Khi bạn muốn kiểm tra xem biểu mẫu đã được gửi bằng phương thức HTTP POST hay chưa
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Kiểm tra xem $_SESSION['mygiohang'] đã tồn tại chưa
                if (!isset($_SESSION['mygiohang'])) {
                    $_SESSION['mygiohang'] = array(); // Khởi tạo giỏ hàng nếu chưa tồn tại
                }
                $MaSP = $_POST['MaSP'];
                $HinhAnh = $_POST['HinhAnh'];
                $GiaSP = $_POST['GiaSP'];
                $TenSP = $_POST['TenSP'];
                if(isset($_POST['SoLuong']) && ($_POST['SoLuong']>0)){
                    $SoLuong = $_POST['SoLuong'];
                }else{
                    $SoLuong = 1;
                }

                $flag = 0;  //nếu biến này = 0 thì số lượng không thay đổi, và khi số lượng này không thay đổi thì nó không trùng sản phẩm trong giỏ hàng
                
                $i=0; // i để định vị mình đang ở cái sản phẩm nào mà check // i có nghĩa là: ở phần tử thứ i mình cập nhật lại cái số lượng
                foreach($_SESSION['mygiohang'] as $item){
                    //Ở đây, $item['TenSP'] là tên sản phẩm của mỗi mục trong giỏ hàng, và $TenSP là tên sản phẩm mà người dùng muốn thêm vào giỏ hàng thông qua form gửi dữ liệu. 
                    if($item['TenSP'] == $TenSP){
                        $SoLuongNew =  intval($SoLuong) + intval($item['SoLuong']);//$SoLuong được sử dụng để đại diện cho số lượng sản phẩm mà người dùng muốn thêm vào giỏ hàng. //$item['soluong']: Đây có thể là số lượng của sản phẩm hiện tại trong giỏ hàng.
                        $_SESSION['mygiohang'][$i]['SoLuong'] = $SoLuongNew;
                        $flag = 1; // và gán lại biến tạm = 1
                        break; // sau khi check xong thì thoát luôn
                    }
                    $i++;
                }
                if($flag == 0){
                    $cart = [
                        "MaSP"=>$MaSP,
                        "HinhAnh"=>$HinhAnh,
                        "GiaSP"=>$GiaSP,
                        "TenSP"=>$TenSP,
                        "SoLuong"=>$SoLuong
                    ];
                    $_SESSION['mygiohang'][] = $cart;// Sau khi thêm sản phẩm vào giỏ hàng thành công
                }
                $_SESSION['added_to_cart'] = true; // Đánh dấu rằng một sản phẩm đã được thêm vào giỏ hàng
                header("location:" . APPURL);
            }

            //View ra trang
            $this->renderView("v_product_cart", $this->titlepage, $this->data);
        }

        function Delete_CartId(){
            preg_match('/\/cart\/deleteId\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
            
            if(isset($matches[1])){
                $id = $matches[1];
                array_splice($_SESSION['mygiohang'],$id,1); //xoa cai mang nao - Cai dinh vi thu may - xoa bao nhieu phan tu
            }else{
                $_SESSION['mygiohang'] = [];
            }
            header("location:".APPURL."product/cart");
        }

        public function update_soluong(){
            preg_match('/\/cart\/soLuongId\/(\d+)\/(\w+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
            
            if(isset($matches)){
                $MaSP = $matches[1];
                $action = $matches[2];

                $cart = isset($_SESSION['mygiohang']) ? $_SESSION['mygiohang'] : [];

                $key = array_search($MaSP, array_column($cart, 'MaSP'));
                
                //Nếu sản phẩm được tìm thấy
                if($key !== false){
                    if($action == 'more'){
                        $cart[$key]['SoLuong']++;
                    }elseif ($action == 'less' && $cart[$key]['SoLuong'] > 1) {
                        $cart[$key]['SoLuong']--;
                    }
                    $_SESSION['mygiohang'] = $cart;
                }
            }
            header("location: ".APPURL."product/cart");
        }

        public function checkout(){ 
            $this->titlepage = "Trang thanh toán";

            if (empty($_SESSION['mygiohang'])) {
                header("location: ".APPURL."");
            }
                // LẤY DỮ LIỆU TỪ FORM
                    // đoạn mã này là xác định liệu người dùng đã đăng nhập hay chưa
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_SESSION['user'])){
                        $MaTK = $_SESSION['user']['MaTK']; //nếu họ đã đăng nhập
                    }else{
                        $MaTK = 0; //nếu họ chưa đăng nhập
                    }
                    
                    $TongTien = $_POST['TongTien'];
                    $HoTen = $_POST['HoTen'];
                    $DiaChi = $_POST['DiaChi'];
                    $SoDienThoai = $_POST['SoDienThoai'];
                    $Email = $_POST['Email'];
                    if(isset($_POST['GhiChu'])){
                        $GhiChu = $_POST['GhiChu']; //dữ liệu được gửi đi -> True
                    }else{
                        $GhiChu = ""; //nếu không có dữ liệu được gửi đi ->False -> rỗng
                    }
                    if(isset($_POST['PhuongThucTT'])){
                        $PhuongThucTT = $_POST['PhuongThucTT']; //dữ liệu được gửi đi -> True
                    }else{
                        $PhuongThucTT = 0; //nếu không có dữ liệu được gửi đi ->False -> rỗng
                    }
                    $MaDHRandom = "Organic".rand(0,999999);
                // Tạo đơn hàng và trả về một id đơn hàng
                    $iddh = $this->htmlOrderModel->TaoDonHang($MaTK,$TongTien,$HoTen,$DiaChi,$SoDienThoai,$Email,$GhiChu,$PhuongThucTT,$MaDHRandom);
                // LƯU LẠI BẰNG SESSION
                    $_SESSION['iddh'] = $iddh;

                    if(isset($_SESSION['mygiohang']) && is_array($_SESSION['mygiohang'])){
                        foreach($_SESSION['mygiohang'] as $item){
                            $this->htmlProductModel->product_giamsl($item['MaSP'],$item['SoLuong']);
                            $this->htmlOrderModel->order_soluong($iddh,$item['MaSP']);
                            //Thêm nó vào chi tiêt đơn hàng 
                            $this->htmlOrderModel->addOrder($iddh,$item['MaSP'],$item['GiaSP'],$item['SoLuong']); //$iddh là để nó biết lấy theo cái mã iddh nào
                        }
                        //nghĩa là sau khi sản phẩm đó được đặt, và quay lại trang chủ thì sản phẩm đó phải biến mất trong giỏ hàng
                    }
                
                    
                    if($PhuongThucTT == 1 ){
                        //Gửi Email
                            // $TieuDe = "Đơn hàng bạn đặt đã thành công";
                            // $NoiDung = "<div><p>Cảm ơn quý khách đã đặt hàng của chúng tôi mã đơn hàng của bạn là: ".$MaDHRandom."</p><div>";
                            // $NoiDung .= "Thông tin đơn đặt hàng bao gồm:";
                            // $TongTien=0; $ThanhTien=0;
                            // foreach($_SESSION['mygiohang'] as $emailcart){
                            //     $ThanhTien = $emailcart['SoLuong'] * $emailcart['GiaSP'];
                            //     $TongTien +=$ThanhTien;
                            //     $NoiDung .= '
                            //             <ul>
                            //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Mã SP:</strong> '.$emailcart['MaSP'].'</li>
                            //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Tên SP:</strong> '.$emailcart['TenSP'].'</li>
                            //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Số Lượng:</strong> '.$emailcart['SoLuong'].'</li>
                            //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Giá SP:</strong> '.$emailcart['GiaSP'].'</li>
                            //                 <li style="list-style: none;"><strong style="color: #7FAD39;">Thành Tiền:</strong> '.$ThanhTien.'</li>
                            //             </ul>
                            //         ';
                            // }
                            // $NoiDung .= '
                            //             <hr>
                            //             <ul>
                            //                 <li style="list-style: none;"><strong style="color: red;">Tổng tiền:</strong> '.$TongTien.'</li>
                            //             </ul>';
                                        
                            // $MailDatHang = $_SESSION['email'];
                            // $mailer = new Mailer();
                            // $mailer->DatHangEmail($TieuDe,$NoiDung,$MailDatHang);
                            // //Chuyển đến trang đơn hàng (Hóa đơn)
                            header("location:".APPURL."order/vieworder");
                            unset($_SESSION['mygiohang']);
                    } elseif ($PhuongThucTT == 2) {
                        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                        $vnp_Returnurl = APPURL."order/vieworder";
                        $vnp_TmnCode = "9KKE7C2Q";//Mã website tại VNPAY 
                        $vnp_HashSecret = "BWUHEEXHJGAUKSTBVRWFMQXIFHFEVPAC"; //Chuỗi bí mật

                        $ThanhTien = 0;
                        $TongTien = 0;
                        foreach($_SESSION['mygiohang'] as $item){
                            $ThanhTien = $item['SoLuong'] * $item['GiaSP'];
                            $TongTien += $ThanhTien;
                        }
                        unset($_SESSION['mygiohang']);
                        $vnp_TxnRef = rand(00,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                        $vnp_OrderInfo = 'Noi dung thanh toan';
                        $vnp_OrderType = 'billpayment';
                        $vnp_Amount = $TongTien * 100;
                        $vnp_Locale = 'vn';
                        $vnp_BankCode = 'NCB';
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                        //Add Params of 2.0.1 Version
                        //$vnp_ExpireDate = $_POST['txtexpire'];
                        //Billing
                        // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                        // $vnp_Bill_Email = $_POST['txt_billing_email'];
                        // $fullName = trim($_POST['txt_billing_fullname']);
                        // if (isset($fullName) && trim($fullName) != '') {
                        //     $name = explode(' ', $fullName);
                        //     $vnp_Bill_FirstName = array_shift($name);
                        //     $vnp_Bill_LastName = array_pop($name);
                        // }
                        // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
                        // $vnp_Bill_City=$_POST['txt_bill_city'];
                        // $vnp_Bill_Country=$_POST['txt_bill_country'];
                        // $vnp_Bill_State=$_POST['txt_bill_state'];
                        // // Invoice
                        // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
                        // $vnp_Inv_Email=$_POST['txt_inv_email'];
                        // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
                        // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
                        // $vnp_Inv_Company=$_POST['txt_inv_company'];
                        // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
                        // $vnp_Inv_Type=$_POST['cbo_inv_type'];
                        $inputData = array(
                            "vnp_Version" => "2.1.0",
                            "vnp_TmnCode" => $vnp_TmnCode,
                            "vnp_Amount" => $vnp_Amount,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $vnp_IpAddr,
                            "vnp_Locale" => $vnp_Locale,
                            "vnp_OrderInfo" => $vnp_OrderInfo,
                            "vnp_OrderType" => $vnp_OrderType,
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $vnp_TxnRef

                            //"vnp_ExpireDate"=>$vnp_ExpireDate
                            // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
                            // "vnp_Bill_Email"=>$vnp_Bill_Email,
                            // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
                            // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
                            // "vnp_Bill_Address"=>$vnp_Bill_Address,
                            // "vnp_Bill_City"=>$vnp_Bill_City,
                            // "vnp_Bill_Country"=>$vnp_Bill_Country,
                            // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
                            // "vnp_Inv_Email"=>$vnp_Inv_Email,
                            // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
                            // "vnp_Inv_Address"=>$vnp_Inv_Address,
                            // "vnp_Inv_Company"=>$vnp_Inv_Company,
                            // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
                            // "vnp_Inv_Type"=>$vnp_Inv_Type
                        );

                        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }
                        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                        // }

                        //var_dump($inputData);
                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }

                        $vnp_Url = $vnp_Url . "?" . $query;
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }
                        $returnData = array('code' => '00'
                            , 'message' => 'success'
                            , 'data' => $vnp_Url);
                            if (isset($_POST['redirect'])) {
                                header('Location: ' . $vnp_Url);
                                die();
                            } else {
                                echo json_encode($returnData);
                            }
                        
                    } elseif ($PhuongThucTT == 3) {
                        function execPostRequest($url, $data)
                        {
                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                    'Content-Type: application/json',
                                    'Content-Length: ' . strlen($data))
                            );
                            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                            //execute post
                            $result = curl_exec($ch);
                            //close connection
                            curl_close($ch);
                            return $result;
                        }

                        $ThanhTien = 0;
                        $TongTien = 0;
                        foreach($_SESSION['mygiohang'] as $item){
                            $ThanhTien = $item['SoLuong'] * $item['GiaSP'];
                            $TongTien += $ThanhTien;
                        }
                            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                            $partnerCode = 'MOMOBKUN20180529';
                            $accessKey = 'klm05TvNBzhg7h7j';
                            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                            $orderInfo = "Thanh toán qua MoMo";
                            $amount = $TongTien;
                            $orderId = rand(00,9999);
                            $redirectUrl = APPURL."order/vieworder";
                            $ipnUrl = APPURL."order/vieworder";
                            $extraData = "";
                            
                            
                                $partnerCode = $partnerCode;
                                $accessKey = $accessKey;
                                $serectkey = $secretKey;
                                $orderId = $orderId; // Mã đơn hàng
                                $orderInfo = $orderInfo;
                                $amount = $amount;
                                $ipnUrl = $ipnUrl;
                                $redirectUrl = $redirectUrl;
                                $extraData = $extraData;
                            
                                $requestId = time() . "";
                                $requestType = "payWithATM";
                                //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                                //before sign HMAC SHA256 signature
                                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                                $signature = hash_hmac("sha256", $rawHash, $serectkey);
                                $data = array('partnerCode' => $partnerCode,
                                    'partnerName' => "Test",
                                    "storeId" => "MomoTestStore",
                                    'requestId' => $requestId,
                                    'amount' => $amount,
                                    'orderId' => $orderId,
                                    'orderInfo' => $orderInfo,
                                    'redirectUrl' => $redirectUrl,
                                    'ipnUrl' => $ipnUrl,
                                    'lang' => 'vi',
                                    'extraData' => $extraData,
                                    'requestType' => $requestType,
                                    'signature' => $signature);
                                $result = execPostRequest($endpoint, json_encode($data));
                                $jsonResult = json_decode($result, true);  // decode json
                            
                                //Just a example, please check more in there
                            
                                header('Location: ' . $jsonResult['payUrl']);
                                unset($_SESSION['mygiohang']);
                    }
                        
                    }


            $this->renderView("v_product_checkout", $this->titlepage, $this->data);
        }

        public function vieworder(){
            $this->titlepage = "Trang đơn hàng";
            $MaDH = $_SESSION['iddh'];
            $viewdonhang = $this->htmlOrderModel->get_order($MaDH);
            $viewsanphamorder = $this->htmlOrderModel->get_productOrder($MaDH);
            $this->data['viewdonhang'] = $viewdonhang;
            $this->data['viewsanphamorder'] = $viewsanphamorder;
            $this->renderView("v_product_order", $this->titlepage, $this->data);
        }

        function love(){
            $this->titlepage = "Trang yêu thích";

            $getyeuthich = $this->htmlProductModel->product_yeuthich();

            $this->data['getyeuthich'] = $getyeuthich;

            $this->renderView("v_product_yeuthich", $this->titlepage ,$this->data);
        }
    }


















/*
        include_once 'config/config.php';


    if(isset($_GET['act']) && ($_GET['act']!="")){
        switch ($_GET['act']) {
            case 'binhluan':
                $MaTK = $_SESSION['user']['MaTK'];
                if(isset($_POST['submitbinhluan'])){
                    $MaSP = $_POST['MaSP'];
                    $NoiDung = $_POST['NoiDung'];
                    binhuan_add($MaSP,$MaTK,$NoiDung);
                }
                header("location: index.php?mod=product&act=detail&MaSP=$MaSP");
                break;
            case 'detail':
                $update_view = product_updateLuotXem($_GET['MaSP']);
                $detail_product = product_detailbyid($_GET['MaSP']);
                $loadcomment = get_byproductcomment($_GET['MaSP']);
                $lienquan_product = product_lienquanRanDom($detail_product['MaDM']);
                
                

                if (isset($_POST['submitYeuThich'])) {
                    $MaSP = $_POST['MaSP'];
                    $MaTK = $_POST['MaTK'];
                    $YeuThich = $_POST['YeuThich'];
                
                    $isInWishlist = product_detaillove($MaSP, $MaTK, $YeuThich);

                    if (!$isInWishlist) {
                        // Sản phẩm chưa có trong danh sách yêu thích, thêm vào
                        product_addToWishlist($MaSP, $MaTK, $YeuThich);
                        $_SESSION['wishlist_active'][$MaSP] = 'wishlist-active';
                    }

                    if ($isInWishlist && $isInWishlist['MaSP'] == $MaSP) {
                        // Sản phẩm đã có trong danh sách yêu thích với sản phẩm khác, xóa nó trước
                        product_removeFromWishlist($MaSP, $MaTK, $YeuThich);
                        unset($_SESSION['wishlist_active'][$isInWishlist['MaSP']]);
                    }
                    
                    // Thêm sản phẩm vào danh sách yêu thích
                    header("location: index.php?mod=product&act=detail&MaSP=".$MaSP);
                    
                }
                
                $view_name = "product_detail";
                break;
            case 'yeuthich':
                
                $getyeuthich = product_yeuthich();
                $view_name = "product_yeuthich";
                break;
            case 'yeuthichdelete':
                if(isset($_GET['MaSP'])){
                    $MaSP = $_GET['MaSP'];
                    product_deleteyeuthich($MaSP);
                    header("location: index.php?mod=product&act=yeuthich");
                }else{
                    $MaSP = "";
                    
                }
                
                break;
            case 'viewcart':
                $view_name = "product_cart";
                break;
            
            case 'addtocart':

                if(!isset($_SESSION['user'])){
                    $_SESSION['canhbao'] = "Bạn cần đăng nhập trước khi mua hàng";
                    header("location: index.php?mod=user&act=login");
                    return; // Nếu không có return, các lệnh phía sau header vẫn có thể được thực hiện
                }

                if(isset($_POST['submitaddtocart']) && ($_POST['submitaddtocart']!="")){
                    $MaSP = $_POST['MaSP'];
                    $HinhAnh = $_POST['HinhAnh'];
                    $GiaSP = $_POST['GiaSP'];
                    $TenSP = $_POST['TenSP'];
                    if(isset($_POST['SoLuong']) && ($_POST['SoLuong']>0)){
                        $SoLuong = $_POST['SoLuong'];
                    }else{
                        $SoLuong = 1;
                    }

                    $flag = 0;  //nếu biến này = 0 thì số lượng không thay đổi, và khi số lượng này không thay đổi thì nó không trùng sản phẩm trong giỏ hàng
                    
                    $i=0; // i để định vị mình đang ở cái sản phẩm nào mà check // i có nghĩa là: ở phần tử thứ i mình cập nhật lại cái số lượng
                    foreach($_SESSION['mygiohang'] as $item){
                        //Ở đây, $item['TenSP'] là tên sản phẩm của mỗi mục trong giỏ hàng, và $TenSP là tên sản phẩm mà người dùng muốn thêm vào giỏ hàng thông qua form gửi dữ liệu. 
                        if($item['TenSP'] == $TenSP){
                            $SoLuongNew =  intval($SoLuong) + intval($item['SoLuong']);//$SoLuong được sử dụng để đại diện cho số lượng sản phẩm mà người dùng muốn thêm vào giỏ hàng. //$item['soluong']: Đây có thể là số lượng của sản phẩm hiện tại trong giỏ hàng.
                            $_SESSION['mygiohang'][$i]['SoLuong'] = $SoLuongNew;
                            $flag = 1; // và gán lại biến tạm = 1
                            break; // sau khi check xong thì thoát luôn
                        }
                        $i++;
                    }
                    if($flag == 0){
                        $cart = [
                            "MaSP"=>$MaSP,
                            "HinhAnh"=>$HinhAnh,
                            "GiaSP"=>$GiaSP,
                            "TenSP"=>$TenSP,
                            "SoLuong"=>$SoLuong
                        ];
                        $_SESSION['mygiohang'][] = $cart;
                    }
                    header("location: index.php?mod=product&act=viewcart");
                }
                
                break;
            case 'update_quantity':
                // Cập nhật giỏ hàng trong session đảm bảo rằng thông tin giỏ hàng được lưu trữ và duy trì qua các trang và phiên làm việc của người dùng.
                $id = $_GET['id'];
                $type = $_GET['type'];

                //Xử lý giảm hoặc tăng số lượng
                if($type === 'decre'){ 
                    //Kiểm tra nếu số lượng của sản phẩm trong giỏ hàng lớn hơn 1.
                    if($_SESSION['mygiohang'][$id]['SoLuong'] > 1){
                        // Nếu điều kiện trên đúng, giảm số lượng của sản phẩm đi 1 đơn vị.
                        $_SESSION['mygiohang'][$id]['SoLuong']--;
                    }else{
                        //Nếu số lượng là 1 hoặc dưới 1, loại bỏ sản phẩm khỏi giỏ hàng.
                        unset($_SESSION['mygiohang'][$id]);
                    }
                }else{
                    $_SESSION['mygiohang'][$id]['SoLuong']++;
                }
                header("location: index.php?mod=product&act=viewcart");
                break;
            
            case 'deleteid':
                if(isset($_GET['del']) && ($_GET['del']>=0)){
                    array_splice($_SESSION['mygiohang'],$_GET['del'],1); //xoa cai mang nao - Cai dinh vi thu may - xoa bao nhieu phan tu
                }else{
                    $_SESSION['mygiohang'] = [];
                }
                header("location: index.php?mod=product&act=viewcart");
                break;
            case 'delateall':
                if(isset($_SESSION['mygiohang']) && ($_SESSION['mygiohang']>0)){
                    unset($_SESSION['mygiohang']);
                }else{
                    $_SESSION['mygiohang'] = [];
                }
                header("location: index.php?mod=page&act=home");
                break;

            case 'checkout':
                //Nếu không có sản phẩm thì không cho nó chuyển đến trang thanh toán
                if (empty($_SESSION['mygiohang'])) {
                    header("location: index.php?mod=product&act=viewcart");
                } else {
                    // Nếu có sản phẩm trong giỏ hàng, tiếp tục xử lý đơn hàng
                    if (!isset($_SESSION['user'])) {
                        $_SESSION['canhbao'] = "Bạn cần đăng nhập trước khi mua hàng";
                        header("location: index.php?mod=user&act=login");
                        return; // Nếu không có return, các lệnh phía sau header vẫn có thể được thực hiện
                    }
                }
                // Tiếp tục xử lý thông tin đơn hàng và chuyển hướng đến trang thanh toán
                $view_name = "product_checkout";
                break;

            
            //chuyển đến tran checkout
            case 'order':
                require "mail/sendmail.php";

                if(!isset($_SESSION['user'])){
                    $_SESSION['canhbao'] = "Bạn cần đăng nhập trước khi mua hàng";
                    header("location: index.php?mod=user&act=login");
                    return; // Nếu không có return, các lệnh phía sau header vẫn có thể được thực hiện
                }

                // LẤY DỮ LIỆU TỪ FORM
                    // đoạn mã này là xác định liệu người dùng đã đăng nhập hay chưa
                        if(isset($_SESSION['user'])){
                            $MaTK = $_SESSION['user']['MaTK']; //nếu họ đã đăng nhập
                        }else{
                            $MaTK = 0; //nếu họ chưa đăng nhập
                        }
                        $TongTien = $_POST['TongTien'];
                        $HoTen = $_POST['HoTen'];
                        $DiaChi = $_POST['DiaChi'];
                        $SoDienThoai = $_POST['SoDienThoai'];
                        $Email = $_POST['Email'];
                        if(isset($_POST['GhiChu'])){
                            $GhiChu = $_POST['GhiChu']; //dữ liệu được gửi đi -> True
                        }else{
                            $GhiChu = ""; //nếu không có dữ liệu được gửi đi ->False -> rỗng
                        }
                        if(isset($_POST['PhuongThucTT'])){
                            $PhuongThucTT = $_POST['PhuongThucTT']; //dữ liệu được gửi đi -> True
                        }else{
                            $PhuongThucTT = 0; //nếu không có dữ liệu được gửi đi ->False -> rỗng
                        }
                        $MaDHRandom = "Organic".rand(0,999999);
                    // Tạo đơn hàng và trả về một id đơn hàng
                        $iddh = TaoDonHang($MaTK,$TongTien,$HoTen,$DiaChi,$SoDienThoai,$Email,$GhiChu,$PhuongThucTT,$MaDHRandom);
                    // LƯU LẠI BẰNG SESSION
                        $_SESSION['iddh'] = $iddh;

                        if(isset($_SESSION['mygiohang']) && is_array($_SESSION['mygiohang'])){
                            foreach($_SESSION['mygiohang'] as $item){
                                
                                order_soluong($iddh,$item['MaSP']);
                                //Thêm nó vào chi tiêt đơn hàng 
                                addOrder($iddh,$item['MaSP'],$item['GiaSP'],$item['SoLuong']); //$iddh là để nó biết lấy theo cái mã iddh nào
                            }
                            //nghĩa là sau khi sản phẩm đó được đặt, và quay lại trang chủ thì sản phẩm đó phải biến mất trong giỏ hàng
                        }
                        
                    if(isset($_POST['submit_checkout']) && ($_POST['submit_checkout'])){
                        if($PhuongThucTT == 1 ){
                            //Gửi Email
                                $TieuDe = "Đơn hàng bạn đặt đã thành công";
                                $NoiDung = "<div><p>Cảm ơn quý khách đã đặt hàng của chúng tôi mã đơn hàng của bạn là: ".$MaDHRandom."</p><div>";
                                $NoiDung .= "Thông tin đơn đặt hàng bao gồm:";
                                $TongTien=0; $ThanhTien=0;
                                foreach($_SESSION['mygiohang'] as $emailcart){
                                    $ThanhTien = $emailcart['SoLuong'] * $emailcart['GiaSP'];
                                    $TongTien +=$ThanhTien;
                                    $NoiDung .= '
                                            <ul>
                                                <li style="list-style: none;"><strong style="color: #7FAD39;">Mã SP:</strong> '.$emailcart['MaSP'].'</li>
                                                <li style="list-style: none;"><strong style="color: #7FAD39;">Tên SP:</strong> '.$emailcart['TenSP'].'</li>
                                                <li style="list-style: none;"><strong style="color: #7FAD39;">Số Lượng:</strong> '.$emailcart['SoLuong'].'</li>
                                                <li style="list-style: none;"><strong style="color: #7FAD39;">Giá SP:</strong> '.$emailcart['GiaSP'].'</li>
                                                <li style="list-style: none;"><strong style="color: #7FAD39;">Thành Tiền:</strong> '.$ThanhTien.'</li>
                                            </ul>
                                        ';
                                }
                                $NoiDung .= '
                                            <hr>
                                            <ul>
                                                <li style="list-style: none;"><strong style="color: red;">Tổng tiền:</strong> '.$TongTien.'</li>
                                            </ul>';
                                            
                                $MailDatHang = $_SESSION['email'];
                                $mail = new Mailer();
                                $mail->DatHangEmail($TieuDe,$NoiDung,$MailDatHang);
                                //Chuyển đến trang đơn hàng (Hóa đơn)
                                header("location:index.php?mod=product&act=vieworder");
                                unset($_SESSION['mygiohang']);
                        } elseif ($PhuongThucTT == 2) {
                            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                            $vnp_Returnurl = "http://localhost:8080/PHP1/DuAn_1/Organic/index.php?mod=product&act=vieworder";
                            $vnp_TmnCode = "9KKE7C2Q";//Mã website tại VNPAY 
                            $vnp_HashSecret = "BWUHEEXHJGAUKSTBVRWFMQXIFHFEVPAC"; //Chuỗi bí mật

                            $ThanhTien = 0;
                            $TongTien = 0;
                            foreach($_SESSION['mygiohang'] as $item){
                                $ThanhTien = $item['SoLuong'] * $item['GiaSP'];
                                $TongTien += $ThanhTien;
                            }
                            unset($_SESSION['mygiohang']);
                            $vnp_TxnRef = rand(00,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                            $vnp_OrderInfo = 'Noi dung thanh toan';
                            $vnp_OrderType = 'billpayment';
                            $vnp_Amount = $TongTien * 100;
                            $vnp_Locale = 'vn';
                            $vnp_BankCode = 'NCB';
                            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                            //Add Params of 2.0.1 Version
                            //$vnp_ExpireDate = $_POST['txtexpire'];
                            //Billing
                            // $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
                            // $vnp_Bill_Email = $_POST['txt_billing_email'];
                            // $fullName = trim($_POST['txt_billing_fullname']);
                            // if (isset($fullName) && trim($fullName) != '') {
                            //     $name = explode(' ', $fullName);
                            //     $vnp_Bill_FirstName = array_shift($name);
                            //     $vnp_Bill_LastName = array_pop($name);
                            // }
                            // $vnp_Bill_Address=$_POST['txt_inv_addr1'];
                            // $vnp_Bill_City=$_POST['txt_bill_city'];
                            // $vnp_Bill_Country=$_POST['txt_bill_country'];
                            // $vnp_Bill_State=$_POST['txt_bill_state'];
                            // // Invoice
                            // $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
                            // $vnp_Inv_Email=$_POST['txt_inv_email'];
                            // $vnp_Inv_Customer=$_POST['txt_inv_customer'];
                            // $vnp_Inv_Address=$_POST['txt_inv_addr1'];
                            // $vnp_Inv_Company=$_POST['txt_inv_company'];
                            // $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
                            // $vnp_Inv_Type=$_POST['cbo_inv_type'];
                            $inputData = array(
                                "vnp_Version" => "2.1.0",
                                "vnp_TmnCode" => $vnp_TmnCode,
                                "vnp_Amount" => $vnp_Amount,
                                "vnp_Command" => "pay",
                                "vnp_CreateDate" => date('YmdHis'),
                                "vnp_CurrCode" => "VND",
                                "vnp_IpAddr" => $vnp_IpAddr,
                                "vnp_Locale" => $vnp_Locale,
                                "vnp_OrderInfo" => $vnp_OrderInfo,
                                "vnp_OrderType" => $vnp_OrderType,
                                "vnp_ReturnUrl" => $vnp_Returnurl,
                                "vnp_TxnRef" => $vnp_TxnRef

                                //"vnp_ExpireDate"=>$vnp_ExpireDate
                                // "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
                                // "vnp_Bill_Email"=>$vnp_Bill_Email,
                                // "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
                                // "vnp_Bill_LastName"=>$vnp_Bill_LastName,
                                // "vnp_Bill_Address"=>$vnp_Bill_Address,
                                // "vnp_Bill_City"=>$vnp_Bill_City,
                                // "vnp_Bill_Country"=>$vnp_Bill_Country,
                                // "vnp_Inv_Phone"=>$vnp_Inv_Phone,
                                // "vnp_Inv_Email"=>$vnp_Inv_Email,
                                // "vnp_Inv_Customer"=>$vnp_Inv_Customer,
                                // "vnp_Inv_Address"=>$vnp_Inv_Address,
                                // "vnp_Inv_Company"=>$vnp_Inv_Company,
                                // "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
                                // "vnp_Inv_Type"=>$vnp_Inv_Type
                            );

                            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                                $inputData['vnp_BankCode'] = $vnp_BankCode;
                            }
                            // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                            //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                            // }

                            //var_dump($inputData);
                            ksort($inputData);
                            $query = "";
                            $i = 0;
                            $hashdata = "";
                            foreach ($inputData as $key => $value) {
                                if ($i == 1) {
                                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                                } else {
                                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                                    $i = 1;
                                }
                                $query .= urlencode($key) . "=" . urlencode($value) . '&';
                            }

                            $vnp_Url = $vnp_Url . "?" . $query;
                            if (isset($vnp_HashSecret)) {
                                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                            }
                            $returnData = array('code' => '00'
                                , 'message' => 'success'
                                , 'data' => $vnp_Url);
                                if (isset($_POST['redirect'])) {
                                    header('Location: ' . $vnp_Url);
                                    die();
                                } else {
                                    echo json_encode($returnData);
                                }
                            
                        } elseif ($PhuongThucTT == 3) {
                            function execPostRequest($url, $data)
                            {
                                $ch = curl_init($url);
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                        'Content-Type: application/json',
                                        'Content-Length: ' . strlen($data))
                                );
                                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                                //execute post
                                $result = curl_exec($ch);
                                //close connection
                                curl_close($ch);
                                return $result;
                            }

                            $ThanhTien = 0;
                            $TongTien = 0;
                            foreach($_SESSION['mygiohang'] as $item){
                                $ThanhTien = $item['SoLuong'] * $item['GiaSP'];
                                $TongTien += $ThanhTien;
                            }
                                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                                $partnerCode = 'MOMOBKUN20180529';
                                $accessKey = 'klm05TvNBzhg7h7j';
                                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                                $orderInfo = "Thanh toán qua MoMo";
                                $amount = $TongTien;
                                $orderId = rand(00,9999);
                                $redirectUrl = "http://localhost:8080/PHP1/DuAn_1/Organic/index.php?mod=product&act=vieworder";
                                $ipnUrl = "http://localhost:8080/PHP1/DuAn_1/Organic/index.php?mod=product&act=vieworder";
                                $extraData = "";
                                
                                
                                    $partnerCode = $partnerCode;
                                    $accessKey = $accessKey;
                                    $serectkey = $secretKey;
                                    $orderId = $orderId; // Mã đơn hàng
                                    $orderInfo = $orderInfo;
                                    $amount = $amount;
                                    $ipnUrl = $ipnUrl;
                                    $redirectUrl = $redirectUrl;
                                    $extraData = $extraData;
                                
                                    $requestId = time() . "";
                                    $requestType = "payWithATM";
                                    //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                                    //before sign HMAC SHA256 signature
                                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                                    $signature = hash_hmac("sha256", $rawHash, $serectkey);
                                    $data = array('partnerCode' => $partnerCode,
                                        'partnerName' => "Test",
                                        "storeId" => "MomoTestStore",
                                        'requestId' => $requestId,
                                        'amount' => $amount,
                                        'orderId' => $orderId,
                                        'orderInfo' => $orderInfo,
                                        'redirectUrl' => $redirectUrl,
                                        'ipnUrl' => $ipnUrl,
                                        'lang' => 'vi',
                                        'extraData' => $extraData,
                                        'requestType' => $requestType,
                                        'signature' => $signature);
                                    $result = execPostRequest($endpoint, json_encode($data));
                                    $jsonResult = json_decode($result, true);  // decode json
                                
                                    //Just a example, please check more in there
                                
                                    header('Location: ' . $jsonResult['payUrl']);
                                    unset($_SESSION['mygiohang']);
                        }
                    }
                
                    
                    //Chuyển đến trang đơn hàng (Hóa đơn)
                    
                break;
        
            case 'vieworder':
                $viewdonhang = get_order($_SESSION['iddh']);
                $viewsanphamorder = get_productOrder($_SESSION['iddh']);
                
                $view_name = "product_order";
                break;

            
            default:
                header("location:index.php?mod=page&act=home");
                break;
        }
        include_once 'view/v_user_layout.php';
    }else{
        header("location:index.php?mod=page&act=home");
    }*/
?>