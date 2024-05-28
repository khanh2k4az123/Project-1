<?php
            namespace App\model;
            use PDO;
            use PDOException; 
            class m_pdo{
        private $dbhost= DB_HOST;
        private $dbname= DB_NAME;
        private $username= DB_USERNAME;
        private $password = DB_PASSWORD;
        private $conn;
        private $stmt;

        //__construct(). Phương thức này được tự động gọi khi một đối tượng của lớp được tạo ra bằng từ khóa new.
        function __construct(){
            try {
                $this->conn = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $th) {
                // Log hoặc xử lý lỗi nếu cần
                throw $th;
            }
        }

        //excute thêm xóa sửa
        function pdo_execute($sql){
            $sql_args = array_slice(func_get_args(), 1); 
            try{  // Mã cần thử nghiệm
                
                $this->stmt = $this->conn->prepare($sql); //chuẩn bị
                $this->stmt->execute($sql_args); //thực thi câu lệnh SQL
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

        function pdo_last_insert_id($sql) {
            $sql_args = array_slice(func_get_args(), 1);
            try{
                $this->stmt = $this->conn->prepare($sql); // Chuẩn bị câu lệnh SQL
                $this->stmt->execute($sql_args); // Thực thi câu lệnh SQL với các giá trị tham số
                return $this->conn->lastInsertId(); // Trả về ID của bản ghi vừa được chèn
            }
            catch(PDOException $e){ // Xử lý lỗi nếu có
                throw $e;
            }
            finally{ // Đảm bảo đóng kết nối sau khi thực hiện câu lệnh SQL
                unset($conn);
            }
        }

        //Get all
        function pdo_query($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
                $this->stmt = $this->conn->prepare($sql); // Chuẩn bị câu lệnh SQL
                $this->stmt->execute($sql_args); // Thực thi câu lệnh SQL với các giá trị tham số
                $rows = $this->stmt->fetchAll(); // Lấy tất cả các hàng kết quả và đặt chúng vào một mảng
                return $rows; // Trả về mảng chứa dữ liệu từ câu lệnh SQL
            }
            catch(PDOException $e){
                throw $e;
            }
            finally{
                unset($conn);
            }
        }

        //get one
        function pdo_query_one($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
                $this->stmt = $this->conn->prepare($sql);
                $this->stmt->execute($sql_args);
                $row = $this->stmt->fetch(PDO::FETCH_ASSOC); // Lấy một hàng kết quả và đặt chúng vào một mảng liên kết
                return $row; // Trả về mảng liên kết chứa dữ liệu từ câu lệnh SQL
            }
            catch(PDOException $e){
                throw $e;
            }
            finally{
                unset($conn);
            }
        }
        
        function pdo_query_value($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
                $this->stmt = $this->conn->prepare($sql);
                $this->stmt->execute($sql_args);
                $row = $this->stmt->fetch(PDO::FETCH_ASSOC); // Lấy một hàng kết quả và đặt chúng vào một mảng liên kết
                return array_values($row)[0]; // Lấy giá trị đầu tiên của mảng liên kết và trả về nó
            }
            catch(PDOException $e){
                throw $e;
            }
            finally{
                unset($conn);
            }
        }
    }


?>