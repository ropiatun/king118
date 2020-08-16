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
						<a href="<?php echo site_url('admin/sales') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/sales/tambah') ?>" method="post" enctype="multipart/form-data" >

							<div class="form-group">
								<label for="harga">Nama Sales</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Masukan Nama Sales" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Alamat</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 name="alamat" placeholder="Masukkan Alamat Sales"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Nomor Hp</label>
								<input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>"
								 type="text" name="no_hp" min="0" placeholder="Masukan Nomer Hp" />
								<div class="invalid-feedback">
									<?php echo form_error('no_hp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Foto KTP</label>
								<input class="form-control-file <?php echo form_error('foto_ktp') ? 'is-invalid':'' ?>"
								 type="file" name="foto_ktp" />
								<div class="invalid-feedback">
									<?php echo form_error('foto_ktp') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Foto Selfie KTP</label>
								<input class="form-control-file <?php echo form_error('foto_selfie') ? 'is-invalid':'' ?>"
								 type="file" name="foto_selfie" />
								<div class="invalid-feedback">
									<?php echo form_error('foto_selfie') ?>
								</div>
							</div>


								<div class="form-group">
								<label for="name">Foto Profil</label>
								<input class="form-control-file <?php echo form_error('foto_profil') ? 'is-invalid':'' ?>"
								 type="file" name="foto_profil" />
								<div class="invalid-feedback">
									<?php echo form_error('foto_profil') ?>
								</div>
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