<!DOCTYPE html>
<html>
<head>
	<title>Quản lý đơn hàng</title>
	<meta charset=utf-8>
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

	<?php  
		$data = file_get_contents('http://localhost/testAPIWP/sampham_xuly.php');
		$data = json_decode($data, true);
	?>
	<div>
		<br><br>
		<center>
			<h3>Quản lý sản phẩm</h3>
		</center>
		<br><br>
	</div>
	<div class="container">
		<div class="table-responsive">
			<table class="table table-hover">
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

</body>
</html>