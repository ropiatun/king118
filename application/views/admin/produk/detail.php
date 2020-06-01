<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">



        <?php $this->load->view("admin/_partials/sidebar.php") ?>
<section class="content-header">
     
<h1>
        DETAIL MAHASISWA
        <small>Preview</small>
    </h1>
 
     
<ol class="breadcrumb">
         
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
 
         
<li><a href="#">Forms</a></li>
 
         
<li class="active">General Elements</li>
 
    </ol>
 
</section>
 
 
<!-- Main content -->
 
<section class="content">
     
<div class="row">
        <!-- right column -->
         
<div class="col-md-8">
             
<div class="box">
                 
<div class="box-header">
                     
<h3 class="box-title">Data Detail untuk Mahasiswa <?php echo $row['nama']; ?></h3>
 
                </div>
 
                <!-- /.box-header -->
                 
<div class="box-body no-padding">
                     
<table class="table">
 
                         
<tr>
                             
<td>Nama</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $row['nama']; ?></td>
 
                        </tr>
 
                         
<tr>
                             
<td>Alamat</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $row['harga']; ?></td>
 
                        </tr>
 
                         
<tr>
                             
<td>No Telp</td>
 
                             
<td>:</td>
 
                             
<td><?php echo $row['keterangan']; ?></td>
 
                        </tr>
 
                    </table>
 
                     
<div class="box-footer">
                        <?php echo anchor('produk', 'cancel', array('class' => 'btn btn-default'));
                        ?>
                    </div>
 
                </div>
 
                <!-- /.box-body -->
            </div>
 
            <!-- /.box -->
 
        </div>
 
        <!--/.col (right) -->
    </div>
 
    <!-- /.row -->
</section>
 
<!-- /.content -->