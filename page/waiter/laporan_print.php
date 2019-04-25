<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dashboard Admin</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/mains.css">
	</head>
	<style>
	body{
	overflow-x: hidden;
	}
	</style>
	<body onload="window.print()">
		<?php
		include "../../config/controller.php";
		$qb = new Resto();
		if (!isset($_GET['dateAwal']) || !isset($_GET['dateAkhir'])) {
		header("location:?page=order_periode");
		}
		$whereparam = "tanggal";
		$param      = $_GET['dateAwal'];
		$param1     = $_GET['dateAkhir'];
		$data       = $qb->selectBetween("detail_order", $whereparam, $param, $param1);
		?>
		<div class="row">
			<div class="col-sm-12" style="padding: 50px;">
				<h3>Laporan Orderan Periode</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" style="padding-left: 50px; padding-right: 50px;">
				<p class="text-right" style="font-size: 17px;">Dari tanggal : <?php echo $_GET['dateAwal']; ?> Ke : <?php echo $_GET['dateAkhir'] ?></p>
				<div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>Kode Order</th>
								<th>Pelanggan</th>
								<th>No Meja</th>
								<th>Nama Menu</th>
								<th>Jumlah</th>
								<th>Sub total</th>
								<th>Harga</th>
								<th>Tanggal</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($data as $ds) {?>
							<tr>
								<td><?=$ds['order_kd']?></td>
								<td><?=$ds['name']?></td>
								<td><?=$ds['no_meja']?></td>
								<td><?=$ds['name_menu']?></td>
								<td><?=$ds['total']?></td>
								<td><?=$ds['sub_total']?></td>
								<td><?=number_format($ds['harga'])?></td>
								<td><?=$ds['tanggal']?></td>
								<?php $no++;}?>
							</tbody>
						</table>
					</div>
					<p style="font-size: 17px;">Tanggal cetak : <?=date("Y-m-d");?></p>
				</div>
			</div>
		</body>
	</html>