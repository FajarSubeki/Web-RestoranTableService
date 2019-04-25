<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php

			include "../../config/for_excel.php";
			$ee = new Resto();
			$date = date('Y-m-d');
			$dataTrans = $ee->selectOrderBy("transaksi", "waktu");
			$grand     = $ee->selectSum("transaksi", "total_harga");
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=Laporan Transaksi - $date.xls");
		?>
		
		<center>
		<h2>Laporan Semua Data Transaksi</h2>
		<table class="table table-hover table-bordered" width="100%;" align="center" border="1px" cellpadding="5">
			<thead>
				<tr>
					<td>Kode Transaksi</td>
					<td>Nama Kasir</td>
					<td>Total Harga</td>
					<td>Tanggal Beli</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($dataTrans as $dts): ?>
				<tr>
					<td><?=$dts['kd_transaksi']?></td>
					<td><?=$dts['name']?></td>
					<td><?="Rp." . number_format($dts['total_harga']) . ",-"?></td>
					<td><?=$dts['tanggal']?></td>
				</tr>
				<?php endforeach?>
				<tr>
					<td></td>
					<td>Grand Total</td>
					<td><?php echo "Rp." . number_format($grand['sum']) . ",-" ?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		</center>
	</body>
</html>