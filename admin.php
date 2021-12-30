<?php
    require("./dbconfig.php");
    session_start();
    require_once("./ktradangnhap.php");
    if(isset($_GET['delete_id']))
    {
        $sql ="delete from wp_users where ID=".$_GET['delete_id'];
        mysqli_query($links, $sql);
        header("Location: $_SERVER[PHP_SELF]");
    }
    if(isset($_GET['edit_id']))
    {
        $sql_query="select * from wp_users where ID=".$_GET['edit_id'];
        $result_set=mysqli_query($links, $sql_query);
        $fetched_row=mysqli_fetch_array($result_set);
    }
    if(isset($_POST["btn-save"]))
    {
        $display_name = $_POST["tDisplay_name"];
        if($display_name=="")
            die();
        $user_login = $_POST["tUser_login"];
        $user_pass = $_POST["tUser_pass"];
        $user_status = $_POST["tUser_status"];
        
            
        $sql = "insert into wp_users(display_name,user_login,user_pass,user_status) values('$display_name','$user_login',md5('$user_pass'),'$user_status')";
        if(mysqli_query($links, $sql))
        {
            ?>
            <script type="text/javascript">
            alert('Dữ liệu được thêm thành công');
            // window.location.href='admin.php';
            </script>
            <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
            alert('đã xảy ra lỗi khi thêm dữ liệu của bạn');
            </script>
            <?php
        }
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
    <script type="text/javascript">
        function edt_id(id)
        {
            if(confirm('Bạn chắc chắn muốn cập nhật ?'))
            {
                window.location.href='update_admin.php?edit_id='+id;
            }
        }
        function delete_id(id)
        {
            if(confirm('Bạn chắc chắn muốn xóa ?'))
            {
                window.location.href='admin.php?delete_id='+id;
            }
        }
    </script>
</head>
<body>
    <!-- link1 https://previewcode.net/code/do-an-bai-tap-lon-xay-dung-website-ban-laptop-bang-php-mysql-pro -->
    <!-- link2 https://sharecode.vn/source-code/web-ban-may-tinh-full-code-php-bs4-adminweb-giao-dien-dep-19145.htm -->
    <div class="container-fluid">
        <div class="row header">
            <div class="col-xl-2 header-left">
                <p>Admin Laptop VVC</p>
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
                    <li><a href="./donhang.php"><i class="fa fa-book" aria-hidden="true"></i>Đơn hàng</a></li>
                    <li><a href="./sanpham.php"><i class="fa fa-database" aria-hidden="true"></i>Sản phẩm</a></li>
                    <li><a href="./admin.php"><i class="fa fa-users" aria-hidden="true"></i>Quản lý admin</a></li>
           
                </ul>
            </div>
            <div class="col-xl-10 content"> 
                <p>Danh sách quản lý admin</p>
                <div class="row content-container">
                    <button id="btn"><i class="fa fa-plus" aria-hidden="true"></i>Thêm admin</button>
                    <div id="myModal" class="modal1">
                        <div class="modal-content">
                            <p class="title">
                                <span >Thêm admin</span>
                                <span class="close">&times;</span>  
                            </p>
                            <form method="post" action="admin.php">
                                <p><span>Họ tên:</span><input type="text" name="tDisplay_name"></p>
                                <p><span>Username:</span><input type="text" name="tUser_login"></p>
                                <p><span>Password:</span><input type="text" name="tPassword"></p>
                                <p><span>Cấp độ quản lý: </span><input type="text" name="tUser_status"></p>
                                
                                <div class="submit">
                                    <button type="submit" name="btn-save">SAVE</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                <script src="./js/modal.js"></script>
                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Username</th>
                                <th>Password</th>
        
                                <th>Cấp độ</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "select * from wp_users";
                                $result_set = mysqli_query($links,$sql);
                                if(mysqli_num_rows($result_set))
                                {
                                    while($row = mysqli_fetch_row($result_set))
                                    {
                                        ?>
                                            <tr>
                                                <td><?php echo $row[0]; ?></td>
                                                <td><?php echo $row[9]; ?></td>
                                                <td><?php echo $row[1]; ?></td>
                                                <td><?php echo $row[2]; ?></td>
                                                <td><?php echo $row[8]; ?></td>
                                               
                                                <td>
                                                    <a href="javascript:edt_id('<?php echo $row[0]; ?>')" class="xx xanh update"><i class="fa fa-pencil" aria-hidden="true"></i>Sửa</a>
                                                    <a href="javascript:delete_id('<?php echo $row[0]; ?>')" class="xx do"><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <tr>
                                    <td colspan="7">No Data Found !</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                        </tbody>
                    </table>
                    <div>
           
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                            <a href="./importcsv.php"><i aria-hidden="true"></i>Xuất/ Nhập file csv</a>
                            </div>
                   </div>                    
                  
 </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>