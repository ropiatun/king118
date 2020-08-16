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

                        <a href="<?php echo site_url('admin/Pemasukan2') ?>"><i class="fas fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
 
                         
<tr>
                             
<td>Nama Sales</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $satu_orang['nama']; ?></td>
 
 </tr>

 <tr>
                             
<td>Jumlah Target</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $satu_orang['target_pcs']; ?></td>
 
 </tr>
 
                         
<tr>

                             
<div class="form-group col-md-3 col-sm-7" id="form-bulan">
                <label>Bulan</label><br>
                <input class="form-control col-md-12 bulaninput" type="text" name="bulan" id="bulan" placeholder="pilih bulan" autocomplete="off">
            </div>
            <div class="form-group col-md-2 col-sm-7" id="tmbol" >
                <br>
                <a href="#" class="btn btn-success mt-2" name="tmbol" id="tmbol">cari</a>
            </div>

 
 </tr>
 
                         


 
 </table>
 <br><br>
<div id="table_out">

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

<script type="text/javascript">
    $(document).ready(function() { // Ketika halaman selesai di load
    var id_user = '<?= $this->uri->segment(4)?>'; 
    var base_url = '<?= site_url('/')?>';        
        // $('.input-tanggal').datepicker();
        $('.bulaninput').datepicker({
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months"
        });

          $(document).ready(function() {
        function loadTableOrder() {
            $.ajax({
                url: base_url + 'admin/Pemasukan2/table_out/' + id_user,
                method: 'POST',
                data: {
                    oke: 'ok'
                },
                success: function(response) {
                    $('#table_out').html(response)
                }
            });
        }

        $.ajax({
            url: base_url + 'admin/Pemasukan2/table_out/' + id_user,
            method: 'POST',
            data: {
                oke: 'ok'
            },
            success: function(response) {
                $('#table_out').html(response);
            }
        });

        });
          $(document).on('click', '#tmbol', function() {
            filter = $('#bulan').val();
            if (filter != '') {
                $.ajax({
                    url: base_url + 'admin/Pemasukan2/filterbulan/' + id_user+'/' +filter,
                    method: 'POST',
                    data: {
                        filter: filter
                    },
                    success: function(response) {
                        $('#table_out').html(response);
                    }
                });
            } else {
                swal({
                    type: 'error',  
                    title: 'Oops...',
                    width: 400,
                    text: 'Form harus di isi ya!',
                })
            }
        });
          });
</script>


</body>

</html>