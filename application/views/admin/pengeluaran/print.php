<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style>
.table1{
	margin:0 auto;
	border-collapse:collapse;
	background:#FFFFFF;
}
.table1 th{
	border:solid;
	border-width:1px;
	border-color:#000000;
	color:#FFFFFF;
	padding:4px 8px;
	background:#23333E;
}
.table1 td{
	border:solid;
	border-width:1px;
	border-color:#000000;
	padding:4px 8px;
}
#hitam{
	text-align:center;
	background:#333333;
	color:#FFFFFF;
}
#rpt{
	border:solid;
	border-color:#000000;
	border-width:1px;
}
</style>
<div align="center">
	<h2>LAPORAN PENGELUARAN KING18</h2> 

	<table width="100%" class="table1">
		<tr>
			<th>Nomor</th>
			<th>Tanggal</th>
			<th>Nama Produk</th>
			<th>Jumlah Kredit</th>
		</tr>

		<?php
		$no=1;
		foreach ($pengeluaran as $pengeluaran): ?>

		<tr align="center">
			<td><?php echo $no++ ?></td>
			<td>
				<?php echo $pengeluaran->tanggal ?>	
			</td>
			<td width="150">
				<?php echo $pengeluaran->nama_produk ?>
				
			</td>
			<td> Rp. <?php echo $pengeluaran->jumlah_kredit ?></td>
		</tr>

	<?php endforeach;  ?>
	</table>
</div>
	<br />

	<table width="100%">
    	<tr>
            <td><div align="right">Indramayu, <?php echo  Date ('d-m-Y') ?></div></td>
        </tr>
    	<tr>
            <td height="200"><div align="right">Bagian Administrator</div></td>
        </tr>
  </table>

	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>