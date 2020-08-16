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

						<a href="<?php echo site_url('admin/pemasukan') ?>"><i class="fas fa-arrow-left"></i>
							Kembali</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/produk/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $pemasukan->id_pemasukan?>" />

								<div class="form-group">
								<label for="harga">Nama Sales</label>
								<select name="id_user" class="form-control <?php echo form_error('id_user') ? 'is-invalid':'' ?>">
								<?php foreach ($user as $luser) {?>
  									<option name="id_user" value="<?=$luser['id_user'];?>" ><?=$luser['nama'];?></option>
  								
  							<?};?>
								</select>
							</div>

							<div class="form-group">
								<label for="price">Tanggal</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal" placeholder="Masukan Tanggal" value="<?php echo $pemasukan->tanggal ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Jumlah Debit</label>
								<input class="form-control <?php echo form_error('jumlah_debit') ? 'is-invalid':'' ?>"
								 type="number" name="jumlah_debit" min="0" placeholder="Masukan Jumlah Pemasukan" value="<?php echo $pemasukan->jumlah_debit ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah_debit') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Jumlah Pcs</label>
								<input class="form-control <?php echo form_error('jumlah_pcs') ? 'is-invalid':'' ?>"
								 type="number" name="jumlah_pcs" placeholder="Masukan Jumlah Pcs" value="<?php echo $pemasukan->jumlah_pcs ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah_pcs') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Nama Produk</label>
								<select name="id_produk" class="form-control <?php echo form_error('id_produk') ? 'is-invalid':'' ?>">
								<?php foreach ($produk as $lproduk) {?>
  									<option name="id_produk" value="<?=$lproduk['id_produk'];?>" ><?=$lproduk['nama_produk'];?></option>
  								
  							<?};?>
								</select>
							</div>

							<div class="form-group">
								<label for="price">Return Produk</label>
								<input class="form-control <?php echo form_error('return_produk') ? 'is-invalid':'' ?>"
								 type="number" name="return_produk" min="0" placeholder="Masukan Return Produk" value="<?php echo $pemasukan->return_produk ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('return_produk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="id_target">Target Sales</label>
								<select name="id_target" class="form-control <?php echo form_error('id_target') ? 'is-invalid':'' ?>">
								<?php foreach ($target as $ltarget) {?>
  									<option name="id_target" value="<?=$ltarget['id_target'];?>" ><?=$ltarget['target_pcs'];?></option>
  								
  							<?};?>
								</select>
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


</body>

</html>