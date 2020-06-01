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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/toko') ?>"><i class="fas fa-arrow-left"></i>
							Kembali</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/produk/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $toko->id_toko?>" />

								<div class="form-group">
								<label for="nama">Nama Toko</label>
								<input class="form-control <?php echo form_error('nama_toko') ? 'is-invalid':'' ?>"
								 type="text" name="nama_toko" placeholder="Masukkan Nama Toko" value="<?php echo $toko->nama_toko ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_toko') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="price">Nama Pemilik</label>
								<input class="form-control <?php echo form_error('nama_pemilik') ? 'is-invalid':'' ?>"
								 type="text" name="nama_pemilik" placeholder="Masukan Nama Pemilik" value="<?php echo $toko->nama_pemilik ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_pemilik') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">AlamatS</label>
								<textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 name="keterangan" placeholder="Masukan Alamat Toko"><?php echo $toko->alamat ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nama">Nomer Hp</label>
								<input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>"
								 type="number" name="no_hp" placeholder="Masukkan Nomer Hp" value="<?php echo $toko->no_hp ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('no_hp') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Gambar</label>
								<input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>"
								 type="file" name="gambar" />
								<input type="hidden" name="old_image" value="<?php echo $toko->gambar ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('gambar') ?>
								</div>
							</div>


							<input class="btn btn-success" type="submit" name="btn" value="Save" />
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