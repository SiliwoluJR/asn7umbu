<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Transaksi</title></head>
<body>
<h2>Tambah Data Transaksi</h2>
<form method="post">
    Tanggal: <input type="date" name="tanggal" required><br>
    Nama Pelanggan: <input type="text" name="nama_pelanggan" required><br>
    Total Pembelian: <input type="number" name="total_pembelian" step="0.01" required><br>
    Metode Pembayaran:
    <select name="metode_pembayaran" required>
        <option>Cash</option>
        <option>Transfer</option>
        <option>QRIS</option>
    </select><br>
    <input type="submit" name="submit" value="Simpan">
</form>

<?php
if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama_pelanggan'];
    $total = $_POST['total_pembelian'];
    $metode = $_POST['metode_pembayaran'];

    $query = "INSERT INTO penjualan (tanggal, nama_pelanggan, total_pembelian, metode_pembayaran)
              VALUES ('$tanggal', '$nama', '$total', '$metode')";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>
</body>
</html>