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

                        <a href="<?php echo site_url('admin/toko') ?>"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
 
                         
<tr>
                             
<td>Nama</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $kingsamadenganraja['nama_toko']; ?></td>
 
                        </tr>
 
                         
<tr>
                             
<td>Harga Pemilik</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $kingsamadenganraja['nama_pemilik']; ?></td>
 
 </tr>

 <tr>
                             
<td>Alamat</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $kingsamadenganraja['alamat']; ?></td>
 
 </tr>
 
                         
<tr>
                             
<td>No Hp</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $kingsamadenganraja['no_hp']; ?></td>
 
</tr>

<tr>
                             
<td>Status Toko</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $kingsamadenganraja['status_toko']; ?></td>
 
</tr>

<tr>
                             
<td>Foto Toko</td>
 
                             
<td>:</td>
 
                             
<td><img src="<?php echo base_url('upload/toko/'.$kingsamadenganraja['foto_toko']) ?>" width="200" /></td>
 
</tr>
 
 </table>
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