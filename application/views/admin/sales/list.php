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
						<!-- <a href="<?php echo site_url('admin/sales/tambah') ?>"><i class="fas fa-plus"></i> Tambah Produksi</a> -->
					</div>
					<div class="card-header">
						<h4> Data Sales</h4>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Nomor Hp</th>
										<th>Foto KTP</th>
										<th>Foto Selfie KTP</th>
										<th>Foto Profil</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($sales as $sales) : ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td width="150">
												<?php echo $sales->nama ?>
											</td>
											<td>
												<?php echo  $sales->alamat ?>
											</td>
											<td>
												<?php echo $sales->no_telepon ?>
											</td>
											<td>
												<img src="<?php echo base_url('upload/sales/' . $sales->foto_ktp) ?>" width="64" />
											</td>
											<td>
												<img src="<?php echo base_url('upload/sales/' . $sales->selfie_ktp) ?>" width="64" />
											</td>
											<td>
												<img src="<?php echo base_url('upload/sales/' . $sales->foto_profil) ?>" width="64" />
											</td>
											<td>
												<?php if ($sales->aktif == 0) { ?>
													<a href="#" class="btn btn-danger updatestatus" data-kode="<?= $sales->id_user ?>" data-toggle="modal" data-target="#updatestatus">
														Tidak Aktif
													<?php } elseif ($sales->aktif == 1) { ?>
														<a href="#" class="btn btn-success updatestatus" data-kode="<?= $sales->id_user ?>" data-toggle="modal" data-target="#updatestatus">
															Aktif
														<?php } ?>
														</a></td>
											<td>
												<a href="<?php echo site_url('admin/sales/detail/' . $sales->id_user) ?>"><i class="fas fa-search-plus" style="color:green;"></i></a>&nbsp;&nbsp;&nbsp;

												<a onclick="deleteConfirm('<?php echo site_url('admin/sales/delete/' . $sales->id_user) ?>')"><i class="fa fa-trash" style="color: red;"></i></a>
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
	<!-- Modal -->

	<div class="modal fade" id="updatestatus" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Status Sales</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="gambarshow">
					<form method="post" action="<?= site_url('admin/Sales/upadatestatusbaru'); ?>">
						<input type="hidden" name="idistatus" id="idistatus" class="form-control">
						<div class="form-group">
							<label for="kategori_saat_ini">status</label>
							<select class="form-control" name="statusedit" id="statusedit">
								<option selected="" disabled="">Pilih status</option>
								<option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option>
							</select>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary" id="save_pesawat">Simpan</button>
				</div>
				</form>
			</div>

		</div>
	</div>

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
		function deleteConfirm(url) {
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>

	<script type="text/javascript">
		var base_url = '<?= base_url() ?>'
		$(document).on('click', '.updatestatus', function() {
			$.ajax({
				url: base_url + 'index.php/admin/Sales/upadatestatus',
				method: 'POST',
				data: {
					id: $(this).data('kode'),
				},
				success: function(response) {
					data = JSON.parse(response);
					console.log(data);
					$('#idistatus').val(data.user.id_user);
					$('#statusedit').val(data.aktif);
				}
			});
		});
	</script>

</body>

</html>