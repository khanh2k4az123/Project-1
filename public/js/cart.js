
        function kiemtrasoluong(x){
            var num = parseInt(x.value);
            if((num < 1) || (num<11)){
                if(num < 1){
                    x.value = "1";
                    alert("Phải nhập ít nhất là 1");
                }

                if(num > 10){
                    x.value = "10";
                    alert("Nhập số lượng nhiều nhất là 10");
                }
            }else{
                alert("Chỉ có thể nhập số");
            }
            
        }

        //this là biết mình đang ở đâu ở sản phẩm , vị trí nào
        function tangSL(x){
            var soluong_old = x.previousElementSibling; // truy xuất cùng cấp hàng xóm
            var soluong_new = parseInt(soluong_old.value) + 1;
            
            if(soluong_new < 11){
                soluong_old.value = soluong_new; // lấy mới gán lại cho cũ
            }else{
                alert('Số lượng không thể lớn hơn 10');
            }

            var idpro = parseInt(x.nextElementSibling.value);
            //alert("id: "+idpro+"sl: "+soluong_new);
            // Sử dụng Ajax để gửi dữ liệu cập nhật
            $.post("/updatesoluong.php", {
                "idpro": idpro,
                "soluong_new": soluong_new,
            }, function(data, textStatus, jqXHR) {
                // Cập nhật lại nội dung giỏ hàng
                document.getElementById("cart").innerHTML = data;

            });
        }

        function giamSL(x){
            var soluong_old = x.nextElementSibling; // truy xuất cùng cấp hàng xóm
            var soluong_new = parseInt(soluong_old.value) - 1;
            if(soluong_new > 0){
                soluong_old.value = soluong_new; // lấy mới gán lại cho cũ
            }else{
                alert('Số lượng không thể nhỏ hơn 1');
            }
        }
        








    /*
        function tangSL(x){
            var cha = x.parentElement;
            var slold = cha.children[1];
            var slnew = Number(slold.value) + 1;
            slold.value = slnew;
            updatetotal();
            
        }

        function giam(x){
            var cha = x.parentElement;
            var slold = cha.children[1];
            if(Number(slold.value)>1){
                var slnew = parseInt(slold.value) - 1;
                slold.value = slnew;
            }else{
                alert("Đặt hàng tối thiểu là một");
            }
            updatetotal();
        }


        function updatetotal() {
            var dssp = document.querySelectorAll('table tbody tr');
            var TongTien = 0;
            var SoLuong = 0;
            for(const sanpham of dssp) {
                var GiaSP = parseFloat(sanpham.querySelector('#GiaSP').innerText); //innerTexttruy xuất nội dung văn bản bên trong phần tử đã chọn,  trong trường hợp này là nội dung văn bản bên trong phần tử có ID "GiaSP".
                SoLuong = parseInt(sanpham.querySelector('.pro-qty input').value);
                var ThanhTien = GiaSP * SoLuong;
                sanpham.querySelector('.shoping__cart__total').innerText = ThanhTien + ' đ';

                TongTien += ThanhTien;
            }

            var thanhtienElement = document.querySelector('.shoping__checkout ul li:nth-child(1) span');
            thanhtienElement.innerText = TongTien + ' đ';

            var tongTienElement = document.querySelector('.shoping__checkout ul li:nth-child(2) span');
            tongTienElement.innerText = TongTien + ' đ';

            document.querySelector('#TongTien').value=TongTien;
            document.querySelector('#SoLuong').value=SoLuong;

        }
        updatetotal(); // Đảm bảo rằng tổng tiền được cập nhật khi trang được tải


        $("#tangSL").click(function(){
            $.post("updatecart.php",
            {
                SoLuong: "",
                MaSP: ""
            },
            function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });
        });
    
        */
