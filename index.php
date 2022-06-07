<?php

  session_start();

  if( isset($_SESSION["username"]) ) {
    echo "
      <div class='d-flex justify-content-between mt-2'>
      <h5 class='d-inline-block'>Hi, " . $_SESSION["username"] . "</h5>" .
      "<a href='logout.php' class='btn btn-danger'>Sign out</a>" .
      "</div>"
    ;
  } else {
    header("Location: login.php");
  }

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
      <h1>Daftar Mahasiswa</h1>

      
      <div class="row">
        <div class="col-md-8">
          <h3 class="d-flex justify-content-end">
            <a href="tambah.php" class="btn btn-success">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
              </svg>
              Tambah Mahasiswa
            </a>
          </h3>

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