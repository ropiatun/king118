<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/pengeluaran/tambah') ?>"><i class="fas fa-plus"></i> Tambah Pengeluaran</a>&nbsp;&nbsp;&nbsp;

						<a class="btn btn-danger" href="<?php echo site_url('admin/pengeluaran/print')?>"> <i class="fa fa-print"></i>Print</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>Nama Produk</th>
										<th>tanggal</th>
										<th>Jumlah Kredit</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=1;
										foreach ($pengeluaran as $pengeluaran): ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td width="150">
											<?php echo $pengeluaran->nama_produk ?>
										</td>
										<td width="150">
											<?php echo $pengeluaran->tanggal ?>
										</td>
										<td>
											Rp.
											<?php echo $pengeluaran->jumlah_kredit ?>
										</td>
										<td>
											<a href="<?php echo site_url('admin/pengeluaran/edit/'.$pengeluaran->id_pengeluaran) ?>"><i class="fa fa-edit" style="color: blue;"></i></a>&nbsp;&nbsp;&nbsp;
										
											<a onclick="deleteConfirm('<?php echo site_url('admin/pengeluaran/delete/'.$pengeluaran->id_pengeluaran) ?>')"><i class="fa fa-trash" style="color: red;"></i></a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

</body>

</html>