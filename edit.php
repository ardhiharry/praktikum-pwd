<?php

  require './functions/connect.php';

  // ambil data di URL
  $id = $_GET["id"];

  // query data mahasiswa berdasarkan id
  $mahasiswa = query("SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id'")[0];

  // cek tombol submit
  if( isset($_POST["submit"]) ) {

    // cek data berhasil diubah atau tidak
    if( edit($_POST) > 0 ) {

      echo "
        <script>
          alert('data berhasil diubah');
          document.location.href = 'index.php';
        </script>
      ";

    } else {

      echo "
        <script>
          alert('data gagal diubah');
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
    <title>Ubah Data Mahasiswa</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  
  </head>
  
  <body>
  
    <div class="container">
      <h1 class="mt-3">Tambah Data Mahasiswa</h1>

      <div class="row">
        <div class="col-md-8">
          <form action="" method="post">
            <input type="hidden" name="id_mahasiswa" value="<?php echo $mahasiswa["id_mahasiswa"]; ?>" >
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $mahasiswa["nama"]; ?>" >
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $mahasiswa["alamat"]; ?>" >
            </div>
            <div class="mb-3">
              <label for="no_telp" class="form_label">No. Telp</label>
              <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $mahasiswa["no_telp"]; ?>" >
            </div>
            <div class="mb-3">
              <label for="prodi" class="form-label">Prodi</label>
              <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $mahasiswa["prodi"]; ?>" >
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Edit Data</button>
          </form>
        </div>
      </div>
    </div>
  
  </body>
  
</html>