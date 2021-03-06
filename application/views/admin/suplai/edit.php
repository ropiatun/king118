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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/Suplai') ?>"><i class="fas fa-arrow-left"></i>
							Kembali</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/produk/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $suplai->id_suplai?>" />

							<div class="form-group">
								<label for="id_user">Nama Sales</label>
								<select name="id_user" class="form-control <?php echo form_error('id_user') ? 'is-invalid':'' ?>">
								<?php foreach ($user as $luser) {?>
  									<option name="id_user" value="<?=$luser['id_user'];?>" ><?=$luser['nama'];?></option>
  								
  							<?};?>
								</select>
							</div>

							<div class="form-group">
								<label for="id_produk">Nama Produk</label>
								<select name="id_produk" class="form-control <?php echo form_error('id_produk') ? 'is-invalid':'' ?>">
								<?php foreach ($produk as $lproduk) {?>
  									<option name="id_produk" value="<?=$lproduk['id_produk'];?>" ><?=$lproduk['nama_produk'];?></option>
  								
  							<?};?>
								</select>
							</div>

							<div class="form-group">
								<label for="id_toko">Nama Toko</label>
								<select name="id_toko" class="form-control <?php echo form_error('id_toko') ? 'is-invalid':'' ?>">
								<?php foreach ($toko as $ltoko) {?>
  									<option name="id_toko" value="<?=$ltoko['id_toko'];?>" ><?=$ltoko['nama_toko'];?></option>
  								
  							<?};?>
								</select>
							</div>


								<div class="form-group">
								<label for="tanggal">Tanggal Suplai</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal" placeholder="Masukkan Tanggal Suplai" value="<?php echo $suplai->tanggal ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jumlah_suplai">Jumlah Suplai</label>
								<input class="form-control <?php echo form_error('jumlah_suplai') ? 'is-invalid':'' ?>"
								 type="number" name="jumlah_suplai" min="0" placeholder="Masukan Jumlah Suplai" value="<?php echo $suplai->jumlah_suplai ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah_suplai') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="status_suplai">Status Suplai</label>
								<select name="status_suplai" class="form-control form-control-sm">
								<option value="Lunas">Lunas</option>
								<option value="Belum Lunas">Belum Lunas</option>
								
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