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

						<a href="<?php echo site_url('admin/prediksi') ?>"><i class="fas fa-arrow-left"></i>
							Kembali</a>
					</div>
					<div class="card-body">

						<form action="" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/produk/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $prediksi->id_prediksi?>" />

								<div class="form-group">
								<label for="nama">Tanggal Prediksi</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>"
								 type="date" name="tanggal" placeholder="Masukkan Tanggal Prediksi" value="<?php echo $prediksi->tanggal ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('tanggal') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Penjualan Bulan Ini</label>
								<input class="form-control <?php echo form_error('penjualan') ? 'is-invalid':'' ?>"
								 type="number" name="penjualan" min="0" placeholder="Masukan Penjulan Bulan Ini" value="<?php echo $prediksi->penjualan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('penjualan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Jumlah Produk Jadi</label>
								<input class="form-control <?php echo form_error('hasil_prediksi') ? 'is-invalid':'' ?>"
								 type="number" name="hasil_prediksi" min="0" placeholder="Masukan Hasil Prediksi" value="<?php echo $prediksi->hasil_prediksi ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('hasil_prediksi') ?>
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


</body>

</html>