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
				
 		<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <!-- <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
              <div class="input-group-append">
               <!--  <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button> -->
              </div>
            </div>
          </form><br>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/Produk/tambah') ?>"><i class="fas fa-plus"></i> Tambah Produk</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>Nama Produk</th>
										<th>Harga Dasar</th>
										<th>Harga Jual</th>
										<th>Berat/Satuan</th>
										<th>Keterangan</th>
										<th>Stok Produk</th>
										<th>Foto Produk</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=1;
										foreach ($produk as $produk): ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td width="150">
											<?php echo $produk->nama_produk ?>
										</td>
										<td>
											Rp.
											<?php echo  $produk->harga_dasar ?>
										</td>
										<td>
											Rp.
											<?php echo  $produk->harga_jual ?>
										</td>
										<td>
											<?php echo  $produk->berat_satuan ?>
										</td>
										<td class="small">
											<?php echo substr($produk->keterangan, 0, 120) ?>...</td>
										<td>
											<?php echo $produk->stok_produk ?>
											Pcs
										</td>
										
										<td>
											<img src="<?php echo base_url('upload/produk/'.$produk->foto_produk) ?>" width="64" />
										</td>
										<td>
											<a href="<?php echo site_url('admin/produk/detail/'.$produk->id_produk) ?>"><i class="fas fa-search-plus" style="color:green;"></i></a>&nbsp;&nbsp;&nbsp;
										
											<a href="<?php echo site_url('admin/produk/edit/'.$produk->id_produk) ?>"><i class="fa fa-edit" style="color: blue;"></i></a>&nbsp;&nbsp;&nbsp;
										
											<a onclick="deleteConfirm('<?php echo site_url('admin/produk/delete/'.$produk->id_produk) ?>')"><i class="fa fa-trash" style="color: red;"></i></a>
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