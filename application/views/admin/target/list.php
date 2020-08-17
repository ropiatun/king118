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
						<a href="<?php echo site_url('admin/target/tambah') ?>"><i class="fas fa-plus"></i> Tambah Target</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>Tanggal</th>
										<th>Target Pcs</th>
										<th>Target Toko</th>
										<th>Nama Sales</th>
										<th>Nama Produk</th>
										<th>Selisih Target</th>
										<th>Sisa Target</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($target as $target): ?>
									<tr>
										<td scope="row"><?=$i++?></td>
										<td width="150">
											<?php echo $target->tanggal ?>
										</td>
										<td width="150">
											<?php echo $target->target_pcs ?>
											Pcs
										</td>
										<td width="150">
											<?php echo $target->target_toko ?>
										</td>
										<td width="150">
											<?php echo $target->nama ?>
										</td>
										<td>
											<?php echo $target->nama_produk ?>
										</td>
										<td>
											<?php echo $target->selisih_target ?></td>
									
										<td>
											<?php echo $target->sisa_target ?>
												
											</td>
									
										<td>
											<a href="<?php echo site_url('admin/target/edit/'.$target->id_target) ?>"><i class="fa fa-edit" style="color: blue;"></i></a>&nbsp;&nbsp;&nbsp;
										
											<a onclick="deleteConfirm('<?php echo site_url('admin/target/delete/'.$target->id_target) ?>')"><i class="fa fa-trash" style="color: red;"></i></a>
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