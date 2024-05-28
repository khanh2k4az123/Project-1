-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 25, 2024 lúc 07:11 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `organic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `MaBV` int NOT NULL,
  `TieuDe` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `HinhAnhDetail` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `MoTaNgan` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `NgayViet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MaDM` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`MaBV`, `TieuDe`, `HinhAnh`, `HinhAnhDetail`, `MoTaNgan`, `MoTa`, `NgayViet`, `MaDM`) VALUES
(1, 'Tại sao buổi sáng nên ăn trái cây', 'baiviet-3.png', 'baiviet-1.png', 'Với nhiều người bữa sáng thường bao gồm các ...', 'Ăn trái cây giúp thải độc sau 1 giấc ngủ\r\nCơ thể chúng ta trải qua giai đoạn giải độc mạnh nhất trong khoảng từ 7-11 giờ sáng. Trái cây sẽ cung cấp thêm năng lượng cho quá trình này so với các loại thực phẩm chống giải độc chứa nhiều chất béo.\r\n\r\nTrái cây giúp tăng cường trao đổi chất\r\nĂn trái cây là cách tốt nhất để bắt đầu ngày mới vì cơ thể bạn sẽ dễ dàng tiêu hóa những thứ đầu tiên vào buổi sáng. Nó cũng dẫn đến tăng tỷ lệ trao đổi chất trong vài giờ tiếp theo nhờ vào lượng đường trái cây tự nhiên.\r\n\r\nKích thích đường tiêu hóa\r\nTrái cây cho bữa sáng giúp cung cấp các enzym, chất xơ và prebiotics có giá trị để kích hoạt dịch tiêu hóa trong dạ dày của chúng ta và loại bỏ các chất thải cũ từ ngày hôm trước. Chất xơ từ trái cây giúp làm sạch ruột kết một cách triệt để và giúp bạn cảm thấy nhẹ nhàng và sảng khoái trong suốt thời gian còn lại của ngày.\r\nTiêu thụ trái cây buổi sáng giúp cơ thể tỉnh táo\r\nCơ thể bạn cần đường trái cây tự nhiên ngay khi thức dậy. Hãy thử thay thế ly cà phê espresso của bạn bằng một tách trà thơm ngon tự nhiên bằng cách pha một ly sinh tố giúp não bộ của bạn nhanh nhẹn và tràn đầy năng lượng.\r\n\r\nGiảm cân\r\nTrái cây cung cấp cho bạn nguồn dinh dưỡng tuyệt vời và giúp loại bỏ độc tố dư thừa ra khỏi đường ruột của chúng ta. Ăn trái cây trong ngày bắt đầu từ buổi sáng sẽ giúp thải độc và làm sạch cơ thể, dẫn đến giảm cân. Một quan niệm sai lầm phổ biến là ăn một bữa sáng giàu protein động vật sẽ khiến bạn không ăn quá nhiều trong ngày. Tuy nhiên, các nghiên cứu đã phát hiện ra rằng tiêu thụ nhiều hơn vào buổi sáng sẽ có xu hướng ăn nhiều hơn vào cuối ngày, dẫn đến tăng cân.\r\nTham khảo thêm: những loại trà giảm cân hiệu quả\r\n\r\nTăng cường hệ thống miễn dịch\r\nCó một ly sinh tố lành mạnh thay vì thịt xông khói và xúc xích sẽ tốt hơn nhiều cho hệ thống miễn dịch và sức khỏe tổng thể của bạn về lâu dài. Trái cây có nhiều vitamin và chất chống oxy hóa tự nhiên, giúp tăng cường hệ thống miễn dịch của chúng ta và tránh các bệnh truyền nhiễm.\r\n\r\nTạo thành môi trường trung hoà cho các cơ quan\r\nMọi người lầm tưởng rằng trái cây quá chua, nhưng điều đó là sai. Trên thực tế, chanh là một trong những loại trái cây có tính kiềm cao nhất trên Trái đất. Mặc dù bản chất có thể có tính axit, nhưng khi chúng đến dạ dày của chúng ta, các khoáng chất sẽ phân ly, khiến nó có tính kiềm. Về cơ bản, tất cả các loại trái cây đều có tính kiềm, vì vậy bạn nên ăn chúng vào mỗi buổi sáng.\r\n\r\ntrái cây giúp thải độc\r\n\r\nTrái cây đem lại cảm giác no bụng và thoải mái\r\nNếu bạn không tin những lợi ích trên, bạn cũng có thể nghi ngờ rằng trái cây sẽ khiến bạn no. Hãy yên tâm, vì trái cây có đầy đủ chất xơ, vitamin, khoáng chất, dinh dưỡng thực vật – về cơ bản, những chất này có tác dụng cho não của bạn biết rằng nó đã thỏa mãn và tắt mọi tín hiệu đói đến dạ dày của bạn. Bạn cần phải ăn đủ trái cây để cảm thấy no, vì vậy hãy sẵn sàng tập chuyển hoàn toàn sang trái cây và tăng số lượng khi bạn đã quen với nó.\r\nMột số loại trái cây có nhiều tác dụng kể trên là trái bơ, mãng cầu.\r\n\r\nĂn trái cây tốt cho hệ tim mạch\r\nCác chất dinh dưỡng được đề cập ở trên – tất cả các vitamin, khoáng chất và chất chống oxy hóa rất tốt trong việc giảm mức cholesterol và huyết áp. Những chất này rất quan trọng trong việc ngăn ngừa các bệnh tim mạch và làm cho trái tim của bạn khỏe mạnh hơn.\r\n\r\nĂn trái cây tốt cho dạ dày, giảm chướng bụng\r\nCác chất xơ từ trái cây sẽ đẩy chất thải cũ trong hệ tiêu hóa của bạn ra ngoài và loại bỏ chứng đầy hơi ở bụng dưới. Các loại trái cây chứa nhiều nước như dưa hấu hoạt động như một loại thuốc lợi tiểu tự nhiên để loại bỏ lượng natri dư thừa. Khi bạn lấy hết muối ra, bạn sẽ không có lượng nước dư thừa đó.\r\n\r\nĐiều quan trọng là duy trì một chế độ ăn uống lành mạnh và cân bằng, đồng thời có nghĩa là chuyển sang trái cây, hãy nhớ bổ sung nhiều rau và thịt nạc để có được lượng chất dinh dưỡng đầy đủ. Ăn uống vui vẻ!', '2023-11-10 16:23:30', 12),
(2, '8 loại cá tốt cho sức khoẻ nên mua khi đi chợ', 'baiviet-2.png', 'baiviet-2.png', 'Dưới đây là những loại cá chứa nhiều chất dinh dưỡng, vitamin, protein.', 'Cá là một trong những thực phẩm quen thuộc với người Việt. Đây cũng là thực phẩm tốt cho sức khoẻ vì nó chứa nhiều chất dinh dưỡng quan trọng như protein và chất béo lành mạnh. Trong các loại cá thì cá biển chứa nhiều dinh dưỡng có lợi, đặc biệt là omega-3. Dưới đây là những loại cá tốt cho sức khoẻ bạn nên bổ sung thường xuyên.\r\n\r\nVì sao bạn nên ăn cá thường xuyên?\r\n\r\nCác chuyên gia dinh dưỡng khuyên chúng ta nên ăn cá ít nhất 2 lần một tuần, nhất là các loại cá giàu axit béo omega-3. Lý do cá là thực phẩm giá trị dinh dưỡng cao. Đó là nguồn protein quý, đủ các các axit amin cần thiết, chứa nhiều vitamin A, D, và chất béo lành mạnh. Thịt của cá thơm ngon, dễ nấu chín, dễ tiêu hóa và dễ hấp thu.\r\n\r\nBáo Sức khoẻ & Đời sống dẫn lời  BS. Trần Thị Bích Nga, chuyên gia dinh dưỡng cho biết, omega-3 là chất dinh dưỡng đặc biệt quan trọng đối với cơ thể và bộ não. Bộ não sử dụng omega-3 để xây dựng tế bào não và tế bào thần kinh, làm giảm các triệu chứng lo lắng, trầm cảm và giảm nguy cơ mắc các vấn đề về trí nhớ do tuổi tác.\r\n\r\nCá cũng là thực phẩm rất tốt đối với hệ tim mạch. Omega-3 trong cá giúp giảm nồng độ triglyceride trong máu và giảm tắc nghẽn mạch máu.\r\n\r\nNghiên cứu cho thấy, những người ăn cá thường xuyên có ít nguy cơ bị đau tim, đột quỵ và tử vong do bệnh tim. Cá cũng là một trong những nguồn cung cấp vitamin D, chất dinh dưỡng quan trọng rất dễ bị thiếu hụt.\r\n\r\nNhững loại cá tốt cho sức khoẻ bạn nên ăn thường xuyên\r\n\r\nDưới đây là những loại cá tốt cho sức khoẻ được các chuyên gia khuyên nên ăn thường xuyên:\r\n\r\nCá hồi\r\n\r\nBáo VnExpress dẫn nguồn trang Healthline cho biết, cá hồi dồi dào Omega 3 nhất. Trong 100g cá hồi có 2,3g Omega 3, tác dụng giảm lượng cholesterol trong cơ thể, duy trì tính linh hoạt của động mạch, tĩnh mạch và tăng cường cơ tim. Omega 3 cũng được cho là có tác dụng giảm huyết áp và ngăn ngừa cứng thành động mạch.\r\n\r\nCác protein trong cá hồi giúp cơ thể dễ tiêu hóa và hấp thụ dinh dưỡng. Cá hồi rất giàu vitamin và khoáng chất thiết yếu như sắt, canxi, phốt pho, selen, vitamin A, D, B. Đây là những dưỡng chất cần thiết cho sự chuyển hóa dinh dưỡng trong cơ thể người.\r\n\r\nCá cơm\r\nCá cơm là loài cá nhỏ, thân mảnh, sống gần các vùng ven biển. Mặc dù có kích thước nhỏ nhưng cá cơm rất giàu dinh dưỡng. Chúng chứa nhiều protein, khoáng chất và vitamin như A và D và là nguồn axit béo omega-3 chuỗi dài rất có lợi cho cơ thể.\r\n\r\nCá ngừ\r\n\r\nCá ngừ là loại cá chỉ di chuyển sâu dưới biển nên thịt mềm, thơm ngon, không bị ô nhiễm môi trường, tốt cho sức khỏe. Thịt cá ngừ có thể ức chế sự gia tăng cholesterol và ngăn ngừa xơ cứng động mạch. Đồng thời, nó tác dụng đặc biệt trong việc ngăn ngừa và điều trị các bệnh về tim mạch và mạch máu não.\r\n\r\nNgoài ra, cá ngừ giàu sắt, vitamin B12, omega-3 giúp cải thiện tình trạng thiếu máu, ngăn ngừa các vấn đề tim mạch ở người cao tuổi.\r\n\r\nCá thu\r\n\r\nBáo Lao động dẫn nguồn trang Aboluowang cho biết, cá thu là loại cá sinh trưởng nhanh và cho năng suất cao. Trong 100 gram thịt cá chứa 166 kcal, 21,4 gram protein và 7,4 gram chất béo, 486 mg kali.\r\n\r\nNgười cao tuổi thường xuyên ăn cá thu sẽ giúp ngăn ngừa các bệnh liên quan đến tim mạch, suy giảm trí nhớ, tiểu đường type 2.\r\n\r\nCá mòi\r\n\r\nCá mòi rất giàu omega-3, EPA và DHA có lợi cho sức khỏe. Những axit béo thiết yếu này giúp máu trong cơ thể lưu thông thuận lợi, duy trì một trái tim khỏe mạnh và ngăn ngừa khả năng mắc bệnh tim mạch. Người cao tuổi ăn cá mòi rất tốt cho tim mạch.\r\n\r\nBên cạnh đó, cá mòi còn chứa lượng lớn vitamin D rất tốt cho sức khỏe xương khớp của người lớn tuổi.\r\n\r\nCá tuyết\r\n\r\nCá tuyết là nguồn axit béo omega-3 và omega-6 tốt. Nó giàu vitamin B12 và B6 cũng như vitamin E, A và C. Đồng thời cung cấp phốt pho, kali, selen và các khoáng chất vi lượng khác cho cơ thể. Loài cá này cũng rất nạc và ít calo, khiến nó trở thành một trong những loại cá tốt nhất để giảm cân.\r\n\r\nCá trích\r\n\r\nCá trích thon dài, ít vảy, nhiều thịt, ít có vị tanh. Theo các chuyên gia, đây là loài cá rất giàu chất dinh dưỡng, còn được gọi là \"cá béo\" bởi dầu trong cá trích chứa nhiều axit béo omega-3 có lợi cho trí óc. Loại cá này thường được hun khói, đóng túi để bảo quản được lâu mà không mất đi giá trị dinh dưỡng.\r\n\r\nCá da trơn\r\n\r\nCá da trơn có thể sống ở cả nước ngọt và nước mặn. Đây là nguồn cung cấp axit béo omega 3 tốt cho não, tim, hệ miễn dịch và mắt. Cá da trơn cung cấp nhiều vitamin B12, giúp cơ thể tạo ra DNA và giữ cho các tế bào máu hoạt động bình thường.\r\n\r\nTrên đây là những loại cá rất tốt cho sức khoẻ. Hãy thường xuyên bổ sung cá vào chế độ ăn uống của mình nhé.\r\n\r\n', '2023-11-10 16:37:33', 13),
(3, 'Top 10 siêu trái cây tốt nhất cho sức khỏe của bạn', 'baiviet-1.png', 'baiviet-1.png', 'Nhiều người rất ít ăn trái cây và rau, dẫn đến thiếu vitamin, khoáng chất...', 'Nếu \"một quả táo mỗi ngày giúp bạn không phải đi bác sĩ\", thì đây là những loại trái cây tốt nhất giúp bạn tránh xa bệnh tật.\r\n\r\nSau đây là 10 loại trái cây tốt nhất:\r\n\r\n1. Lựu\r\nNghiên cứu cho thấy các chất chống oxy hóa mạnh mẽ trong lựu và nước ép có thể giúp đảo ngược tác hại của quá trình oxy hóa đối với hệ thống mạch máu, đóng vai trò chính trong khả năng đạt được và duy trì sự cương cứng.\r\n\r\nCó lẽ đây là lý do tại sao một số nhà thần học tin rằng quả lựu - chứ không phải quả táo - là trái cấm trong Vườn Địa đàng, theo tạp chí Men’s Journal.\r\n\r\n2. Táo\r\nMột quả táo cỡ trung bình chứa 4g chất xơ hòa tan, đạt 17% nhu cầu hằng ngày. Tiến sĩ Elson Haas, tác giả cuốn “Dinh dưỡng để giữ sức khỏe” (Mỹ), cho biết táo rất quan trọng đối với sức khỏe đường ruột và kiểm soát lượng đường trong máu. Nó cũng là nguồn cung cấp vitamin C tăng cường miễn dịch.\r\n\r\nTáo cũng chứa quercetin, có đặc tính kháng histamine và chống dị ứng.\r\n\r\n3. Quả việt quất\r\n\r\nQuả việt quất có hàm lượng calo thấp, trong khi vẫn giàu chất xơ, vitamin C và vitamin K. Đặc biệt, hàm lượng chất chống oxy hóa cao hỗ trợ sức khỏe tim mạch và chức năng não, theo trang web Olive.\r\n\r\n4. Cherry\r\n\r\nTiến sĩ Jonny Bowden, tác giả cuốn sách “150 loại thực phẩm lành mạnh nhất trên trái đất”, cho biết tình trạng viêm nhiễm trong cơ thể là căn nguyên của hầu hết bệnh tật.\r\n\r\nÔng Bowden nói, viêm mạn tính có thể tàn phá hệ thống mạch máu, nhưng rất nhiều người cũng bị viêm cấp tính do chấn thương thể thao. Các nghiên cứu cho thấy cherry có thể giúp giảm đau nhức, nhờ cherry chứa nồng độ anthocyanins 1 và 2 cao nhất, giúp ngăn chặn các enzym dẫn đến chứng viêm.\r\n\r\n5. Quả mâm xôi\r\n\r\nQuả mâm xôi có sức mạnh dinh dưỡng đặc biệt và hàm lượng vitamin K rất cao - chiếm 36% nhu cầu hằng ngày.\r\n\r\nNghiên cứu đã chứng minh quả mâm xôi giúp giảm nguy cơ ung thư tuyến tiền liệt. Nó cũng chứa nhiều mangan khoáng chất, giúp hỗ trợ sản xuất testosterone tối ưu cho nam giới.\r\n\r\nQuả mâm xôi cũng rất giàu chất chống oxy hóa lutein - ngăn ngừa thoái hóa điểm vàng, giúp tăng cường sức khỏe của mắt.\r\n\r\n6. Bưởi\r\nNghiên cứu “Chế độ ăn bưởi” nổi tiếng của Viện Nghiên cứu Scripps (Mỹ) cho thấy ăn nửa quả bưởi trước mỗi bữa ăn giúp giảm trung bình 1,5 kg trong 12 tuần.\r\n\r\nTiến sĩ Bowden cho biết, nhờ bưởi chứa chất ức chế sự thèm ăn tuyệt vời. Nó cũng chứa chất xơ hòa tan pectin có thể làm chậm sự tiến triển của xơ vữa động mạch.\r\n\r\nTuy nhiên, tránh ăn bưởi khi uống thuốc, vì nó tương tác với các enzym gan khiến thuốc lưu lại trong hệ thống lâu hơn, theo trang web Olive.\r\n\r\n7. Chanh\r\n\r\nTiến sĩ Haas luôn thực hiện 10 ngày thanh lọc cơ thể bằng nước chanh mỗi năm. Ông cho biết, axit citric trong chanh giúp phân hủy chất béo và kích thích dịch tiêu hóa. Vắt nửa quả chanh vào ly nước mỗi sáng giúp hỗ trợ chức năng gan và túi mật.\r\n\r\n8. Đu đủ\r\n\r\nEnzyme papain có trong đu đủ, đã được chứng minh là có tác dụng làm giải tỏa đầy hơi do khó tiêu. Một trong số các enzym khác như chymopapain, có tác dụng giảm viêm. Một chén đu đủ chín chứa 144% nhu cầu vitamin C hằng ngày (88 mg).\r\n\r\n9. Quả bơ\r\nBơ là loại trái cây đặc biệt bổ dưỡng, chứa rất nhiều chất béo không bão hòa đơn tốt cho tim mạch. Chỉ nửa quả bơ cung cấp 10% lượng kali hằng ngày và 30% lượng B6 hằng ngày, đồng thời cung cấp vitamin C, E và B5 - rất tốt cho người có mức căng thẳng cao, theo trang web Olive.\r\n\r\n10. Chuối\r\n\r\nChuối có thể mang lại lợi ích cho sức khỏe tim mạch và hệ tiêu hóa, nhờ vào thành phần chất xơ và chất chống oxy hóa. Do hàm lượng carb dễ tiêu hóa, chuối cũng là một món ăn nhẹ tuyệt vời để cung cấp năng lượng trước và sau khi tập luyện.', '2023-11-10 16:39:13', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `MaIMG` int NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `UuTien` tinyint NOT NULL DEFAULT '1' COMMENT 'Quyết định : Ân hay hiện',
  `ViTri` int NOT NULL DEFAULT '1' COMMENT '=1 xuất hiện tại banner, =2 thì các banner tại sesion,...',
  `ViTriItem` tinyint NOT NULL DEFAULT '1' COMMENT '=1 : Xuất hiện nhưng hiện tại khác trang khác và KHÔNG XUẤT HIỆN TẠI TRANG HOME, =0 : là ẩn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`MaIMG`, `HinhAnh`, `UuTien`, `ViTri`, `ViTriItem`) VALUES
(1, 'banner.png', 1, 1, 0),
(2, 'banner2.png', 1, 1, 0),
(3, 'banner3.png', 1, 1, 0),
(4, 'banner-1.jpg', 1, 2, 0),
(5, 'banner-2.jpg', 1, 2, 0),
(6, 'breadcrumb.jpg', 1, 1, 1),
(7, 'breadcrumb.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBL` int NOT NULL,
  `MaSP` int NOT NULL,
  `MaTK` int NOT NULL,
  `NoiDung` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `NgayBL` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`MaBL`, `MaSP`, `MaTK`, `NoiDung`, `NgayBL`) VALUES
(2, 46, 1, 'Củ lang rất bùi ', '2023-12-06 15:13:51'),
(3, 47, 1, 'Bắp rất ngọt', '2023-12-06 15:14:08'),
(4, 36, 1, 'Thịt bán rất chất lượng', '2023-12-06 15:15:29'),
(5, 27, 1, 'Kiwi ngọt ', '2023-12-06 15:16:59'),
(6, 48, 1, 'Rất chua', '2023-12-10 18:00:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaDH` int NOT NULL,
  `MaSP` int NOT NULL,
  `GiaSP` double(10,0) NOT NULL,
  `SoLuong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaDH`, `MaSP`, `GiaSP`, `SoLuong`) VALUES
(92, 50, 59000, 9),
(93, 25, 15000, 18),
(94, 35, 150000, 13),
(95, 36, 139000, 8),
(298, 49, 49000, 2),
(299, 49, 49000, 2),
(300, 48, 49000, 1),
(301, 49, 49000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int NOT NULL,
  `TenDM` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `SoThuTu` int DEFAULT NULL COMMENT 'số thứ tự mà danh mục sẽ xuất hiện , tùy mình sắp xếp',
  `UuTien` tinyint(1) DEFAULT NULL COMMENT '0: là cho nó ẩn đi, 1 là cho nó xuất hiện tại trang chủ',
  `HinhAnh` text COLLATE utf8mb3_unicode_ci,
  `TrangThai` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 là hiện, 1 là ẩn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `TenDM`, `SoThuTu`, `UuTien`, `HinhAnh`, `TrangThai`) VALUES
(11, 'Rau củ quả', 0, 0, 'cat-3.jpg', 0),
(12, 'Trái cây', 0, 0, 'cat-1.jpg', 0),
(13, 'Loại cá', 2, 1, 'cat-6.png', 0),
(14, 'Loại thịt ', 1, 1, 'cat-5.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDH` int NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `SoDienThoai` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `TongTien` int NOT NULL DEFAULT '0',
  `NgayDat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MaTK` int NOT NULL,
  `PhuongThucTT` tinyint(1) NOT NULL COMMENT '1.Trả tiền mặt khi nhận hàng 2. Thanh toán bằng VNPAY 3.Thanh toan vi momo',
  `TrangThai` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0.Đơn hàng mới 1.Đang xử lý 2. xác nhận đơn hàng 3.Đang giao hàng 4.Đã giao 5.Đã hủy 6.Giao hàng thất bại',
  `MaDHRandom` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDH`, `HoTen`, `Email`, `SoDienThoai`, `DiaChi`, `GhiChu`, `TongTien`, `NgayDat`, `MaTK`, `PhuongThucTT`, `TrangThai`, `MaDHRandom`) VALUES
(92, 'Huynh Kha', 'khakha5087@gmail.com', '0353123771', 'Binh Dinh', '', 531000, '2023-11-25 23:55:57', 1, 1, 4, 'Organic726254'),
(93, 'Huynh Kha', 'khakha5087@gmail.com', '0353123771', 'Binh Dinh', '', 270000, '2023-11-25 23:56:36', 1, 1, 4, 'Organic609290'),
(94, 'Huynh Kha', 'khakha5087@gmail.com', '0353123771', 'Binh Dinh', '', 1950000, '2023-11-25 23:57:05', 1, 1, 4, 'Organic902319'),
(95, 'Huynh Kha', 'khakha5087@gmail.com', '0353123771', 'Binh Dinh', '', 1112000, '2023-11-25 23:57:32', 1, 1, 1, 'Organic110298'),
(298, 'Huynh Kha', 'khakha5087@gmail.com', '0353123771', 'Binh Dinh', '', 98000, '2023-12-15 16:36:23', 1, 2, 2, 'Organic920918'),
(299, 'Huynh Kha', 'khakha5087@gmail.com', '0353123771', 'Binh Dinh', '', 98000, '2023-12-15 16:48:22', 1, 3, 0, 'Organic386363'),
(300, 'Huynh Kha', 'khakha5087@gmail.com', '0353123771', 'Binh Dinh', '', 49000, '2023-12-15 16:48:41', 1, 3, 0, 'Organic312305'),
(301, 'Huynh Kha', 'khakha5087@gmail.com', '0353123771', 'Binh Dinh', '', 49000, '2023-12-15 16:49:12', 1, 3, 0, 'Organic878092');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int NOT NULL,
  `TenSP` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `GiaSP` double(10,0) NOT NULL DEFAULT '0' COMMENT 'Tiền Việt không có chữ số thập phân, mặc định là 0(nếu =0 thì hết hàng ví dụ )',
  `HinhAnh` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `TieuDe` text COLLATE utf8mb3_unicode_ci,
  `MoTa` text COLLATE utf8mb3_unicode_ci,
  `MaDM` int DEFAULT NULL,
  `LuotXem` int NOT NULL,
  `GiaGiam` double(10,0) NOT NULL DEFAULT '0',
  `StatusProduct` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Nếu là 1 thì soldout, 0 thì còn hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `GiaSP`, `HinhAnh`, `TieuDe`, `MoTa`, `MaDM`, `LuotXem`, `GiaGiam`, `StatusProduct`) VALUES
(20, 'Ớt đỏ ', 5000, 'ot-do.png', 'Ớt đỏ, tên khoa học Capsicum anuum, là loại gia vị cay quen thuộc, rất nhiều món ăn được cho thêm ớt trong quá trình chế biến. Gần đây rộ lên những thông tin về khả năng chữa bệnh của ớt, đặc biệt khả năng cắt cơn đau thắt ngực (đau tim), trị viêm loét dạ dày và ung thư. ', 'Ớt đỏ, một kho tàng đầy màu sắc và hương vị, là một nguyên liệu quan trọng trong nấu ăn trên khắp thế giới. Vị cay nồng đặc trưng của ớt đỏ là nguồn cảm hứng không ngừng cho đầu bếp sáng tạo. Từ những món ăn truyền thống cho đến những món ăn hiện đại, ớt đỏ không chỉ là một phần quan trọng của các món ăn mà còn là biểu tượng của sự đa dạng và độ phong phú trong ẩm thực. Ngoài ra, đằng sau vẻ ngoại hình hấp dẫn, trái ớt đỏ còn mang đến nhiều lợi ích dinh dưỡng, bổ sung vitamin và khoáng chất. Cho dù sử dụng tươi, ướp chua, hay làm sốt, ớt đỏ không ngừng làm cho bữa ăn trở nên phong phú và đặc sắc.\r\nỚt đỏ là loại gia vị cay quen thuộc của những món ăn nhưng ít ai biết ớt là một gia vị, thuộc nhóm thực phẩm có những chất tác dụng dược lý nên là một thực phẩm chức năng, còn capsaicin là một dược phẩm (thuốc) đúng nghĩa.\r\nNgoài tinh chất ớt capsaicin, thì thành phần dinh dưỡng trong ớt đỏ còn có đến 26 loại chất sinh học khác. Ớt có nhiều các chất khoáng, vi lượng như kẽm, selen, canxi, magiê, nhiều vitamin A, vitamin C và các vitamin nhóm B khác, nhiều hoạt chất sinh học quý như các chất chống oxy hóa (antioxidant), chất chống kết dính tiểu cầu, chất “giống” nitroglycerin có tác dụng giãn động mạch vành... Vì vậy ớt đỏ  có khả năng điệu trị phong phú.\r\n', 11, 4, 0, 0),
(21, 'Trái bơ', 20000, 'traicay-bo.png', 'Bơ là một loại cây cận nhiệt đới có nguồn gốc từ México và Trung Mỹ. Bơ là một loại trái cây giàu chất dinh dưỡng và có nhiều lợi ích cho sức khỏe. Nên sử dụng trái bơ đều đặn để tăng cường sức khỏe và giảm nguy cơ mắc các bệnh liên quan đến tim mạch, tiêu hóa, mắt và sức khỏe tinh thần.', 'Bơ hình như cái bầu nước, dài 7–20 cm, nặng 100g-1 kg. Vỏ mỏng, hơi cứng, màu xanh lục đậm, có khi gần như màu đen. Khi chín, bên trong thịt mềm, màu vàng nhạt, giống như chất bơ, có vị ngọt nhạt. Hột trái bơ hình tựa quả trứng, dài 5 – 6 cm, nằm trong trung tâm, màu nâu đậm, và rất cứng.\nThịt trái bơ thường được dùng làm nguyên liệu cho các món sinh tố giải khát, làm salad, sushi hoặc có thể dùng để ăn với bánh mì bằng cách quết lên bánh và rắc thêm một chút đường. Ngoài ra, bơ cũng được dùng trong việc chăm sóc da, tuy nhiên việc ăn nhiều bơ cũng gây nên bệnh về gan.\nBơ là \"nữ hoàng\" của các siêu thực phẩm. Theo Cơ sở dữ liệu dinh dưỡng quốc gia của Bộ Nông nghiệp Mỹ, chỉ 1 quả bơ chứa 320 calo, 17 gram carbohydrate, gần 15 gram chất xơ và vitamin C, E, K và B6, chỉ 30 gram chất béo và ít hơn 5 gram đường. Bơ cũng là nguồn tuyệt vời của magie, kali, beta-carotene và acid béo omega-3, là tác nhân tuyệt vời trong việc ngăn ngừa và kiểm soát bệnh tim cũng như duy trì tóc, da và móng khỏe mạnh. Tuy bơ có vị béo, nhưng đừng lo lắng. Chất béo không bão hòa đơn là chất béo tốt, không gây béo, mà còn có thể giúp kiềm chế cơn đói. Nghiên cứu của Trung tâm Y sinh học của Anh chỉ ra rằng các bữa ăn với bơ có xu hướng làm tăng cảm giác no lâu hơn so với những bữa ăn không có bơ, từ đó cắt giảm cơn thèm ăn.\n', 12, 7, 15000, 0),
(22, 'Trái cam ', 20000, 'traicay-cam.png', 'Cam là trái lai từ quả chanh và quả bưởi. Bộ gen lục lạp, và do đó là dòng ngoại, là bộ gen của bưởi. Cam có nguồn gốc ở một khu vực bao gồm Nam Trung Quốc, Đông Bắc Ấn Độ và Myanma. Cam là một trong những loại trái cây được sử dụng nhiều nhất trên thế giới. Cam mang đến cho sức khỏe con người công dụng tuyệt vời.', 'Cam là loại quả giàu chất chống oxy hóa và chất phytochemical. Theo các nhà khoa học Anh: “Bình quân trong một trái cam có chứa khoảng 170 mg phytochemicals bao gồm các chất dưỡng da và chống lão hóa”. Chuyên gia dinh dưỡng Monique dos Santos cho biết cam được yêu thích và có lợi cho người khỏe mạnh cũng như các bệnh nhân. Chính vì vậy các công dụng của quả cam có thể kể đến như: giúp giải nhiệt, thỏa mãn cơn khát cho người có cường độ vân động cao, tăng cường hệ tiêu hóa và hệ miễn dịch của cơ thể.\nGiá trị dinh dưỡng trong quả cam bao gồm: Mỗi 100 gr quả cam có chứa 87,6 g nước, 1.104 microgram Carotene – một loại vitamin chống oxy hóa, 30 mg vitamin C, 10,9 g chất tinh bột, 93 mg kali, 26 mg canxi, 9 mg magnesium, 0,3 g chất xơ, 4,5 mg natri, 7 mg Chromium, 20 mg phốt pho, 0, 32 mg sắt và giá trị năng lượng là 48 kcal.\nKhông chứa chất béo hay cholesterol, cam nổi tiếng vì chứa nhiều vitamin C và được chứng minh là loại quả có tác dụng chống viêm, chống khối u, ức chế đông máu và chống oxy hóa mạnh. Trên thực tế, hàm lượng vitamin C chỉ chiếm 15 – 20% tổng số các chất kháng oxy hóa trong trái cây này, trong khi những hợp chất khác có khả năng chống oxy hóa cao gấp 6 lần vitamin C: hesperidin từ flavanoid có nhiều trong lớp vỏ xơ trắng, màng bao múi cam và một ít trong tép, hạt cam, có khả năng giảm cholesterol xấu (LDL) và tăng cholesterol tốt (HDL).\n', 12, 28, 18000, 0),
(23, 'Trái đào', 25000, 'traicay-dao.png', 'Quả Xuân đào Chile có hình dáng giống hình trái tim, vỏ mỏng, căng mịn và không có lông như các loại đào khác. Xuân đào có màu đỏ thẫm xen lẫn sắc hồng rất bắt mắt. Quả Xuân Đào Chile được trồng nhiều ở các vùng phía nam, phía tây của Chile nơi có khí hậu ôn đới, ấm áp tạo điều kiện tốt nhất cho xuân đào phát triển và cho quả đạt chất lượng tuyệt vời.', 'Ở Việt Nam chúng ta thường quen với một loại đào duy nhất và ít ai biết được rằng trái đào còn có một họ hàng khác, tạm gọi là Xuân Đào. Xuân Đào còn gọi với cái tên khác là Du Đào, được trồng nhiều ở các bang phía nam, phía tây của Australia có khí hậu ôn đới. Nơi ấm áp tạo điều kiện tốt nhất cho sự phát triển và cho quả đạt chất lượng tuyệt vời. Đào vào vụ từ tháng mười một đến tháng tư năm sau.\nXuân Đào là giống đào có lớp vỏ trơn láng, không lông tơ. Đào Lông và Xuân Đào được xem là những loại quả khác nhau và người ta thường nhầm rằng Xuân Đào là giống lai tạo giữa Đào Lông và Mận nhưng thực tế thì thuộc về cùng một loài với Đào Lông. Đặc điểm phân biệt bề ngoài giữa chúng nằm ở lớp vỏ. Vỏ Xuân Đào trơn láng và hầu như không có lông. Nhiều nơi trên thế giới, người ta còn gọi là quả đào vỏ mận. Kết quả đột biến gen của đào đem đến cho 2 loại Xuân Đào: thịt đào màu trắng và thịt đào màu vàng.\nMang hình dáng giống hình trái tim, vỏ mỏng căng mịn, không có lông như các loại đào khác. Xuân Đào có màu đỏ thẫm xen lẫn sắc hồng rất bắt mắt. Phần thịt giòn và rất mọng nước vị ngọt thơm đặc trưng. Thừa hưởng mùi thơm đặc trưng của họ nhà đào, Xuân Đào đặc biệt mọng nước khi chín. Lớp vỏ của đào chín đem lại cảm giác giòn và chắc khi cắn. Phần thịt rất mọng nước cộng với lớp vỏ chín tạo lên độ giòn rất đã miệng.\nXuân Đào chứa protein, lipit, gluxit, vitamin B1, B2, vitamin C, cùng một số loại axit hữu cơ, đường gluco. Thịt quả Đào chứa nhiều sắt thúc đẩy việc tạo máu, ngăn ngừa thiếu máu. Có tác dụng nhuận tràng, hoạt huyết, hạ huyết áp. Chữa chứng khó thở, ho ra đờm, tiêu ứ. Chủ yếu dùng điều trị chứng táo bón, ho, khô miệng, khô lưỡi…\n', 12, 5, 20000, 0),
(24, 'Dưa hấu', 10000, 'traicay-duahau.png', 'Dưa hấu (tên khoa học là Citrullus lanatus) là một loài thực vật thuộc họ Cucurbitaceae, một loài thực vật có hoa giống như cây nho có hoa nguồn gốc từ khu vực Tây Phi. Dưa dấu là một loại quả đặc biệt của quả mọng với một vỏ cứng và không có sự phân chia trong quả, thực vật học gọi là pepo.', 'Dưa hấu ruột đỏ loại 1 có vỏ màu xanh đậm và sọc dưa, trái thuôn dài, ruột đỏ, hạt đen, ăn rất ngon, độ đường cao, hương vị thơm ngon, hấp dẫn.\nĐược trồng và chăm sóc theo tiêu chuẩn cao trong một môi trường an toàn và tự nhiên. Thu hoạch và chế biến được tiến hành đúng chuẩn để đảm bảo nguyên liệu tươi ngon. Có vị ngọt tự nhiên, thịt dưa hấu mịn màng, mọng nước và giữ được độ tươi lâu sau khi thu hoạch.\nKhông chỉ là một loại trái cây ngon và bổ dưỡng mà còn mang lại nhiều lợi ích cho sức khỏe. Cung cấp chất chống oxy hóa và chất chống vi khuẩn tự nhiên, giúp tăng cường sức đề kháng và cải thiện sức khỏe toàn diện. Trong dưa hấu có rất ít calo và chứa nhiều nước, thích hợp cho những người muốn giảm cân. Những khoáng chất như kali, magiê giúp insulin trong cơ thể hoạt động đúng chức năng, từ đó làm giảm lượng đường trong máu. Chất arginine có trong dưa hấu cũng được chứng minh giúp cải thiện độ \'nhạy cảm\' của insulin ở bệnh nhân tiểu đường type 2.\n', 12, 9, 0, 0),
(25, 'Dưa lưới', 15000, 'traicay-dualuoi.png', 'Dưa lưới là loại quả thường có hình bầu dục, da quả màu xanh, khi chín thường ngả xanh vàng và có các đường gân trắng đan xen như lưới nên có tên gọi là dưa vân lưới (gọi ngắn là dưa lưới). Dưa lưới có nguồn gốc từ châu Phi và Ấn Độ. Người Ai Cập là người đầu tiên trồng giống cây này, ban đầu dưa lưới nhỏ và ít ngọt, sau thời gian nó không ngừng phát triển cho đến nay trở thành loại trái to và ngọt.', 'Quả dưa lưới có trọng lượng trung bình từ 1.5 kg đến 3.5 kg. Người Ai Cập là người đầu tiên trồng giống cây này, ban đầu dưa lưới nhỏ và ít ngọt, sau thời gian nó không ngừng phát triển cho đến nay trở thành loại trái to và ngọt. Dưa lưới sinh trưởng khỏe, khả năng phân nhánh nhiều và thích nghi tốt với điều kiện nhiệt đới như ở Việt Nam. Thời gian từ khi gieo hạt đến khi thu hoạch tùy theo giống dưa từ 55 -80 ngày.\nDưa lưới hiện nay đang được trồng phổ biến rộng rãi tại nhiều nước trên thế giới như Nhật Bản, Hàn Quốc, Úc, Mỹ, Ý, Thái Lan…Ở Việt Nam dưa lưới mới được trồng một số năm gần đây tại các khu có áp dụng công nghệ cao như TP HCM, Bình Dương, Bình Thuận tuy nhiên chất lượng đặc biệt là độ ngọt vẫn chưa đáp ứng được nhu cầu người dùng. Các giống dưa lưới hiện đang trồng tại Việt Nam là: Taki Nhật Bản, Taka Nhật Bản, Dưa Hoàng Kim, Dưa lưới AB,  Giống Thái….\nDưa lưới chứa nguồn chất dinh dưỡng cao. \n+ Chứa chất có khả năng chống oxy hoá như: beta-carotene, lutein, zeaxanthin, vitamin C và cryptoxanthin \n+ Chứa chất tốt cho tim mạch: chất xơ, kali, vitamin C và chất điện phân \n+ Chứa các chất tốt cho sự phát triển của thai nhi: folate và vitamin nhóm B \n+ Chứa chất giúp cho đôi mắt sáng: chất lutein và zeaxanthin \n+ Chứa 88% nước tốt cho hệ tiêu hoá và chống mất nước. \n+ Chứa chất phytochemical chống viêm tốt\n', 12, 15, 10000, 0),
(26, 'Trái đu đủ', 8000, 'traicay-dudu.png', 'Đu đủ là giống trái cây nhiệt đới ngon, Quả đu đủ không những là loại quả có hương vị thơm ngon mà còn là phương thuốc quý. Đu đủ tại Bách hoá XANH tươi ngon, ngọt, không chỉ thích hợp cho việc ăn trực tiếp bổ sung dinh dưỡng mà còn có thể chế biến thành nhiều món ăn.', 'Trong đu đủ chứa lượng beta-carotene rất cao. Nó giúp chống lại oxy hóa mạnh giúp chống lại một căn bệnh ung thư. Tuy nhiên, cần cung cấp một lượng vừa phải ăn quá nhiều sẽ không tốt, gây ra bệnh vàng da. Lượng vitamin A, C cao sẽ giúp cơ thể cung cấp những chất dinh dưỡng cần thiết. Vitamin B1, B2, các acid gây men và khoáng chất như kali, canxi, magie giúp bồi bổ máu, phục hồi gan. Đu đủ giàu enzyme tự nhiên, dễ dàng thấm sâu làm sáng da, mau lành da khi bị thương. Công dụng tẩy tế bào da chết, hồi phục sự tươi trẻ cho da. Nhiều người lợi dụng các công dụng đó của đu đủ để chế biến thành những loại hỗn hợp chăm sóc da hiệu quả. Đu đủ do Sói Biển cung cấp được trồng theo theo tiêu chuẩn VietGAP cam kết tuân thủ những nguyên tắc, trình tự, thủ  tục hướng dẫn sản xuất, thu hoạch, xử lý sau thu hoạch nhằm đảm bảo an toàn, nâng cao chất lượng sản phẩm, đảm bảo phúc lợi xã hội, sức khỏe người sản xuất và người tiêu dùng. Thông tin chi tiết Thông tin sản phẩm Thương hiệu OEM Xuất xứ Việt Nam Bảo quản Tủ lạnh Thông tin kích thước Sản phẩm liên quan', 12, 2, 0, 0),
(27, 'Trái kiwi', 25000, 'traicay-kiwi.png', 'Kiwi vàng Zespri là loại trái cây cao cấp nhập khẩu New Zealand với phần vỏ nâu vàng, thịt quả vàng tươi đẹp mắt, ăn vào có vị ngọt mát đặc trưng. Kiwi vàng chứa hàm lượng vitamin C cao, giúp tăng cường đề kháng và hỗ trợ làm đẹp hiệu quả.', 'Kiwi là loại trái cây được xếp trong top đầu các loại trái cây có hàm lượng dinh dưỡng cao. Loại trái này có thể cung cấp cho cơ thể rất nhiều loại vitamin, khoáng chất… có trong hơn 27 loại trái cây phổ biến nhất. Kiwi vàng có vỏ màu nâu vàng, trơn nhẵn, không có lông xù xì như kiwi xanh. Thịt quả màu vàng trong rất đẹp mắt, với nhiều hạt đen tạo thành 1 vòng tròn xung quanh trục dọc của quả. Kiwi vàng có vị ngọt mát rất đặc trưng. Ngoài những chất khoáng tương tự như Kiwi xanh, nó còn cung cấp thêm cho cơ thể chất sắt là 4% và 15% vitamin E, 13% axit folate. Kiwi vàng cũng chứa kali, acid folic và chất xơ, giúp bồi dưỡng sức khỏe cho trẻ em và phụ nữ sau khi sinh. Đặc biệt, hàm lượng vitamin C của kiwi vàng đạt 270% giúp cải thiện chức năng của hệ miễn dịch, phòng ngừa những tác động của chứng viêm gan và sự tấn công của virus và vi khuẩn, nâng cao sự miễn dịch. Kiwi vàng sẽ ngăn chặn việc tạo thành chất gelatin (chất keo) hoặc đông cục khi tiêu thụ các loại thực phẩm được chế biến từ sữa nhờ vào thành phần actindin. Kiwi còn tăng hiệu quả giảm cân nhờ chứa ít chất béo, ít calorie và không chứa cholesterol, giúp giảm thiểu nguy cơ bệnh lý ung thư và tim mạch, có lợi cho tiêu hóa, các bệnh hô hấp (nhất là ở trẻ em), kiểm soát huyết áp...  Kiwi vàng rất giàu dinh dưỡng và vitaminE. Do đó, chỉ cần hai quả kiwi là bạn đã có thể cung cấp được 1/3 năng lượng cần cho một ngày. Trong kiwi còn có chất giúp tẩy trắng răng, trị tàn nhang và ức chế quá trình oxy hóa làn da, đào thải các sắc tố đen giúp da sáng trắng, hồng hào và mịn màng. Các bà bầu ăn kiwi khi đang mang thai cũng giúp làn da đẹp hơn. Đặc biệt, Kiwi vàng còn có tác dụng hỗ trợ cho người giảm cân mà không gây ảnh hưởng xấu tới sức khỏe, bảo vệ ADN không bị đột biến, cung cấp hàm lượng chất chống ôxy hóa cho cơ thể', 12, 44, 24000, 0),
(28, 'Trái lê', 5000, 'traicay-le.png', 'K Lê là loại trái cây có thịt bên trong màu trắng, giòn, mọng nước và vị ngọt thanh. Vỏ lê mỏng, thịt ngọt nhẹ, nhiều nước và ít calo, giàu dưỡng chất nên đem lại nhiều lợi ích cho sức khoẻ và làm đẹp. Với vị ngọt tự nhiên, Lê có thể làm nguyên liệu cho món bánh, salad hay các loại nước uống giải khát. Và đặc biệt ăn ngon, ngọt hơn khi ướp lạnh.', 'Bổ sung chất xơ: bạn có thể được bổ sung chất xơ với hàm lượng từ 25-30g nếu dùng hằng ngày và kiểm soát lượng đường trong máu. Phòng ngừa viêm nhiễm: các chất trong lê có tác dụng chống viêm, giảm đau và viêm khớp. Tăng cường hệ miễn dịch: lê có hàm lượng vitamin như B2, B3, B6, C và các khoáng chất như canxi, folate, magie, đồng và mangan; góp phần tăng cường hệ thống miễn dịch của cơ thể. Vitamin C duy trì quá trình trao đổi chất, ngăn đột biến tế bào từ đó bảo vệ ADN cơ thể.\nMột quả lê hoàng kim trung bình nặng khoảng 166g sẽ chứa hàm lượng các chất như sau: Cung cấp carbohydrate dồi dào, giàu chất xơ cùng lượng vitamin C và các khoáng chất quan trọng cho cơ thể như đồng và kali. Ngoài ra lê hoàng kim cũng rất ít calo, hầu như không có chất béo. Trong 100g lê hoàng kim có 60-70 kcal. Tác dụng của lê hoàng kim đối với sức khỏe giống như nhiều loại trái cây và rau quả, lê hoàng kim mang lại lợi ích cho sức khỏe nhờ chất xơ và chất chống oxy hóa. Những hợp chất này có trong lê hoàng kim giúp hỗ trợ hệ thống miễn dịch, giảm viêm và giảm nguy cơ đột quỵ cũng như các bệnh mãn tính bao gồm tiểu đường, huyết áp cao và bệnh tim.\n', 12, 4, 0, 0),
(29, 'Trái mảng cầu', 12000, 'traicay-na.png', 'Chi Na (danh pháp khoa học: Annona) là một chi điển hình của họ Na (Annonaceae). Chi này có khoảng 100-170 loài chủ yếu là các cây hoặc cây bụi tân nhiệt đới có lá đơn, mọc so le và quả ăn được. Trong họ Na, chỉ có chi Guatteria có nhiều loài hơn chi Na. Một số loài na chỉ có ở châu Phi mà không có ở châu Á. Phương ngữ Nam Bộ gọi na là mãng cầu hay mẳng cầu.', 'Mãng cầu là loại cây được trồng phổ biến nhất và được khách hàng biết đến nhiều nhất là Tây Ninh và Vũng Tàu, hiện nay với khí hậu và thỗ nhưỡng phù hợp ãng cầu đã được trồng rộng rãi ở khắp các tỉnh miền tây và đông nam bộ.\nQuả Mãng cầu Na hay còn được gọi là quả Na có 2 loại: Na dai và Na bỡ đối với thị trường miền Nam cũng như Sài Gòn thì Na dai được bán phổ biến và có mặt hầu như ở khắp các quầy hàng kinh doanh trái cây Việt nam.\nĐặc điểm Mãng cầu Na tại Thế giới trái cây: nở gai, trái tròn đều, thịt dai ngọt đậm đà, cành lá xum xuê thích hợp cho việc thắp hương mỗi ngày cũng như gói vào giỏ quà.\nMãng cầu Na là loại trái cây cung cấp khoảng 1/5 lượng Vitamin C hằng ngày theo các nghiên cứu đã được chứng minh, ngoài ra nó còn là carbohydrate, kali, chất xơ, một số vitamin và khoáng chất thiết yếu nhưng lại không có cholesterol và chất béo bão hòa và ít natri.\nĐây là loại trái cây ngon, tốt cho da, tóc, thị lực, não và huyết sắc tố. Trong mãng cầu ta có các phân tử hoạt tính sinh học có đặc tính chống béo phì, chống tiểu đường và chống ', 12, 4, 0, 0),
(30, 'Nho', 18000, 'traicay-nhotim.png', 'Nho đỏ có phần thịt dày mọng nước, vị ngọt xen lẫn chua nhẹ hài hoà, là loại trái cây được nhiều người yêu thích vào những ngày hè. Loại nho đỏ Ninh Thuận  mang lại nhiều lợi ích đối với sức khoẻ, nho ngọt khi có vỏ màu đỏ tím, đậm, chín đều, chắc, mọng.', 'Nho đỏ có hạt: trái to tròn, giòn ngọt và rất nhiều nước và chùm rất to đây cũng là một ưu điểm vượt trội của dòng Peru so với các sản phẩm cùng chủng loại. Vỏ nho mỏng được bao phủ bởi lớp phấn tự nhiên nhờ lớp phấn này mà quả nho có thể đạt độ cứng trái lâu hơn nếu đã mất phấn. \nTại Thế giới trái cây chúng tôi luôn có những mẫu hộp quà giỏ quà dành riêng cho Nho đỏ có hạt để quý khách hàng có thể làm quà hoặc kết giỏ trái cây đi tặng vào các dịp đặc biệt: cỡ hộp vừa (khối lượng 2.5kg) và cỡ hộp lớn (khối lượng 4.5-5kg) cũng như hộp tim bằng gỗ. \nNho đỏ có hạt nói riêng và các loại nho nói chung với vô vàng công dụng dành cho người dùng nhưng một trong số đó có thể kể đến như: chống lão hoá, tốt cho tim mạch, giúp tăng cường thị lực mắt nhất là người già và trẻ nhỏ.\nCách bảo quản và dùng Nho đỏ có hạt Peru ngon nhất: sau khi mua về khách hàng không nên rửa Nho ngay trong trường hợp cần dùng liền có thể rửa sơ còn nếu muốn bảo quản Nho tươi cứng lâu thì cho vào tủ lạnh vì lớp phấn sẽ bảo vệ Nho giữ được độ tươi ở mức tối đa đến khi khách dùng sẽ ngon hơn. - Mua đỏ có hạt ở đâu: Nếu như bạn chưa biết hay còn phân vân về việc chọn một cửa hàng trái cây nhập khẩu để tìm mua Nho đỏ có hạt hay các loại trái cây cao cấp khác của Việt nam thì đến ngay Thế giới trái cây tại trung tâm Quận 1 để chọn cho mình sản phẩm tốt nhất về giá cũng như an tâm về chất lượng xuất xứ nguồn gốc.\n', 12, 22, 15000, 0),
(31, 'Cá Bạc Má', 160000, 'ca-bac-ma.png', 'Cá bạc má hay còn được gọi là cá thu Ấn Độ, là loài thuộc họ cá thu ngừ. Loài cá này thường rất phổ biến ở vùng biển nông có nhiệt độ ấm áp của Ấn Độ Dương và phía Tây của vùng biển Thái Bình Dương như biển đỏ, Đông Phi, Úc, Trung Quốc, miền Đông Đồng Indonesia hay Melanesia và Samoa ở phía Nam', 'Cá bạc má có thân hình thuôn dài và dẹt một chút ở 2 bên giống như hình thoi, có chiều dài khoảng từ 72-280mm. Phần vây của cá không nhiều, nằm cách xa nhau, có 2 vây lưng rời rạc cùng nhiều vây phụ khác. Trong đó, vây ngực đóng vai trò đặc biệt trong việc bơi nhanh, kể cả ở cự ly xa. Đuôi của cá được chẻ làm 2 phần bằng nhau, thân mình óng ánh, màu bạc. Loài cá này có khả năng phản xạ cao dưới ánh trăng ban đêm.\r\nTác dụng của cá bạc má đối với sức khỏe\r\nTăng cường hệ miễn dịch:\r\n-Cá thu rất giàu các khoáng chất và axit béo nên có tác dụng rất tốt trong việc tiêu sưng, phục hồi vết thương, chống sưng viêm,...\r\n-Tốt cho mắt: Cá bạc má có đến 97mg Vitamin A và omega 3 nên rất tốt cho mắt, giúp bạn cho đôi mắt không bị khô, mệt mỏi.\r\n-Tốt cho tim mạch, trí não: Cung cấp lượng lớn axit béo Omega 3 giúp giảm mỡ thừa trong máu, ngăn phần nào chứng đột quỵ.', 13, 1, 0, 0),
(32, 'Cá Hồi', 390000, 'ca-hoi.png', 'Cá hồi là tên gọi chung của các loại cá thuộc họ Salmonidae. Cá hồi thường sống dọc các bờ biển ở phía Bắc Đại Tây Dương và biển Thái Bình Dương.Cá hồi được sinh ra ở vùng nước ngọt, di cư ra biển, sau đó quay về vùng nước ngọt để sinh sản. Tuy nhiên cũng có một số loại cá hồi sống cả đời ở vùng nước ngọt mà không di cư ra biển.', 'Cá hồi có ở rất nhiều nơi trên thế giới. Cá hồi có nguồn gốc từ các quốc gia như: Úc, Chile, Nauy. Trong đó, cá hồi Nauy được nhiều người tin dùng và lựa chọn. Cá hồi Nauy được sống trong môi trường tự nhiên, không phải là loại cá hồi nuôi nên đây là nguồn thực phẩm sạch tốt cho sức khỏe. \r\n\r\nCá hồi được lựa chọn sử dụng chế biến nhiều món ăn cao cấp trên bàn tiệc. Cá hồi rất phổ biến trong các nhà hàng Nhật, nhà hàng Tây. Hiện cá hồi được lựa chọn sử dụng rất nhiều tại nhà hàng Việt Nam và được gia đình chọn làm thực đơn chính. \r\n\r\nThành phần dinh dưỡng trong cá hồi\r\nCá hồi được biết đến là loại cá có vô vàn chất dinh dưỡng tốt cho sức khỏe. Theo nghiên cứu, trong 100gr cá hồi có chứa:\r\n-Omega 3: 8gr\r\n-Protein: 5gr\r\n-DHA, DPA, EPDA: 3.1gr\r\n\r\nBên cạnh đó, trong cá hồi cũng có rất nhiều loại vitamin như: vitamin A, vitamin D, vitamin B12 cùng khoáng chất selen, magie, canxi,.. dồi dào.\r\n\r\n', 13, 4, 0, 0),
(34, 'Cá Sọc Dưa', 690000, 'ca-soc-dua.png', 'Cá ngừ sọc dưa hay còn gọi là Katsuo trong tiếng Nhật Bản là một loài cá biển trong họ Cá thu ngừ có ở vùng biển Ấn Độ-Thái Bình Dương, ở Ấn Độ, Phillippin, Tây Nam Ôxtraylia, Đông châu Phi, Nhật Bản, Hawai và Việt Nam. Đây là một trong những loài cá ngừ có giá trị kinh tế và được đánh bắt nhiều.', 'Điểm dễ nhận biết là cá trà sóc có 5-7 chiếc sọc màu nâu sẫm chạy dọc theo 2 bên thân từ đầu đến đuôi.  Dài có khi đến gần 2m, cân nặng tới 70kg, cá Sọc dưa có thể sống tới 50 năm.\r\n\r\nCá  được tìm thấy ở lưu vực các con sông của Đông Nam Á như: Mê Kông, Ayeyarwady (Myanmar), Chao Phraya, Mae Klong (Thái Lan), Prahang và hạ lưu sông Perak (Malaysia).\r\n\r\nHiện nay , hệ sinh thái của các con sông này thay đổi nhiều do đập thủy điện vây bủa dày đặc. Loài cá  này hiện đang có số lượng cá thể giảm sút mạnh .\r\n\r\nNhiều người ví von Trà Sóc tựa như thịt bò Kobe do trong thịt cá giữa những lớp thịt có lẫn những “dây” mỡ trắng ngần\r\n\r\nVới loại cá có phần thịt ngon được sánh ngang với thịt bò Kobe, chất lượng hảo hạng của con cá. Bạn sẽ khó có thể tìm thấy ở loài cá nào khác có phần thịt ngọt bùi xem lẫn những vân mỡ béo lịm.\r\n\r\nThịt cá dai và béo. Dân sành ăn thường chọn món lẩu chua cá trà sóc. nhúng miếng cá vào cho đến lúc vừa chín tới. Thường thì giòn và dai khó trở nên “cặp đôi hoàn hảo”', 13, 1, 0, 0),
(35, 'Cá Trù', 150000, 'ca-tru.png', 'Cá ngừ chù có thân hình thoi, phần thân hơi phình ra. Dọc thân cá có màu xanh dương đậm, bụng được bao phủ lớp trắng bạc óng ánh. Những con cá ngừ chù trưởng thành có kích thước từ 1kg – 2,5kg.\r\nCá ngừ chù là loại cá khá là quen thuộc mà hầu như các bà mẹ nội trợ đều biết, cũng như thường xuyên xuất hiện trong từng bữa ăn gia đình. Cá ngừ chù có hương vị thơm, chắc thịt và nhiều chất dinh dưỡng, có thể chế biến thành nhiều món ngon khác nhau.', 'Cá ngừ chù được sắm thấy và đánh bắt rộng rãi ở các vùng biển thuộc miền Trung và miền Đông – Tây của khu vực Nam Bộ nước ta.\r\n\r\nchẳng hề nhắc khéo hay khen quá trớn, cá Chù thực sự là 1 cái cá đặc biệt của biển Phú yên ổn khôn xiết nức danh. Và là chiếc cá có chất thơm ngon nhất trong họ cá ngừ.\r\n\r\ncá Chù cất phổ quát khoáng chất như canxi, photpho, kẽm, kali,… cùng các loại vitamin khác. bởi thế, ăn cá Chù sẽ mang lại cho cơ thể bạn phổ biến chất bồi dưỡng.\r\n\r\nỞ Việt Nam nói về cá ngừ chắc hẵn mọi người nghĩ đến nơi khai thác nổi tiếng đó là vùng biển Phú Yên. Cá ngừ chù là loại cá sống theo bầy đàn vì thế vào mùa tháng 4 đến tháng 6 là mùa các ngư dân tỉnh Phú Yên đánh bắt thu hoạch. Là loại cá mang lại giá trị kinh tế cao, vì thế được ngư dân khai thác nhiều ngoài ra cá ngừ chù chuẩn kích thước sẽ được đem đi xuất khẩu.\r\n', 13, 2, 0, 0),
(36, 'Thịt Bò', 139000, 'thit-bo.png', 'Thịt đùi có vị ngon tương tự phần mông bò và thường được cắt thành lát dày như bít-tết để nướng. Đùi bò nhập khẩu đông lạnh được cấp đông từ thịt bò tươi ngon là sản phẩm có xuất xứ rõ ràng nên đảm bảo an toàn thực phẩm và giàu chất dinh dưỡng', 'Ưu điểm khi mua đùi bò nhập khẩu\n\n-Thịt đùi bò nhập khẩu (ở một số nơi gọi là thịt mông ngoài) là phần thịt mông hay đùi sau của bò, ưu điểm của phần thịt này là nhiều nạc, ít mỡ, thịt mềm.\n-Thịt đùi bò đông lạnh với phương pháp làm đông lạnh cấp tốc từ những miếng thịt bò nhập khẩu từ Úc, Argentina, Canada, Nga (tuỳ theo từng lô nhập hàng)... tươi ngon trong thời gian nhanh nhất, điều này giúp các dinh dưỡng thất thoát sẽ ít hơn, chất lượng sẽ được giữ không kém gì so với thịt bò tươi.\n\nGiá trị dinh dưỡng của đùi bò nhập khẩu\n\n-Trong thịt đùi bò chứa nhiều vitamin B2, vitamin B5, vitamin B6, các khoáng chất như sắt, kẽm, đồng,... rất dinh dưỡng.\n-Trong 100g thịt đùi bò có 250 Kcal.\n\nTác dụng của đùi bò đối với sức khỏe\n\n-Tăng cường sức khỏe xương khớp\n-Cung cấp dinh dưỡng cho cơ thể\n-Tăng cường sức đề kháng cho cơ thể\n-Tăng cường hệ miễn dịch\n-Giúp người đau bổ sung dưỡng chất\n-…', 14, 6, 0, 0),
(38, 'Thịt Vịt', 169000, 'thit-vit.png', 'Vịt nguyên con có nguồn gốc rõ ràng, được kiểm dịch thường xuyên và chăm sóc theo quy trình hiện đại, an toàn.\r\n\r\nVịt được làm sạch theo quy trình khép kín và đóng gói bao bì cẩn thận. Người dùng chỉ cần mua về và chế biến món ăn theo ý thích.\r\n\r\nThịt vịt có giá trị dinh dưỡng rất cao. Trong 100g thịt vịt có khoảng 25g chất protein (vượt xa nhiều lần so với thịt bò, heo, dê, cá, trứng).', '-   Vịt nguyên con có giá trị dinh dưỡng rất cao. Trong 100 gam thịt vịt có khoảng 25g chất protein (vượt xa nhiều lần so với thịt bò, heo, dê, cá, trứng). Ngoài ra, hàm lượng các chất dinh dưỡng như canxi, photpho, sắt, vitamin (B1, B2, A, D, E), acide nicotic… rất cao.\r\n\r\n-   Theo Đông Y thì thịt vịt có vị hàn\r\n\r\nĂn thịt vịt có tác dụng tốt trong việc hỗ trợ chữa bệnh tim mạch, hỗ trợ điều trị lao phổi và ung thư (đang xạ trị, hóa trị). Có ích cho người thể chất suy nhược, chán ăn, sốt, phù nề, người thể chất yếu sau khi bệnh, đổ mồ hôi ban đêm, lòng bàn tay bàn chân nóng, phụ nữ kinh nguyệt ít, khí hư bạch đới, sản phụ thiếu sữa.\r\n\r\nThịt vịt thường dai hơn thịt gà, heo, vì thế muốn thịt vịt mềm, hãy thái xéo thớ thịt, thịt sẽ vừa mềm, vừa đẹp mắt. Thịt vịt có mùi hôi khó chịu, nên phải khử mùi trước khi chế biến. Gừng và rượu là hai loại gia vị hữu hiệu để khử mùi vịt. Bóp vịt thật kỹ với gừng giã nhuyễn hoặc xát với rượu rồi rửa sạch là vịt hết mùi hôi. Nếu không có gừng hoặc rượu, có thể thay thế bằng muối và giấm.', 14, 2, 0, 0),
(39, 'Thịt Gà', 169000, 'thit-ga.png', 'Gà ta nguyên con có thịt dai ngon, mềm thơm chất lượng. Thịt gà có thể chế biến thành nhiều món ăn ngon, hấp dẫn cho gia đình và bạn bè thưởng thức. Gà ta được đảm bảo nguồn gốc xuất xứ rõ ràng.', 'Ưu điểm khi mua gà ta nguyên con:\r\n\r\n-Gà ta nguyên con có thịt dai ngon, là loại gà nuôi thả tự nhiên, có thịt thơm, dai, ngọt và bổ dưỡng. Theo nghiên cứu thịt gà có giá trị dinh dưỡng, năng lượng cao hơn thịt đỏ.\r\n-Gà ta được đảm bảo nguồn gốc xuất xứ rõ ràng, được nhập từ nhà cung cấp C.P.\r\nĐặt giao hàng nhanh \r\n\r\nĐôi nét về thương hiệu C.P:\r\n\r\nC.P là thương hiệu lớn, uy tín chuyên cung cấp các sản phẩm chất lượng về thịt gà, thịt heo. C.P được thành lập từ năm 1993 phát triển mạnh đến nay, cung cấp cho nhiều nhà phân phối lớn.\r\n\r\nGiá trị dinh dưỡng của gà ta nguyên con:\r\n\r\n-Thịt gà cung cấp lượng lớn protein, ít chất béo, trong lượng chất béo đó lại chứa hàm lượng omega 3 cao, rất tốt cho sức khỏe. Rất nhiều người ưa chuộng vị dai ngon, thịt ngọt của gà ta vô cùng, do đó thường sử dụng gà ta để làm nguyên liệu cho nhiều món ăn.\r\n-Trong 100g thịt gà có khoảng 239 Kcal.\r\n\r\nTác dụng của gà ta nguyên con đối với sức khỏe:\r\n\r\n-Giúp xương và răng chắc khỏe\r\n-Giúp cơ quan tiêu hóa hoạt động tốt hơn\r\n-Tăng cường quá trình trao đổi chất\r\n-…\r\n', 14, 16, 0, 0),
(40, 'Thịt Heo', 119000, 'thit-heo.png', 'Thịt nạc heo nhập khẩu chứa nhiều protein và ít chất béo là nguyên liệu thông dụng để tạo nên những món ăn ngon cho mọi gia đình. Thịt heo đông lạnh tại Bách hoá XANH được đảm bảo nguồn gốc xuất xứ rõ ràng, đảm bảo an toàn vệ sinh thực phẩm và dễ dàng bảo quản.', 'Thịt nạc đùi heo hữu cơ là thực phẩm có chứa nhiều protein, lipit và các khoáng chất cần thiết cho cơ thể. Ngoài ra, trong thịt nạc đùi còn cung cấp một lượng axit amin cần thiết giúp tái tạo cơ bắp và tăng cường hệ miễn dịch.  Thịt nạc đùi heo hữu cơ phổ biến trong bữa cơm gia đình Việt, đặc biệt tốt cho bà bầu. Thịt nạc đùi heo có thể được chế biến thành nhiều món khác nhau như nấu canh, quay, nướng... mang đến cho gia đình bạn những món ăn ngon, bổ dưỡng.  Thịt Heo Hữu Cơ tại  Organicfood là thịt heo đầu tiên và duy nhất tại Việt Nam đáp ứng các tiêu chuẩn khắt khe của Hiệp hội hữu cơ Canada, bởi quy trình chăn nuôi khép kín từ thức ăn, chăn nuôi chọn lọc, đến giết mổ và vận chuyển. Thịt Heo Hữu Cơ không sử dụng chất tạo nạc, không chất kháng sinh, không chất bảo quản và không kim loại nặng.', 14, 3, 0, 1),
(41, 'Cà Chua', 22000, 'ca-chua.png', 'Cà chua trái cây Nova có trái hơi thuôn dài, nhỏ nhắn, màu vàng cam, trông rất ngon mắt. Cà dùng ăn sống trực tiếp vì có độ thơm, ngọt (độ brix là 12) giòn rất đặc trưng và là một trong số những loại cà rất tốt cho sức khỏe. Cà chua trái cây Nova với hàm lượng dinh dưỡng cao rất tốt cho sức khỏe người dùng, chứa nhiều dưỡng chất Lycopene giúp chống oxy hóa, làm đẹp da, chống lão hóa, hàm lượng vitamin C cao giúp tăng cường sức đề kháng cho cơ thể.', 'Cà chua trái cây Nova có trái hơi thuôn dài, nhỏ nhắn, màu vàng cam, trông rất ngon mắt. Cà dùng ăn sống trực tiếp vì có độ thơm, ngọt (độ brix là 12) giòn rất đặc trưng và là một trong số những loại cà rất tốt cho sức khỏe. Cà chua trái cây Nova với hàm lượng dinh dưỡng cao rất tốt cho sức khỏe người dùng, chứa nhiều dưỡng chất Lycopene giúp chống oxy hóa, làm đẹp da, chống lão hóa, hàm lượng vitamin C cao giúp tăng cường sức đề kháng cho cơ thể.\r\n\r\nLà món ăn dặm siêu chất cho các bé và một loại trái cây được chị em phụ nữ yêu thích trong lĩnh vực làm đẹp.\r\n\r\nKhông nên để cà ở bên ngoài, trái cà nhanh bị héo nhưng để tủ lạnh lâu thì cũng dễ bị héo và nhăn nheo.', 11, 6, 0, 0),
(42, 'Cà Rốt', 35000, 'ca-rot.png', 'Cà rốt là một loại củ rất quen thuộc trong các món ăn của người Việt. Cà rốt có hàm lượng chất dinh dưỡng và vitamin A cao, được xem là nguyên liệu cần thiết cho các món ăn dặm của trẻ nhỏ, giúp trẻ sáng mắt và cung cấp nguồn chất xơ dồi dào.', 'Giá trị dinh dưỡng của cà rốt\r\n\r\n-Trong cà rốt chứa nhiều chất xơ, đặc biệt là vitamin A, vitamin K, vitamin C,... ngoài ra còn chứa những khoáng chất tốt cho cơ thể như canxi, sắt, kali,...\r\n-Trong 100g cà rốt có 41.3 kcal.\r\n\r\nTác dụng của cà rốt đối với sức khỏe\r\n\r\n-Cải thiện sức khỏe mắt\r\n-Giảm nguy cơ ung thư\r\n-Giảm cholesterol trong máu\r\n-Hỗ trợ giảm cân\r\n-…\r\n\r\nCác món ăn ngon từ cà rốt\r\nCà rốt có thể chế biến thành nước ép cà rốt cam và củ dền, nước ép cà rốt và cà chua, sinh tố cà rốt. Ngoài ra, cà rốt cũng có thể làm cà rốt, củ cải chua ăn kèm với thịt nguội, chả lụa cho các bữa tiệc. Một số món ăn từ cà rốt như sau:\r\n\r\n-Các loại cháo bổ dưỡng cho trẻ như cháo tim heo cà rốt, cháo lươn cà rốt, cháo thịt bò cà rốt,...\r\n-Cà rốt dùng cho các món nộm gỏi như nộm su hào cà rốt hoặc làm ra món kim chi cải thảo truyền thống của Hàn Quốc,...\r\n-Cà rốt xào với mì, nui,... cùng với các nguyên liệu thịt heo, thịt bò, trứng,...\r\nĐặc biệt, cà rốt còn được xem là món ăn vặt an toàn khi được chế biến thành mứt cà rốt, thích hợp cho việc nhâm nhi của cả gia đình.\r\n\r\nCách bảo quản cà rốt tươi ngon\r\nCác bước bảo quản cà rốt để giữ được độ tươi, giòn nhất định\r\n\r\n-Cắt bỏ phần ngọn củ cà rốt, sau đó bọc củ cà rốt trong màng xốp hơi (bọc bong bóng) rồi cho vào ngăn mát tủ lạnh trong khoảng 2 tuần.\r\n-Khi bảo quản lưu ý không rửa qua nước và cắt nhỏ cà rốt trước khi bỏ vào tủ lạnh.\r\n-Bảo quản cà rốt ở nơi thoáng mát, tránh ánh nắng mặt trời có thể giữ trong 3 tuần.', 11, 19, 0, 0),
(43, 'Cải Thìa', 35000, 'cai-thia.png', 'Cải thìa hay Cải bẹ trắng, Cải muổng, Cải trắng, bạch giới, hồ giới, .... Cải thìa không chỉ là loại rau quen thuộc để chế biến nên những món ăn ngon mà còn chứa nhiều thành phần dinh dưỡng có lợi cho sức khỏe. ', 'Cải thìa hay Cải bẹ trắng, Cải muổng, Cải trắng, bạch giới, hồ giới, .... Cải thìa không chỉ là loại rau quen thuộc để chế biến nên những món ăn ngon mà còn chứa nhiều thành phần dinh dưỡng có lợi cho sức khỏe. Trong thành phần cấu tạo chất thì cải thìa ít năng lượng (20 cal/30 gr), giàu acid folic, kali, potassium, calcium, vitamin C, vitamin A, và đặc biệt là chứa nhiều glucosinolat.\r\n\r\nTrong đông y Cải thìa có vị ngọt, tính mát, không độc, hạt vị cay, tính ấm là thực phẩm dưỡng sinh, ăn vào có thể lợi trường vị, thanh nhiệt, lợi tiểu tiện và ngừa bệnh ngoài da. Cải thìa có tác dụng chống scorbut, tạng khớp và làm tan sưng. Hạt Cải thìa kích thích, làm dễ tiêu, nhuận tràng.\r\n\r\nVới hàm lượng dinh dưỡng lành mạnh như trên, cải thìa không chỉ ngon mà còn rất có lợi cho sức khỏe.\r\n\r\nLàm thuốc thanh nhiệt: Người bị bệnh nội nhiệt nặng thiếu tân dịch, môi khô ráo hay lưỡi sinh cam, chân răng sưng thũng, kẽ răng chảy máu, họng khô cứng; thường gọi là bệnh tân dịch không đủ, nội hoả bốc lên; mà nguyên nhân là do thiếu vitamin C. Có thể dùng Cải thìa làm nguồn cung cấp vitamin C sẽ giúp điều trị bệnh này. Nấu canh rau Cải thìa ăn sẽ có tác dụng thanh hoả rất tốt.\r\n\r\n Nước ép Cải thìa có lợi cho trẻ em trị nội nhiệt: Trẻ em bú sữa bò thường có bệnh nội nhiệt, cũng là thiếu vitamin C. Như khoé mắt có nhử dính, ghèn mắt dính chặt, mi mắt hoặc môi khô hồng, luôn luôn chúm môi lại, thở, ngủ không được, khóc cả đêm. Chỉ cần lấy Cải thìa dầm nát, cho nước sôi để nguội vào lọc lấy nước, sau nấu sôi lên đợi âm ấm, đút cho uống hoặc đổ vào bình sữa cho trẻ em mút. Sau 1 tuần, hiện tượng nội nhiệt mất dần.\r\n\r\nTrị bệnh hoại huyết: Dùng Cải thìa tươi hoặc khô nấu ăn như rau tươi để đảm bảo dinh dưỡng bình thường và phòng chống bệnh hoại huyết, nhất và đối với người đi các tàu viễn dương xa đất liền nhiều ngày. Người ta biết được điều này từ cách đây 700 năm.', 11, 4, 0, 0),
(44, 'Đậu Hà Lan', 59000, 'dau-ha-lan.png', 'Đậu hà lan là loại hạt đậu tròn thuộc chi đậu hà lan, được dùng như một loại rau ăn, thực phẩm giàu dinh dưỡng. Do trong đậu hà lan có chứa hàm lượng chất xơ và các khoáng chất cao, các dưỡng chất thiết yếu giúp tăng cường sức khỏe, bổ sung năng lượng, ngăn ngừa ung thư dạ dày, cải thiện sức khỏe tim mạch.', 'Đậu Hà Lan non là loại đậu hạt tròn thuộc chi đậu Hà Lan là một loại thực phẩm khá phổ biến ở Châu Âu. Bên cạnh việc lấy hạt thì trái đậu khi đậu còn non còn được sử dụng như một loại rau xanh. Đậu Hà Lan thường cho năng suất cao ở vùng có khí hậu ôn đới. Trái đậu non có màu xanh, hơi dẹp và dài khoảng bằng một ngón tay.\r\n\r\nCũng giống như những loại đậu thông thường của Việt Nam, đậu Hà Lan cũng rất giàu dinh dưỡng và có khả năng hỗ trợ ngăn chặn các căn bệnh nguy hiểm. Đậu Hà Lan rất giàu tinh bột, chất xơ, protein và nhiều loại vitamin cần thiết cho cho con người. Hơn nữa đây còn là món ăn dặm vô cùng bổ dưỡng cho trẻ. Trung bình cứ 100 gram đậu hà lan có chứa những chất dinh dưỡng như sau:\r\n\r\n+ Năng lượng: 81kcal\r\n+ Carbohydrate: 14.3gr\r\n+ Chất đạm: 5.2gr\r\n+ Chất béo: 0.3gr\r\n+ Vitamin A: 42% DV\r\n+ Vitamin C: 17% DV\r\n+ Vitamin K: 30% DV\r\n+ Nhiều chất khoáng: Canxi, 22mg Magie, Phốt Pho, Natri…\r\n\r\nCác món ngon từ đậu Hà Lan non\r\nĐậu Hà Lan non sau khi mua về chỉ chần rửa sạch và loại bỏ xơ đậu là có thể sử dụng được ngay. Một vài món ăn bổ dưỡng gợi ý cho mâm cơm gia đình bạn:\r\n\r\n+ Đậu Hà Lan non xào thịt bò\r\n+ Luộc hoặc hấp đều rất ngọt\r\n+ Làm nguyên liệu nấu canh nữa nhé', 11, 28, 0, 0),
(45, 'Khoai Lang Tím', 23000, 'khoai-lang-tim.png', 'Khoai lang tím còn có tên gọi khác là khoai lang Pêru vì nó có nguồn gốc từ Nam Mỹ, tên khoa học là Solanum andigenum.\r\n\r\nKhoai lang tím thuộc loài thân thảo dạng dây leo sống lâu năm, có lá mọc so le hình trái tim hay xẻ thùy chân vịt.\r\n\r\nCủ hình thuôn dài, lớp vỏ nhẵn nhụi có màu tím (cũng có màu khác là đen, nâu, trắng hay vàng) và có tới hàng trăm loài khác nhau. Tùy theo giống khoai mà củ của nó có kích thước, độ ngọt và mùi thơm khác nhau.\r\n', 'Khoai lang tím (tên khoa học là Ipomoea batatas L., thuộc họ Convolvulaceae), là một loại củ rất quen thuộc, được nhiều người ưa thích có nhiều lợi ích đối với sức khỏe và chữa bệnh. Khoai lang tím có nguồn gốc từ Nam Mỹ và hiện đang có mặt phổ biến ở rất nhiều nơi trên thế giới, trong đó có Việt Nam. Đây là loại cây dễ trồng, năng suất cao, có đặc điểm là củ dáng dài, vỏ nhẵn, phần ruột bên trong có màu tím đặc trưng dễ nhận biết.\r\n\r\nVề giá trị dinh dưỡng, khoai lang tím có chứa nhiều chất dinh dưỡng cần thiết và tốt cho cơ thể. Khoai lang được xem như nguồn cung cấp calo chủ yếu (175 calo/100g). Thành phần dinh dưỡng chính của khoai lang là đường (3,63-6,77%) và tinh bột (18-20%), ngoài ra còn có các thành phần khác như: protein, các vitamin (vitamin C, tiền vitamin A, B1, B2, B6…), các chất khoáng (K, Ca, Mg, P, Fe…) góp phần quan trọng trong dinh dưỡng của con người.\r\n\r\nBên cạnh đó khoai lang tím còn chứa anthocyanin, một hợp chất thuộc nhóm flavonoid. Anthocyanin là chất màu tự nhiên có nhiều tính chất, tác dụng quý báu, được sử dụng ngày càng rộng rãi trong công nghiệp thực phẩm cũng như trong y học. Những nghiên cứu gần đây cho thấy trong khoai lang tím có chứa nhiều chất chống oxy hóa (bao gồm các hợp chất phenol, anthocyanin, carotenoid) ngăn chặn sự phát triển của tế bào ung thư, chống lão hóa và làm sạch các chất bẩn trong mạch máu. Vì vậy ở Nhật, khoai lang tím được sử dụng để làm nước ép, loại nước uống của thực phẩm chức năng. Ngoài ra, khoai lang tím còn có tác dụng làm giảm huyết áp, giảm cân, rất tốt cho hệ tiêu hóa, chống lão hóa, kháng viêm, ngừa mụn nhọt và chống vàng da rất hiệu quả. Hơn thế nữa, qua quá trình xử lý, chế biến các enzym oxy hóa bị vô hoạt làm tăng hàm lượng anthocyanin; tăng màu sắc, tăng giá trị dinh dưỡng và cảm quan cho sản phẩm.', 11, 23, 0, 0),
(46, 'Khoai Lang Vàng', 20000, 'khoai-lang-vang.png', 'Khoai lang là một loài cây nông nghiệp với các rễ củ lớn, chứa nhiều tinh bột, có vị ngọt, được gọi là củ khoai lang và nó là một nguồn cung cấp rau ăn củ quan trọng, được sử dụng trong vai trò của cả rau lẫn lương thực. Các lá non và thân non cũng được sử dụng như một loại rau. Khoai lang có quan hệ họ hàng xa với khoai tây (Solanum tuberosum) có nguồn gốc Nam Mỹ và quan hệ họ hàng rất xa với khoai mỡ (một số loài trong chi Dioscorea) là các loài có nguồn gốc từ châu Phi và châu Á.', 'Khoai lang có nguồn gốc từ khu vực nhiệt đới châu Mỹ, nó được con người trồng cách đây trên 5.000 năm Lưu trữ 2006-02-12 tại Wayback Machine Lưu trữ 2005-02-07 tại Wayback Machine. Nó được phổ biến rất sớm trong khu vực này, bao gồm cả khu vực Caribe. Nó cũng đã được biết tới ở Polynesia trước khi có sự thám hiểm của người phương tây. Nó được đưa tới đây như thế nào là điều khó hiểu vì vùng này cách rất xa châu Mỹ. Đây là chủ đề của các cuộc tranh luận dữ dội, có sự tham gia của các chứng cứ từ khảo cổ học, ngôn ngữ học và di truyền học.\r\n\r\nNgày nay, khoai lang được trồng rộng khắp trong các khu vực nhiệt đới và ôn đới ấm với lượng nước đủ để hỗ trợ sự phát triển của nó.\r\n\r\nTheo số liệu thống kê của FAO năm 2004, thì sản lượng toàn thế giới là 127 triệu tấn, trong đó phần lớn tại Trung Quốc với sản lượng khoảng 105 triệu tấn và diện tích trồng là 49.000 km². Khoảng một nửa sản lượng của Trung Quốc được dùng làm thức ăn cho gia súc và gia cầm Lưu trữ 2005-02-07 tại Wayback Machine.\r\n\r\nSản lượng trên đầu người là lớn nhất tại các quốc gia mà khoai lang là mặt hàng lương thực chính trong khẩu phần ăn, đứng đầu là quần đảo Solomon với 160 kg/người/năm và Burundi với 130 kg.\r\n\r\nBắc Carolina, tiểu bang đứng đầu Hoa Kỳ về sản xuất khoai lang, hiện nay cung cấp 40% sản lượng khoai lang hàng năm của quốc gia này.', 11, 16, 0, 0),
(47, 'Ngô', 15500, 'ngo.png', 'Ngô, bắp hay bẹ (danh pháp hai phần: Zea mays L. ssp. mays), là một loại cây lương thực được thuần canh tại khu vực Trung Mỹ và sau đó lan tỏa ra khắp châu Mỹ. Ngô lan tỏa ra phần còn lại của thế giới sau khi có tiếp xúc của người châu Âu với châu Mỹ vào cuối thế kỷ 15, đầu thế kỷ 16. Ngô là cây lương thực được gieo trồng nhiều nhất tại châu Mỹ.', '- Xuất Xứ: Việt Nam\r\n- Màu sắc: Vỏ xanh trong màu vàng\r\n- Ngô ngọt (hay ngô đường, bắp ngọt, bắp đường) là giống ngô có hàm lượng đường cao, hương vị dân dã, quen thuộc với nhiều người.\r\n- Ngô ngọt là kết quả xuất hiện tự nhiên của đặc tính lặn của gen điều khiển việc chuyển đường thành tinh bột bên trong nội nhũ của hạt ngô. Trong khi các giống ngô thông thường được thu hoạch khi hạt đã chín thì ngô ngọt thường được thu hoạch khi bắp chưa chín (ở giai đoạn \"sữa\"), và thường dùng như một loại rau hơn là ngũ cốc. Đây là thực phẩm giàu năng lượng, chứa nhiều chất dinh dưỡng và vitamin, giúp tăng cường sức khỏe cho mắt, tăng cường trí nhớ, tăng cường hệ thống miễn dịch...\r\n+ Giàu calo Nếu trẻ bị suy dinh dưỡng hoặc bạn đang cần tăng cân gấp, hãy đưa ngô ngọt vào chế độ ăn uống thường ngày ngô ngọt cũng cung cấp nguồn năng lượng dồi dào cho sức khỏe\r\n+ Phòng ngừa bệnh trĩ và ung thư là loại thực phẩm giàu chất xơ, vì vậy nó rất có lợi cho tiêu hóa\r\n+ Nguồn vitamin dồi dào , giàu khoáng chất\r\n+ Chất chống oxi hóa ,bảo vệ tim\r\n+ Cải thiện tình trạng thiếu máu,Giảm mức cholesterol\r\n+ Giảm đau khớp, xương\r\n+ Tác dụng tốt cho bệnh nhân Alzheimer', 11, 14, 0, 0),
(48, 'Ớt Chuông Đỏ', 49000, 'ot-chuong-do.png', 'Ớt chuông Đà Lạt hay còn gọi là Ớt tây có kích thước to với nhiều màu sắc khác nhau: xanh, vàng, đỏ... Ớt chuông không có vị cay gắt như các loại ớt thông thường khác mà có vị giòn nên thích hợp cho các món xào, ăn sống.', 'Ớt chuông giàu dinh dưỡng mà không phải loại rau xanh nào cũng có được. Chứa nhiều vitamin C cần thiết cho cơ thể. Trong 100gr ớt có chứa 120mg vitamin C và chỉ cần 50gr ớt chuông đã cung cấp 75% lượng vitamin C có thể cần cho cả ngày.\r\n\r\nNgoài vitamin C, ớt chuông rất giàu vitamin A, 100gr ớt chuông cung cấp từ 15-50% lượng vitamin A cần thiết trong ngày. Chứa ít calo. Cải thiện cơ bắp nhờ chứa nhiều vitamin B.\r\n\r\nỚt chuông có lượng vitamin C nhiều nhất giúp tăng cường sức đề kháng và chống việc xuất hiện các nếp nhăn. Chứa nhiều beta carotein giúp chống lại sự tấn công của các gốc tự do, ngăn ngừa quá trình lão hóa da. Như vậy, ớt chuông không phải là một loại gia vị như ớt ta mà ớt chuông là một loại rau xanh rất có lợi cho sức khỏe của chúng ta.', 11, 55, 0, 0),
(49, 'Súp Lơ Trắng', 49000, 'sup-lo-trang.png', 'Bông cải trắng hay còn gọi là súp lơ, hay su lơ, bắp su lơ, hoa lơ, cải hoa hay cải bông trắng là một loại cải ăn được, thuộc loài Brassica oleracea, họ Cải, mọc quanh năm, gieo giống bằng hạt. Phần sử dụng làm thực phẩm của súp lơ là toàn bộ phần hoa chưa nở, phần này rất mềm, xốp nên không chịu được mưa nắng.', 'Đặc điểm chung:\r\n\r\n-Bông cải trắng hay còn gọi là súp lơ, hay su lơ, bắp su lơ, hoa lơ , cải hoa hay cải bông trắng , mọc quanh năm, trọng lượng hoa phần sử dụng làm thực phẩm từ 1– 2 kg ăn rất ngon.\r\n\r\n-Súp lơ trắng Sản phẩm được sản xuất trực tiếp tại nông trại ở Đà Lạt, do Nông nghiệp THT thương mại đảm bảo tươi sạch, an toàn và chất lượng, Đảm bảo sản phẩm đến tay khách hàng luôn tươi ngon, An toan và tiện lợi.\r\n\r\nThành phần chính của Súp lơ trắng:\r\n\r\nSúp lơ trắng có nhiều vitamin C, vitamin K, canxi, axit folic, kali và chất xơ. Súp lơ trắng cũng có chứa các chất dinh dưỡng thực vật có các đặc tính tăng cường miễn dịch.\r\n\r\nLợi ích của Súp lơ trắng:\r\n\r\n-Súp lơ có tác dụng kháng lại các tế bào ung thư\r\n-Giảm cholesterol trong máu\r\n-Thanh lọc cơ thể\r\n-Tác dụng tích cực với hệ xương\r\n-Tốt cho mắt….\r\n\r\nMón ngon từ Súp lơ trắng:\r\n\r\n-Súp lơ xào thịt bò\r\n-Thịt gà xào súp lơ\r\n-Súp lơ trắng xào thịt heo cháy cạnh.\r\n-Canh súp lơ trắng cùng tôm thịt.\r\n-Canh đậu phụ nấu súp lơ\r\n-Canh sườn súp lơ\r\n-Salad khoai tây súp lơ', 11, 97, 0, 0),
(50, 'Súp Lơ Xanh', 59000, 'sup-lo-xanh.png', 'Bông cải xanh (hoặc súp lơ xanh, cải bông xanh, Broccoli) là một loại cây thuộc loài Cải bắp dại, có hoa lớn ở đầu, thường được dùng như rau. Bông cải xanh thường được chế biến bằng cách luộc hoặc hấp, nhưng cũng có thể được ăn sống như là rau sống trong những đĩa đồ nguội khai vị.', '• Bông cải xanh hoặc súp lơ xanh, là một loại cây thuộc họ cải, có hoa lớn ở đầu, thường được dùng như rau. Bông cải xanh thường được chế biến bằng cách luộc hoặc hấp, nhưng cũng có thể được ăn sống như là rau sống trong những đĩa đồ nguội khai vị. CÁCH SỬ DỤNG • Có rất nhiều món ăn được chế biến từ bông cải xanh chẳng hạn như pasta với bông cải xanh, súp bông cải xanh, bông cải xanh xào tôm... • Ta có bông cải xanh trộn dầu hàu, một món ăn giàu đạm và rất ngon hay gà xào bông cải xanh món ăn âm dương kết hợp hài hòa .... • Ngoài ra bông cải xanh được dùng để làm các món salad, xào thịt, xào hải sản, giúp món ăn hạ bớt lượng nhiệt từ dầu mỡ, thịt, đảm bảo hài hòa, cân bằng cho bữa ăn...   CÁCH BẢO QUẢN • Không nên để bông cải xanh chung với các loại trái cây vì đây là loại rau rất nhạy cảm với khí ethylen sinh ra từ một số loại trái cây.', 11, 19, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `UserName` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Biệt danh',
  `Email` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: là nam, 1: là nữ',
  `SoDienThoai` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Quyen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: là user, 1: là admin',
  `NgayTao` datetime DEFAULT CURRENT_TIMESTAMP,
  `HinhAnh` text COLLATE utf8mb3_unicode_ci,
  `HoatDong` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 là đang hoạt động, 1 là vô hiệu hóa tài khoản\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `HoTen`, `UserName`, `Email`, `MatKhau`, `DiaChi`, `GioiTinh`, `SoDienThoai`, `Quyen`, `NgayTao`, `HinhAnh`, `HoatDong`) VALUES
(1, 'Huynh Kha', 'WE18325_HOTB', 'khakha5087@gmail.com', '123', 'Binh Dinh', 0, '0353123771', 0, '2023-11-09 23:34:11', '', 0),
(23, 'Admin', 'Quản trị viên', 'admin17@gmail.com', '12345', '', 0, '', 1, '2023-12-06 17:17:59', 'ava_user.jpeg', 0),
(24, 'nickao', 'alo', 'nickao1234@gmail.com', '111', 'Thiện Chánh 2, Tam Quan Bắc, Hoài Nhơn - Bình Định', 1, '12356321', 0, '2023-12-07 02:24:33', 'ava_user.jpeg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeuthich`
--

CREATE TABLE `yeuthich` (
  `MaYT` int NOT NULL,
  `MaSP` int NOT NULL,
  `MaTK` int NOT NULL,
  `YeuThich` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`MaBV`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`MaIMG`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBL`),
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaDH`,`MaSP`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `MaTK` (`MaTK`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Chỉ mục cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD PRIMARY KEY (`MaYT`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `MaBV` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `MaIMG` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDH` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `yeuthich`
--
ALTER TABLE `yeuthich`
  MODIFY `MaYT` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaTK`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danhmuc` (`MaDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
