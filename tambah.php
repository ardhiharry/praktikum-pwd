<?php

  require './functions/connect.php';

  if( isset($_POST["submit"]) ) {

    // cek data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {

      echo "
      <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'index.php';
      </script>
      ";

    } else {

      echo "
      <script>
        alert('data gagal ditambahkan');
        document.location.href = 'index.php';
      </script>
      ";

    }
    
  }

?>

<!DOCTYPE html>
<html lang="en">
  
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  
  </head>
  
  <body>
  
    <div class="container">
      <h1 class="mt-3">Tambah Data Mahasiswa</h1>

      <div class="row">
        <div class="col-md-8">
          <form action="" method="post">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
              <label for="no_telp" class="form_label">No. Telp</label>
              <input type="text" class="form-control" id="no_telp" name="no_telp">
            </div>
            <div class="mb-3">
              <label for="prodi" class="form-label">Prodi</label>
              <input type="text" class="form-control" id="prodi" name="prodi">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
          </form>
        </div>
      </div>
    </div>
  
  </body>
  
</html>