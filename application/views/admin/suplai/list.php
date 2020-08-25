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
						<!-- <a href="<?php echo site_url('admin/suplai/tambah') ?>"><i class="fas fa-plus"></i> Tambah Suplai</a> -->
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>Nama Sales</th>
										<th>Nama Produk</th>
										<th>Nama Toko</th>
										<th>Tanggal Suplai</th>
										<th>Jumlah Suplai</th>
										<th>Status Suplai</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($suplai as $suplai): ?>
									<tr>
										<td scope="row"><?=$i++?></td>
										<td width="150">
											<?php echo $suplai->nama ?>
										</td>
										<td width="150">
											<?php echo $suplai->nama_produk ?>
										</td>
										<td width="150">
											<?php echo $suplai->nama_toko ?>
										</td>
										<td width="150">
											<?php echo $suplai->tanggal ?>
										</td>
										<td>
											<?php echo $suplai->jumlah_suplai ?>
											Pcs
										</td>
										<td>
											<?php echo $suplai->status_suplai ?></td>
									
										<td>
											<!-- <a href="<?php echo site_url('admin/suplai/edit/'.$suplai->id_suplai) ?>"><i class="fa fa-edit" style="color: blue;"></i></a>&nbsp;&nbsp;&nbsp; -->
										
											<a onclick="deleteConfirm('<?php echo site_url('admin/suplai/delete/'.$suplai->id_suplai) ?>')"><i class="fa fa-trash" style="color: red;"></i></a>
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