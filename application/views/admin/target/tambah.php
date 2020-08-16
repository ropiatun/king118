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
						<a href="<?php echo site_url('admin/target') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/target/tambah') ?>" method="post" enctype="multipart/form-data" >


							<div class="form-group">
								<label for="id_user">Nama user</label>
								<select name="id_user" class="form-control form-control-sm">
								<?php foreach ($user as $luser) {?>
  									<option name="id_user" value="<?=$luser['id_user'];?>" ><?=$luser['nama'];?></option>
  								
  							<?};?>
								</select>
							</div>

							<div class="form-group">
								<label for="id_produk">Nama Produk</label>
								<select name="id_produk" class="form-control form-control-sm">
								<?php foreach ($produk as $lproduk) {?>
  									<option name="id_produk" value="<?=$lproduk['id_produk'];?>" ><?=$lproduk['nama_produk'];?></option>
  								
  							<?};?>
								</select>
							</div>

							<div class="form-group">
								<label for="tanggal">Tanggal</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal" placeholder="Masukan Tanggal " />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="target_pcs">Target Pcs</label>
								<input class="form-control <?php echo form_error('target_pcs') ? 'is-invalid':'' ?>"
								 type="number" name="target_pcs" min="0" placeholder="Masukan Target Pcs" />
								<div class="invalid-feedback">
									<?php echo form_error('target_pcs') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="target_toko">Target Toko</label>
								<input class="form-control <?php echo form_error('target_toko') ? 'is-invalid':'' ?>"
								 type="number" name="target_toko" min="0" placeholder="Masukan Target Toko" />
								<div class="invalid-feedback">
									<?php echo form_error('target_toko') ?>
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