<?php
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=organic;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(), 1); 
    try{  // Mã cần thử nghiệm
        $conn = pdo_get_connection(); // kết nối đến cơ sở dữ liệu
        $stmt = $conn->prepare($sql); //chuẩn bị
        $stmt->execute($sql_args); //thực thi câu lệnh SQL
    }
    catch(PDOException $e){ // Xử lý nếu try sai 
        throw $e;
    }
    finally{ // Mã luôn được thực thi
        unset($conn); // đảm bảo rằng kết nối đến cơ sở dữ liệu sẽ được đóng, ngay cả khi có lỗi xảy ra.
    }
    /*
    func_get_args() để lấy danh sách tất cả các tham số được truyền vào hàm
    array_slice(..., 1) được sử dụng để tạo một mảng mới bắt đầu từ phần tử thứ hai của mảng trả về bởi func_get_args(). Nói cách khác, nó loại bỏ phần tử đầu tiên của mảng, tức là $sql, và giữ lại các phần tử còn lại.

    */
}
/**
 * Get the last inserted ID using PDO
 * @return string The last inserted ID
 */
function pdo_last_insert_id($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection(); // Mở kết nối đến cơ sở dữ liệu
        $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh SQL
        $stmt->execute($sql_args); // Thực thi câu lệnh SQL với các giá trị tham số
        return $conn->lastInsertId(); // Trả về ID của bản ghi vừa được chèn
    }
    catch(PDOException $e){ // Xử lý lỗi nếu có
        throw $e;
    }
    finally{ // Đảm bảo đóng kết nối sau khi thực hiện câu lệnh SQL
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection(); // Mở kết nối đến cơ sở dữ liệu
        $stmt = $conn->prepare($sql); // Chuẩn bị câu lệnh SQL
        $stmt->execute($sql_args); // Thực thi câu lệnh SQL với các giá trị tham số
        $rows = $stmt->fetchAll(); // Lấy tất cả các hàng kết quả và đặt chúng vào một mảng
        return $rows; // Trả về mảng chứa dữ liệu từ câu lệnh SQL
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy một hàng kết quả và đặt chúng vào một mảng liên kết
        return $row; // Trả về mảng liên kết chứa dữ liệu từ câu lệnh SQL
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy một hàng kết quả và đặt chúng vào một mảng liên kết
        return array_values($row)[0]; // Lấy giá trị đầu tiên của mảng liên kết và trả về nó
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}