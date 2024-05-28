<?php
namespace App\routing;

//class Route được sử dụng để trả về danh sách các tuyến đường (routes) đã được định nghĩa trong ứng dụng. 
class route {
    private static $routes = [];

    //public static Định nghĩa phương thức là phương thức tĩnh, có thể được gọi mà không cần tạo đối tượng từ lớp Route.
    public static function showroutes(){
        return self::$routes;//Trả về giá trị của thuộc tính tĩnh $routes
    }
    //public static: Phương thức được định nghĩa là phương thức tĩnh, có thể được gọi mà không cần tạo đối tượng từ lớp Route.
    public static function add($uri, $controller) {
        $uri="#^".$uri."$#"; //Biến đổi $uri thành một biểu thức chính quy. Điều này có nghĩa là tuyến đường sẽ phù hợp với chuỗi $uri bắt đầu từ đầu và kết thúc tại cuối.
        self::$routes[] = ['uri' => $uri, 'controller' => $controller];//Thêm một mảng mới vào mảng $routes
    }

    // được sử dụng để xác định và kích hoạt controller và phương thức tương ứng dựa trên đường dẫn (URI) được truyền vào. 
    public static function dispatch($uri) {
        // Duyệt qua danh sách tất cả các tuyến đường đã được đăng ký.
        foreach (self::$routes as $route) {
            //echo $route['uri']." <> ".$uri."</br>";    
            // Kiểm tra sự khớp giữa biểu thức chính quy của tuyến đường và URI
            if (preg_match($route['uri'], $uri,$matches)) {
                // Nếu có sự khớp, kiểm tra xem có các phần tử trong mảng $matches hay không
                if(count($matches)>0){
                    // Phân tách tên controller và phương thức từ chuỗi 'Controller@method'
                    list($controller, $method) = explode('@', $route['controller']);
                    // Xây dựng đường dẫn của class controller
                    $controllerClass = 'App\Controller\\' . $controller;
                    // Tạo instance của class controller
                    $controllerInstance = new $controllerClass();
                    // Gọi phương thức tương ứng của controller
                    $controllerInstance->$method();
                    return;
                }
            }
        }
        echo '404 Not';
    }
}

/*
    Hàm preg_match trong PHP được sử dụng để thực hiện so khớp biểu thức chính quy (regex) trên một chuỗi. Cụ thể, nó kiểm tra xem một chuỗi có khớp với một biểu thức chính quy hay không.
    -> preg_match có thể được sử dụng để xác định và phân tích đường dẫn URI để định tuyến đến các controller và action tương ứng
    -> preg_match($pattern, $subject, $matches);
        + $pattern: Biểu thức chính quy mà bạn muốn so khớp.
        + $subject: Chuỗi cần được kiểm tra khớp với biểu thức chính quy.
        + $matches (tùy chọn): Một mảng được truyền bởi tham chiếu, nơi các kết quả của so khớp sẽ được lưu trữ.

*/

/*
    STATIC
    Sử dụng thuộc tính và phương thức tĩnh (static) cho việc lưu trữ thông tin chung giữa tất cả các đối tượng của lớp. 
    Các thuộc tính tĩnh có thể được truy cập trực tiếp từ tên lớp(SELF) mà không cần tạo đối tượng. Điều này giúp thuận tiện cho việc truy cập dữ liệu toàn cục từ mọi nơi trong ứng dụng mà không cần tạo đối tượng.


    Mã sử dụng static thường khó tái sử dụng và kế thừa. 

*/


