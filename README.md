# Tạo map BĐS

Web hiển thị google map cho các điểm dữ liệu, gồm miêu tả về bất động sản, tọa độ trên bản đồ, hình thức.

Sẽ cập nhật thêm giá bất động sản, chỉnh sửa lại hình thức và những thông tin liên quan.

## 

Dữ liệu các điểm trên bản đồ được gọi API xử lí ngôn ngữ tự nhiên để trả về một file JSON. Những data để gọi API được crawl tự động từ trang mogi.vn

## Tạo tập Data JSON cho các điểm trên map

Vì nếu chỉ xem content ("c:" trong file JSON), thì sẽ khó để biết data này có trả về lat, long được và chính xác hay không. Nên trước tiên, chạy đoạn script trong file ```addr_Types.js``` để in ra tổng hợp các type về address của tất cả data, rồi chọn lọc xem data nào có khả năng trả về lat, long chính xác. Gọi tập các data đó là S.

Chạy ```c.js``` để in ra toàn bộ content của file JSON và copy vào Google Sheet 1 cột ```A```.

Dựa vào số thứ tự của data trong tập S. xóa bớt các row trong Google Sheet 1.

Chạy ```makeLatLng.js``` để in ra lat, long và thêm vào các cột ```B``` và ```C```

Kiểm tra xem cột ```B``` và cột ```C``` có số lượng đủ bằng cột ```A``` chưa. Nếu có thì tất cả dữ liệu dự đoán trong tập S đều đã trả về lat, long.

Ở cột ```D1``` nhập:

```
="{""contentdata"":"""&A1&""", ""lat"":"&B1&", ""lng"":"&C1&"},"
```

Và kéo hết tập dữ liệu trong Sheet.

Tạo 1 file JSON chứa dữ liệu trong cột ```D```. Đó là file JSON data kết quả.

## Code HTML

```
index.php
```

Cần dùng 2 file JSON. 
1. ```mapstyle.json``` : Để xóa nhiễu và makeup map
2. ```dataMogi_98.json``` : File JSON bạn lấy được ở bước tạo data JSON ở trên.

