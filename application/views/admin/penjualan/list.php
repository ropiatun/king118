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
             <!--  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
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
						<a href="<?php echo site_url('admin/penjualan/tambah') ?>"><i class="fas fa-plus"></i> Tambah Penjualan</a>&nbsp;&nbsp;&nbsp;

						<a class="btn btn-danger" href="<?php echo site_url('admin/penjualan/print')?>"> <i class="fa fa-print"></i>Print</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>Tanggal</th>
										<th>Jumlah Penjualan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=1;
										foreach ($penjualan as $penjualan): ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td width="150">
											<?php echo $penjualan->tanggal ?>
										</td>
										<td>
											<?php echo  $penjualan->jumlah ?>
											Pcs
										</td>
										<td>

											<a href="<?php echo site_url('admin/penjualan/edit/'.$penjualan->id_penjualan) ?>"><i class="fa fa-edit" style="color: blue;"></i></a>&nbsp;&nbsp;&nbsp;
		
											<a onclick="deleteConfirm('<?php echo site_url('admin/penjualan/delete/'.$penjualan->id_penjualan) ?>')"><i class="fa fa-trash" style="color: red;"></i></a>
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