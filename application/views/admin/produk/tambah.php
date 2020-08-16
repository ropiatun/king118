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
						<a href="<?php echo site_url('admin/produk') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/produk/tambah') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nama">Nama Produk</label>
								<input class="form-control <?php echo form_error('nama_produk') ? 'is-invalid':'' ?>"
								 type="text" name="nama_produk" placeholder="Masukan Nama Produk" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_produk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Harga Dasar</label>
								<input class="form-control <?php echo form_error('harga_dasar') ? 'is-invalid':'' ?>"
								 type="number" name="harga_dasar" min="0" placeholder="Masukan Harga Dasar Produk" />
								<div class="invalid-feedback">
									<?php echo form_error('harga_dasar') ?>
								</div>
							</div>

							

							<div class="form-group">
								<label for="name">Keterangan</label>
								<textarea class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>"
								 name="keterangan" placeholder="Masukkan Keterangan Produk"></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('keterangan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Foto Produk</label>
								<input class="form-control-file <?php echo form_error('foto_produk') ? 'is-invalid':'' ?>"
								 type="file" name="foto_produk" />
								<div class="invalid-feedback">
									<?php echo form_error('foto_produk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Stok Produk</label>
								<input class="form-control <?php echo form_error('stok_produk') ? 'is-invalid':'' ?>"
								 type="number" name="stok_produk" min="0" placeholder="Masukan Stok Produk" />
								<div class="invalid-feedback">
									<?php echo form_error('stok_produk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Harga Jual</label>
								<input class="form-control <?php echo form_error('harga_jual') ? 'is-invalid':'' ?>"
								 type="number" name="harga_jual" min="0" placeholder="Masukan Harga Jual Produk" />
								<div class="invalid-feedback">
									<?php echo form_error('harga_jual') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Berat/Satuan</label>
								<input class="form-control <?php echo form_error('harga_jual') ? 'is-invalid':'' ?>"
								 type="text" name="berat_satuan" min="0" placeholder="Masukan Berat/Satuan Produk" />
								<div class="invalid-feedback">
									<?php echo form_error('berat_satuan') ?>
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