<?php

function koneksi()
{
  $host = "localhost";
  $user = "root";
  $pass = "";
  $db   = "db_mahasiswa";
  return mysqli_connect($host, $user, $pass, $db);
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // Jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  // Jika hasilnya lebih dari 1 data
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
