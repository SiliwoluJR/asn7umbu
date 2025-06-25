<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM penjualan WHERE id_transaksi=$id");
header("Location: index.php");
?>