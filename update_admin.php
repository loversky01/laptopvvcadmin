<?php
require("./dbconfig.php");
if(isset($_GET['edit_id']))
{
	$sql_query="select * from wp_users where ID=".$_GET['edit_id'];
	$result_set=mysqli_query($links, $sql_query);
	$fetched_row=mysqli_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
	// variables for input data
    $display_name = $_POST["tDisplay_name"];
    $user_login = $_POST["tUser_login"];
    $user_pass = $_POST["tUser_pass"];
    $user_status = $_POST["tUser_status"];
	// variables for input data
	
	// sql query for update data into database
	$sql = "update wp_users set display_name='$display_name',user_login='$user_login',password=md5 ('$user_pass'),user_status='$user_status' where ID=".$_GET['edit_id'];
	// sql query for update data into database
	
	// sql query execution function
	if(mysqli_query($links, $sql))
	{
		?>
		<script type="text/javascript">
		alert('Dữ liệu được cập nhật thành công');
		window.location.href='admin.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('xảy ra lỗi khi cập nhật dữ liệu');
		</script>
		<?php
	}
	// sql query execution function
}
if(isset($_POST['btn-cancel']))
{
	header("Location: admin.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý admin</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/admin1.css">
    <style>
        .submit{text-align: left;padding-left: 120px;}
    </style>
</head>
<body>
   
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
                    <li><a href="./danhmuc.php"><i class="fa fa-list-alt" aria-hidden="true"></i>Danh mục</a></li>
                    <li><a href="./sanpham.php"><i class="fa fa-database" aria-hidden="true"></i>Sản phẩm</a></li>
                    <li><a href=""><i class="fa fa-pencil" aria-hidden="true"></i>Bài viết</a></li>
                    <li><a href="./khachhang.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Quản lý khách hàng</a></li>
                    <li><a href="./lienhe.php"><i class="fa fa-phone" aria-hidden="true"></i>Liên hệ</a></li>
                    <li><a href="./donhang.php"><i class="fa fa-book" aria-hidden="true"></i>Đơn hàng</a></li>
                    <li><a href="./admin.php"><i class="fa fa-users" aria-hidden="true"></i>Quản lý admin</a></li>
                </ul>
            </div>
            <div class="col-xl-10 content"> 
                <p>Update admin</p>
                <!-- <div class="row content-container"></div> -->
                <form method="post">
                    <p><span>Họ tên:</span><input type="text" name="tDisplay_name" value="<?php echo $fetched_row['display_name']; ?>"></p>
                    <p><span>Username:</span><input type="text" name="tUser_login" value="<?php echo $fetched_row['user_login']; ?>"></p>
                    <p><span>Password:</span><input type="text" name="tUser_pass" value="<?php echo $fetched_row['user_pass']; ?>"></p>
                    <p><span>Cấp độ quản lý:</span><input type="text" name="tUser_status" value="<?php echo $fetched_row['user_status']; ?>"></p>
                    
                    <div class="submit">
                        <button type="submit" name="btn-update"><strong>UPDATE</strong></button>
                        <button type="submit" name="btn-cancel"><strong>Cancel</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>