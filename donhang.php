<!-- Xử lý đơn hàng -->
<?php  
		$data = file_get_contents('https://laptopvvc-admin.herokuapp.com/order_xuly.php');
		$data = json_decode($data, true);
	?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/admin1.css">
    <style>
        .search{
            background: #fff;
            margin: 10px 20px;
            padding: 10px 30px;
        }
    </style>
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
        <div class="row bl" style="background: #000">
            <div class="col-xl-2 nav">  
                <ul>
                    <li><a href="./home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                    <li><a href="./sanpham.php"><i class="fa fa-database" aria-hidden="true"></i>Sản phẩm</a></li>
                    
                    <li><a href="./donhang.php"><i class="fa fa-book" aria-hidden="true"></i>Đơn hàng</a></li>
                    <li><a href="./admin.php"><i class="fa fa-users" aria-hidden="true"></i>Quản lý admin</a></li>
                </ul>
            </div>
            <div class="col-xl-10 content"> 
                <p>Danh sách đơn hàng</p>
              
                
                <div class="row content-container">
                    <table class="table table-bordered table-hover table-responsive-md" style="font-size: 12px;">
                        <thead>
                        <tr>
                            <th>Số TT</th>
                            <th>Mã đơn hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái đơn hàng</th>
                            
                            <th>Tổng</th>
					    </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
					        <?php foreach ( $data as $row ) : ?>
					        <tr>
						<td><?= $i; ?></td>
						<td>
							<?= $row['number']; ?>  		
						</td>
						<td> <?= $row['billing']['last_name']; ?> <?= $row['billing']['first_name']; ?></td>
						<td><?= $row['date_created']; ?></td>
						<td><?= $row['billing']['address_1']; ?>  </td>
						<td><?php 
							if($row['status']=="processing")
								echo"Đang xử lý";
							else if($row['status']=="completed")
								echo"Đã giao hàng";
						?></td>
					
						<td><?= number_format($row['total'])  ; ?>đ</td>
						
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