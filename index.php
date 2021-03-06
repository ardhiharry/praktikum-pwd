<?php

  session_start();

  if( isset($_SESSION["username"]) ) {
    echo "
      <nav class='navbar navbar-expand-lg navbar-dark bg-primary shadow-sm'>
        <div class='container'>
          <a class='navbar-brand' href='#home'><img src='./img/logo.svg' alt='Logo' width='55'></a>
          <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav ms-auto'>
              <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle active' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                  Hi, " . $_SESSION['username'] . "
                </a>
                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                  <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    ";
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
      
      
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h1 class="mt-3">Daftar Mahasiswa</h1>

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