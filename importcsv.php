
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nhập xuất file csv</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container" style="margin-top:50px;">
  <div class="row">
 <div class="col-lg-10"><h2>Import and export csv file</h2></div>
 <div class="col-lg-1"><a href="export.php" class="btn btn-success btn-sm">Export</a></div>
 <div class="col-lg-1"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#importModal">Import</button></div>
  </div>  
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID Nhân viên</th>
        <th>Tên nhân viên</th>
        <th>Tên đăng nhập</th>
        <th>Mật khẩu</th>
        <th>Chức năng</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
 <?php
 include('connection.php');
 $sql = 'SELECT * FROM wp_users ORDER BY ID desc';
    $result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_array($result)) {
 ?>
      <tr>
      <td><?php echo $row[0]; ?></td>
      <td><?php echo $row[9]; ?></td>
      <td><?php echo $row[1]; ?></td>
      <td><?php echo $row[2]; ?></td>
      <td><?php echo $row['user_status']; ?></td>
      <td><?php echo $row['user_registered']; ?></td>
      </tr>
 <?php 
 } ?> 
    </tbody>
  </table>
</div>
 
<!-- Modal -->
  <div class="modal fade" id="importModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Csv file</h4>
        </div>
        <div class="modal-body">
          <form action="import.php" method="post" enctype="multipart/form-data">
 <div class="col-lg-12">
 <div class="form-group">
 <input type="file" name="csv_file" id="csv_file" class="filestyle" data-icon="false">
 </div>
 </div> 
 <div class="col-lg-12">
 <input type="submit" value="Upload file" id="upload_btn">
 </div> 
   </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>