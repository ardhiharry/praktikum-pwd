<?php

  $conn = mysqli_connect("localhost", "root", "root", "praktikum");

  if (!$conn) {
    die("Failed connect to database: " . mysqli_connect_error());
  }

  function query($query) {

    global $conn;

    $result = mysqli_query($conn, $query);

    $data = [];

    while( $row = mysqli_fetch_assoc($result) ) {
      $data[] = $row;
    }

    return $data;
  }

  function tambah($data) {

    global $conn;

    // ambil data tiap element dalam form
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $prodi = htmlspecialchars($data["prodi"]);

    // query insert data
    $query = "INSERT INTO mahasiswa VALUES(
      '', '$nama', '$alamat', '$no_telp', '$prodi'
    )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  function edit($data) {

    global $conn;

      // ambil data tiap element dalam form
      $id = $data["id_mahasiswa"];
      $nama = htmlspecialchars($data["nama"]);
      $alamat = htmlspecialchars($data["alamat"]);
      $no_telp = htmlspecialchars($data["no_telp"]);
      $prodi = htmlspecialchars($data["prodi"]);

      // query insert data
      $query = "UPDATE mahasiswa SET
        nama ='$nama',
        alamat = '$alamat',
        no_telp = '$no_telp',
        prodi = '$prodi'
        WHERE id_mahasiswa = $id
      ";

      mysqli_query($conn, $query);

      return mysqli_affected_rows($conn);

  }

  function delete($id) {

    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa = $id");

    return mysqli_affected_rows($conn);
  }