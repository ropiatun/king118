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
						<h4> Data Sales</h4>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Nomor Hp</th>
										<th>Foto KTP</th>
										<th>Foto Selfie KTP</th>
										<th>Foto Profil</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($sales as $sales): ?>
									<tr>
										<td width="150">
											<?php echo $sales->nama ?>
										</td>
										<td>
											<?php echo  $sales->alamat ?>
										</td>
										<td>
											<?php echo $sales->no_hp ?>
										</td>
										<td>
											<img src="<?php echo base_url('upload/foto_ktp/'.$sales->foto_ktp) ?>" width="64" />
										</td>
										<td>
											<img src="<?php echo base_url('upload/foto_selfie/'.$sales->foto_selfie) ?>" width="64" />
										</td>
										<td>
											<img src="<?php echo base_url('upload/foto_profil/'.$sales->foto_profil) ?>" width="64" />
										</td>
										<td>
											<a href="#"><i class="fas fa-search-plus" style="color:green;"></i></a>&nbsp;&nbsp;&nbsp;
										
											<a onclick="deleteConfirm('<?php echo site_url('admin/sales/delete/'.$sales->id_sales) ?>')"><i class="fa fa-trash" style="color: red;"></i></a>
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