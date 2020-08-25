<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Login <?php echo SITE_NAME ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css" rel="stylesheet')?>" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin-2.min.css')?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


  <div class="container">
    <?php echo form_open('administrator/login', array('class'=>'form-signin')) ?>
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <?php if ($this->session->flashdata('pesan')): ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $this->session->flashdata('pesan'); ?>
        </div>
        <?php endif; ?>
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?= base_url('/')?>Logo.PNG" height="100" width="130" /><br><br>
                    <h1 class="h4 text-blue-900 mb-4">Silahkan Login Dahulu</h1>
                  </div>
                    <label for="username" class="sr-only">Masukkan Username</label>
                    <input type="type" id="username" name="username" class="form-control" placeholder="Masukkan Username" required autofocus><br>
                    <label for="password" class="sr-only">Masukkan Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required><br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Masuk</button>
                    <?php echo form_close() ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/js/sb-admin-2.min.js')?>"></script>

</body>

</html>
