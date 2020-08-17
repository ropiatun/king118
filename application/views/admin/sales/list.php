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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/sales/tambah') ?>"><i class="fas fa-plus"></i> Tambah Produksi</a>
					</div>
					<div class="card-header">
						<h4> Data Sales</h4>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nomor</th>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Nomor Hp</th>
										<th>Foto KTP</th>
										<th>Foto Selfie KTP</th>
										<th>Foto Profil</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$no=1;
										foreach ($sales as $sales): ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td width="150">
											<?php echo $sales->nama ?>
										</td>
										<td>
											<?php echo  $sales->alamat ?>
										</td>
										<td>
											<?php echo $sales->no_telepon ?>
										</td>
										<td>
											<img src="<?php echo base_url('upload/sales/'.$sales->foto_ktp) ?>" width="64" />
										</td>
										<td>
											<img src="<?php echo base_url('upload/sales/'.$sales->selfie_ktp) ?>" width="64" />
										</td>
										<td>
											<img src="<?php echo base_url('upload/sales/'.$sales->foto_profil) ?>" width="64" />
										</td>
										<td>
											<a href="<?php echo site_url('admin/sales/detail/'.$sales->id_user) ?>"><i class="fas fa-search-plus" style="color:green;"></i></a>&nbsp;&nbsp;&nbsp;
										
											<a onclick="deleteConfirm('<?php echo site_url('admin/sales/delete/'.$sales->id_user) ?>')"><i class="fa fa-trash" style="color: red;"></i></a>
											<a href="<?php echo site_url('admin/sales/detail/'.$sales->id_user) ?>" data-toggle="modal" data-kode="<?= $sales->id_user ?>" data-target="#editkategori"><i class="fas fa-search-plus editkategori" style="color:green;"></i></a>&nbsp;&nbsp;&nbsp;

										
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
	<!-- Modal -->

<div class="modal fade" id="editkategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('admin/produk_admin/editkategori'); ?>">
                    <input type="hidden" name="id_kategori_edit" id="id_kategori_edit" class="form-control">
                    <div class="form-group">
                        <label for="kategori_saat_ini">Kategori</label>
                        <input type="text" name="nama_kategori_edit" id="nama_kategori_edit" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary" id="save_pesawat">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
<script type="text/javascript">
    $(document).on('click', '.editkategori', function() {
        $.ajax({
            url: base_url + 'admin/Sales/aktifupdate',
            method: 'POST',
            data: {
                id: $(this).data('kode'),
            },
            success: function(response) {
                data = JSON.parse(response);
                console.log(data);
                $('#id_kategori_edit').val(data.id_kategori);
                $('#nama_kategori_edit').val(data.nama_kategori);
            }
        });
    });
    
</script>

</body>

</html>