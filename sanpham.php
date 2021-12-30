<?php
    require("./dbconfig.php");
    session_start();
    require_once("./ktradangnhap.php");
    
?>

<?php  
		$data = file_get_contents('http://localhost/testAPIWP/sampham_xuly.php');
		$data = json_decode($data, true);
	?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/khachhang.css">
    
</head>
<body>
    <!-- link1 https://previewcode.net/code/do-an-bai-tap-lon-xay-dung-website-ban-laptop-bang-php-mysql-pro -->
    <!-- link2 https://sharecode.vn/source-code/web-ban-may-tinh-full-code-php-bs4-adminweb-giao-dien-dep-19145.htm -->
    <div class="container-fluid">
        <div class="row header">
            <div class="col-xl-2 header-left">
                <p>Admin Laptop NQC</p>
            </div>
            <div class="col-xl-10 header-right">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <p><i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 20px;padding-right: 10px;"></i>Nguyễn Quang Cường</p>
            </div>
        </div>
        
    </div>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-xl-2 nav">
                <ul>
                <li><a href="./index.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                    
                    <li><a href="./sanpham.php"><i class="fa fa-database" aria-hidden="true"></i>Sản phẩm</a></li>
                   
                    <li><a href="./donhang.php"><i class="fa fa-book" aria-hidden="true"></i>Đơn hàng</a></li>
                    <li><a href="./admin.php"><i class="fa fa-users" aria-hidden="true"></i>Quản lý admin</a></li>
                   
            </div>
            <div class="col-xl-10 content"> 
                <p>Danh sách khách hàng</p>

                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead>
                        <tr>
						<th>Số TT</th>
						<th>Mã sản phẩm</th>
						<th>Tên sản phẩm</th>
						<th>Ngày tạo</th>
						<th>Chi tiết sản phẩm</th>

					</tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
					<?php foreach ( $data as $row ) : ?>
					<tr>
						<td><?= $i; ?></td>
						<td>
							<?= $row['id']; ?>  		
						</td>
						<td> <?= $row['name']; ?></td>
						<td><?= $row['date_created']; ?></td>
						<th><?= $row['short_description']; ?></th>
						
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>                     
                        </tbody>
                    </table>
            
                </div>
            </div>
        </div>
    </div>

</body>
</html>