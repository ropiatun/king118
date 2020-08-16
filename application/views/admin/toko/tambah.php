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

				<?php if ($this->session->flashdata('sukses')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('sukses'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/toko') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/toko/tambah') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nama">Nama Toko</label>
								<input class="form-control <?php echo form_error('nama_toko') ? 'is-invalid':'' ?>"
								 type="text" name="nama_toko" placeholder="Masukan Nama Toko" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_toko') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Nama Pemilik</label>
								<input class="form-control <?php echo form_error('nama_pemilik') ? 'is-invalid':'' ?>"
								 type="text" name="nama_pemilik" placeholder="Masukan Nama Pemilik" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_pemilik') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="Masukan Alamat Toko" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">No Hp</label>
								<input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>"
								 type="text" name="no_hp" placeholder="Masukan Nomer Hp" />
								<div class="invalid-feedback">
									<?php echo form_error('no_hp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Foto Toko</label>
								<input class="form-control-file <?php echo form_error('foto_toko') ? 'is-invalid':'' ?>"
								 type="file" name="foto_toko" />
								<div class="invalid-feedback">
									<?php echo form_error('foto_toko') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="status_suplai">Status Toko</label>
								<select name="status_suplai" class="form-control form-control-sm">
								<option value="Sudah Suplai">Sudah Suplai</option>
								<option value="Belum Suplai">Belum Suplai</option>
								
							</div>


							<input class="btn btn-success" type="submit" name="btn" value="save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>