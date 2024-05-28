<?php
    
    namespace App\controller;
    use App\model\m_myaccount;

    class c_myaccount extends c_base{
        private $htmlMyaccount;

        function __construct(){
            $this->htmlMyaccount = new m_myaccount;
        }

        function myaccount(){
            $this->titlepage = "Trang tài khoản của tôi";

            $this->renderView("myAccount/v_myaccount_user", $this->titlepage, $this->data);
        }

        function myaccountPassword(){
            $this->titlepage = "Trang đổi mật khẩu";

            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $MaTK = $_POST['MaTK'];
                $SoDienThoai = $_POST['SoDienThoai'];
                $MatKhau = $_POST['MatKhau'];
                $MatKhauNew = $_POST['MatKhauNew'];
                $AgainMatKhau = $_POST['AgainMatKhau'];
                $checkpass = $this->htmlMyaccount->checkpass_myaccount($SoDienThoai,$MatKhau);

                if($checkpass){
                    if($MatKhauNew == $AgainMatKhau){
                        $this->htmlMyaccount->update_passw_myac($MaTK,$SoDienThoai,$MatKhauNew);
                        $_SESSION['thongbao'] = "Mật khẩu mới đã thay đổi thành công";
                    }else{
                        $_SESSION['loi'] = "Mật khẩu mới và xác nhận mật khẩu không khớp";
                    }
                }else{
                    $_SESSION['loi'] = "Số điện thoại hoặc mật khẩu bạn nhập chưa đúng";
                }
            }

            $this->renderView("myAccount/v_myaccount_doipass", $this->titlepage, $this->data);
        }

        function myaccountUpdate(){
            $this->titlepage = "Trang tài khoản";

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $this->htmlMyaccount->update_myaccountid($_POST['MaTK'], $_FILES['HinhAnh']['name'],$_POST['HoTen'],$_POST['UserName'],$_POST['Email'],$_POST['MatKhau'],$_POST['DiaChi'],$_POST['GioiTinh'],$_POST['SoDienThoai']);
                if (isset($_FILES['HinhAnh']) && $_FILES['HinhAnh']['error'] == 0) {
                    $tmpFilePath = $_FILES['HinhAnh']['tmp_name'];//Dòng này lấy đường dẫn tạm thời của tệp tải lên
                    $uploadPath = "public/img/avatar/" . $_FILES['HinhAnh']['name'];//Dòng này xác định đường dẫn và tên tệp mục tiêu
                    move_uploaded_file($tmpFilePath, $uploadPath);//Dòng này sử dụng hàm move_uploaded_file để di chuyển tệp từ vị trí tạm thời (được lưu trong $tmpfile) vào vị trí mục tiêu (được lưu trong $upload).
                    
                }      
                

                $_SESSION['user']['HinhAnh'] = $_FILES['HinhAnh']['name'];
                $_SESSION['user']['HoTen'] = $_POST['HoTen'];
                $_SESSION['user']['UserName'] = $_POST['UserName'];
                $_SESSION['user']['Email'] = $_POST['Email'];
                $_SESSION['user']['MatKhau'] = $_POST['MatKhau'];
                $_SESSION['user']['DiaChi'] = $_POST['DiaChi'];
                $_SESSION['user']['GioiTinh'] = $_POST['GioiTinh'];
                $_SESSION['user']['SoDienThoai'] = $_POST['SoDienThoai'];
            }

            $this->renderView("myAccount/v_myaccount_update", $this->titlepage, $this->data);
        }
        
        // Đơn hàng
        function myaccountOrder(){
            $this->titlepage = "Trang đơn hàng";
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

            if(isset($_SESSION['iddh']) && ($_SESSION['iddh']>0)){
                $viewsanphammyacc = $this->htmlMyaccount->get_productOrdermyacc($page);
                $SoTrang = ceil($this->htmlMyaccount->ordermyaccount_Page()/6);
            }else{
                $viewsanphammyacc = "";
                $SoTrang = ceil($this->htmlMyaccount->ordermyaccount_Page()/6);
            }
            $this->data['viewsanphammyacc'] = $viewsanphammyacc;
            $this->data['SoTrang'] = $SoTrang;
            $this->data['page'] = $page;
            $this->renderView("myAccount/v_myaccount_order", $this->titlepage, $this->data);
        }

        //Chi tiết của 1 đơn hàng
        function orderDetail(){
            $this->titlepage = "Chi tiết đơn hàng";
            preg_match('/\/user\/orderDetail\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
            if(isset($matches[1])){
                $MaDH = $matches[1];
                $detailordermyacount = $this->htmlMyaccount->myaccount_detailorder($MaDH);
            }
            $this->data['detailordermyacount'] = $detailordermyacount;

            $this->renderView("myAccount/v_myaccount_orderdetail", $this->titlepage, $this->data);
        }

        // Hủy đơn hàng
        function callUnset(){
            preg_match('/\/user\/callUnset\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
            if(isset($matches[1])){
                $MaDH = $matches[1];
                $orderStatus =  $this->htmlMyaccount->donhang_huy($MaDH);

                if ($orderStatus == 5) {
                    header("location:".APPURL."user/orderUnset");
                } else {
                    header("location: ".APPURL."user/myaccountOrder");
                }
            }
        }

        function orderUnset(){
            $this->titlepage = "Đơn hàng hủy";
            $MaTK = $_SESSION['user']['MaTK'];
            $canceledOrders = $this->htmlMyaccount->get_canceledOrders($MaTK);
            $this->data['canceledOrders'] = $canceledOrders;

            $this->renderView("myAccount/v_myaccount_dahuy", $this->titlepage, $this->data);
        }

        function orderUnsetDetail(){
            $this->titlepage = "Đơn hàng hủy chi tiết";
            preg_match('/\/user\/orderUnsetDetail\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
            if(isset($matches[1])){
                $MaDH = $matches[1];
                $orderdahuydetail = $this->htmlMyaccount->orderdahuydetail($MaDH);
            }
            $this->data['orderdahuydetail'] = $orderdahuydetail;
            $this->renderView("myAccount/v_myaccount_dahuydetail", $this->titlepage, $this->data);
        }

        function orderSuccess(){
            $this->titlepage = "Đơn hàng đã giao";
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    
            if(isset($_SESSION['user']['MaTK']) && ($_SESSION['user']['MaTK']>0)){
                $viewhistoryorder = $this->htmlMyaccount->historyorder_myaccount($_SESSION['user']['MaTK'],$page);
                $SoTrang = ceil($this->htmlMyaccount->ordermyacc_adminPage()/6);
            }else{
                $viewhistoryorder = $this->htmlMyaccount->historyorder_myaccount($_SESSION['user']['MaTK'],$page);
                $SoTrang = ceil($this->htmlMyaccount->ordermyacc_adminPage()/6);
            }

            $this->data['viewhistoryorder'] = $viewhistoryorder;
            $this->data['SoTrang'] = $SoTrang;
            $this->data['page'] = $page;
            $this->renderView("myAccount/v_myaccount_history", $this->titlepage, $this->data);
        }

        function orderSuccessDetail(){
            $this->titlepage = "Đơn hàng đã giao chi tiết ";
            preg_match('/\/user\/orderSuccessDetail\/(\d+)/', $_SERVER['REQUEST_URI'], $matches);//kết quả được lưu trữ trong $matchesmảng
            if(isset($matches[1])){
                $MaDH = $matches[1];
                $viewhistorymyacc = $this->htmlMyaccount->history_myaccount($MaDH);
            }
            $this->data['viewhistorymyacc'] = $viewhistorymyacc;
            $this->renderView("myAccount/v_myaccount_historydetail", $this->titlepage, $this->data);
        }
    }

    //     include_once 'config/config.php';
    // //
    // if(isset($_SESSION['user']) == false){
    //     header("location: index.php?mod=user&act=login");
    //     $_SESSION['canhbao'] = "Vui lòng đăng nhập!";
    //     exit();//thoát liền trang web
    // }

    // if(isset($_GET['act']) && ($_GET['act']!="")){
    //     switch ($_GET['act']) {
    //         case 'myaccount':
                
    //             $view_name = "myaccount_user";
    //             break;
    //         case 'update_myaccount':
                
    //             if(isset($_POST['submit'])){
    //                 update_myaccountid($_POST['MaTK'], $_FILES['HinhAnh']['name'],$_POST['HoTen'],$_POST['UserName'],$_POST['Email'],$_POST['MatKhau'],$_POST['DiaChi'],$_POST['GioiTinh'],$_POST['SoDienThoai']);
    //                 if (isset($_FILES['HinhAnh']) && $_FILES['HinhAnh']['error'] == 0) {
    //                     $tmpFilePath = $_FILES['HinhAnh']['tmp_name'];
    //                     $uploadPath = "view/img/avatar/" . $_FILES['HinhAnh']['name'];
    //                     move_uploaded_file($tmpFilePath, $uploadPath);
    //                 }                    
    //                 $_SESSION['user']['HinhAnh'] = $_FILES['HinhAnh']['name'];
    //                 $_SESSION['user']['HoTen'] = $_POST['HoTen'];
    //                 $_SESSION['user']['UserName'] = $_POST['UserName'];
    //                 $_SESSION['user']['Email'] = $_POST['Email'];
    //                 $_SESSION['user']['MatKhau'] = $_POST['MatKhau'];
    //                 $_SESSION['user']['DiaChi'] = $_POST['DiaChi'];
    //                 $_SESSION['user']['GioiTinh'] = $_POST['GioiTinh'];
    //                 $_SESSION['user']['SoDienThoai'] = $_POST['SoDienThoai'];
    //             }
    //             $view_name = "myaccount_update";
    //             break;
    //         case 'forget_pasword':
                
    //             $ThongBao = "";
    //             if(isset($_POST['submit'])){
    //                 $kq = forget_myaccount($_POST['SoDienThoai']);
                    
    //                 if(is_array($kq) ){
    //                     $ThongBao = "Mật khẩu của bạn là: <strong style='color:red;'>".$kq['MatKhau']."</strong>";
    //                 }else{
    //                     $ThongBao = "Số điện thoại bạn nhập chưa chính xác";
    //                 }
    //             }
    //             $view_name = "myaccount_forget";
    //             break;

    //         case 'doi_password':
                
    //             $ThongBao = "";$ThongBao2 = "";
    //             if(isset($_POST['submit'])){
    //                 $MaTK = $_POST['MaTK'];
    //                 $SoDienThoai = $_POST['SoDienThoai'];
    //                 $MatKhau = $_POST['MatKhau'];
    //                 $MatKhauNew = $_POST['MatKhauNew'];
    //                 $AgainMatKhau = $_POST['AgainMatKhau'];
    //                 $checkpass = checkpass_myaccount($SoDienThoai,$MatKhau);

    //                 if($checkpass){
    //                     if($MatKhauNew == $AgainMatKhau){
    //                         update_passw_myac($MaTK,$SoDienThoai,$MatKhauNew);
    //                         $_SESSION['thongbao'] = "Mật khẩu mới đã thay đổi thành công";
    //                     }else{
    //                         $_SESSION['loi'] = "Mật khẩu mới và xác nhận mật khẩu không khớp";
    //                     }
    //                 }else{
    //                     $_SESSION['loi'] = "Số điện thoại hoặc mật khẩu bạn nhập chưa đúng";
    //                 }
    //             }
    //             $view_name = "myaccount_doipass";
    //             break;
            
    //         case 'order_account':
                
    //             if(isset($_SESSION['iddh']) && ($_SESSION['iddh']>0)){
    //                 if(isset($_GET['page']) && ($_GET['page']>=1)){ //Nếu truyền rồi
    //                     $page = $_GET['page'];
    //                 }else{
    //                     $page = 1;//nếu chưa truyền thì mặc định cho ns bằng 1
    //                 }
    //                 $viewsanphammyacc = get_productOrdermyacc($page);
    //                 $SoTrang = ceil(ordermyaccount_Page()/6);
    //             }else{
    //                 $viewsanphammyacc = "";
    //                 $SoTrang = ceil(ordermyaccount_Page()/6);
    //             }
                
    //             $view_name = "myaccount_order";
    //             break;
    //         case 'order_accountdetail':
    //             $MaDH = $_GET['MaDH'];
    //             $detailordermyacount = myaccount_detailorder($MaDH);
    //             $view_name = "myaccount_orderdetail";
    //             break;
    
    //         case 'calldahuy':
    //             if(isset($_GET['MaDH'])){
    //                 $orderStatus = donhang_huy($_GET['MaDH']);

    //                 if ($orderStatus == 5) {
    //                     header("location: index.php?mod=myaccount&act=orderdahuy");
    //                 } else {
    //                     header("location: index.php?mod=myaccount&act=order_account");
    //                 }
    //             }
    //             break;

    //         case 'orderdahuy':
    //             $MaTK = $_SESSION['user']['MaTK'];
    //             $canceledOrders = get_canceledOrders($MaTK);
    //             $view_name = "myaccount_dahuy";
    //             break;
            
    //         case 'orderdahuydetail':
    //             $MaDH = $_GET['MaDH'];
    //             $orderdahuydetail = orderdahuydetail($MaDH);
    //             $view_name = "myaccount_dahuydetail";
    //             break;

    //         case 'history_account':

    //             if(isset($_GET['page']) && ($_GET['page']>=1)){ //Nếu truyền rồi
    //                 $page = $_GET['page'];
    //             }else{
    //                 $page = 1;//nếu chưa truyền thì mặc định cho ns bằng 1
    //             }

    //             if(isset($_SESSION['user']['MaTK']) && ($_SESSION['user']['MaTK']>0)){
    //                 $viewhistoryorder = historyorder_myaccount($_SESSION['user']['MaTK'],$page);
    //                 $SoTrang = ceil(ordermyacc_adminPage()/6);
    //             }else{
    //                 $viewhistoryorder = historyorder_myaccount($_SESSION['user']['MaTK'],$page);
    //                 $SoTrang = ceil(ordermyacc_adminPage()/6);
    //             }
    //             $view_name = "myaccount_history";
    //             break;
                
    //         case 'detail_account':
                
    //             $MaDH = $_GET['MaDH'];
    //             $viewhistorymyacc = history_myaccount($MaDH);
                
    //             $view_name = "myaccount_historydetail";
    //             break;
            
    //         default:
    //             header("location:index.php?mod=page&act=home");
    //             break;
    //     }
    //     include_once 'view/myAccount/v_myaccount_layout.php';
    // }else{
    //     header("location:index.php?mod=page&act=home");
    // }
?>