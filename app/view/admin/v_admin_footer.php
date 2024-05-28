</div>
    </div>

    
</body>
<script src="<?=APPURL?>public/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</html>
<script>
    function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'" width="300" height="auto"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}
$("#HinhAnh").change(function () {
    imagePreview(this);
});
    
</script>
<script>
    //
    document.querySelector('#change-darkmode').addEventListener('click',function(){
        document.querySelector('body').classList.toggle('darkmode');
        var isDarkMode = document.querySelector('body').classList.contains('darkmode'); //contain la co chua, la no co chua darkmode //kiểm tra xem darkmodelớp đó có trong danh sách lớp của body phần tử được chọn hay không.
        localStorage.setItem('darkmode', isDarkMode); //setItem được sử dụng để lưu trữ dữ liệu trong bộ nhớ cục bộ của trình duyệt web.
    })
    //Nếu giá trị là 'true', điều đó có nghĩa là người dùng đã kích hoạt chế độ tối trước đó
    if(localStorage.getItem('darkmode')=='true'){//getItem('darkmode'): Phương thức này lấy giá trị
        document.querySelector('body').classList.add('darkmode'); //add hãy thêm tên lớp CSS 'darkmode'vào <body>phần tử // thêm darkmode vào phần tử body
    }
</script>
<!-- 
    classList để quản lý các class của phần tử đó
    classList.toggle là một phương thức của classList được sử dụng để thêm hoặc xóa một class từ danh sách các class của phần tử.
    Nếu class đã tồn tại, toggle sẽ xóa nó khỏi danh sách class. Nếu class chưa tồn tại, nó sẽ được thêm vào. 

-->