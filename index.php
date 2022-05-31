<?php

  require './functions/connect.php';
  
  $data_mahasiswa = query("SELECT * FROM mahasiswa")

?>

<!DOCTYPE html>
<html lang="en">
  
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum PWD</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  
  </head>
  
  <body>
  
    <div class="container">
      <h1 class="mt-3"">Daftar Mahasiswa</h1>

      <h3><a href="tambah.php">Tambah Mahasiswa</a></h3>

      <div class="row">
        <div class="col-md-8">
          <table class="table table-hover">
            <thead class="table-primary">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Prodi</th>
                <th>Aksi</th>
              </tr>
            </thead>
      
            <tbody>
              <?php $no = 1; ?>
              <?php foreach( $data_mahasiswa as $mahasiswa ) : ?>
                <tr>
                  <th><?= $no; ?></th>
                  <th><?= $mahasiswa["nama"]; ?></th>
                  <td><?= $mahasiswa["alamat"]; ?></td>
                  <td><?= $mahasiswa["no_telp"]; ?></td>
                  <td><?= $mahasiswa["prodi"]; ?></td>
                  <td><a href="edit.php?id=<?= $mahasiswa["id_mahasiswa"]; ?>" class="btn btn-success">Edit</a> <a href="delete.php?id=<?php echo $mahasiswa["id_mahasiswa"]; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin menghapus data?');" >Delete</a></td>
                </tr>
                <?php $no++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <script src="./js/bootstrap.bundle.min.js"></script>
  
  </body>
  
</html>