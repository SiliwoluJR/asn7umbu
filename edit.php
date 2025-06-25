<?php
include 'koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM penjualan WHERE id_transaksi=$id");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head><title>Edit Transaksi</title></head>
<body>
<h2>Edit Data Transaksi</h2>
<form method="post">
    Tanggal: <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required><br>
    Nama Pelanggan: <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan'] ?>" required><br>
    Total Pembelian: <input type="number" name="total_pembelian" value="<?= $data['total_pembelian'] ?>" step="0.01" required><br>
    Metode Pembayaran:
    <select name="metode_pembayaran" required>
        <option <?= $data['metode_pembayaran'] == 'Cash' ? 'selected' : '' ?>>Cash</option>
        <option <?= $data['metode_pembayaran'] == 'Transfer' ? 'selected' : '' ?>>Transfer</option>
        <option <?= $data['metode_pembayaran'] == 'QRIS' ? 'selected' : '' ?>>QRIS</option>
    </select><br>
    <input type="submit" name="update" value="Update">
</form>

<?php
if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal'];
    $nama = $_POST['nama_pelanggan'];
    $total = $_POST['total_pembelian'];
    $metode = $_POST['metode_pembayaran'];

    $query = "UPDATE penjualan SET 
        tanggal='$tanggal', nama_pelanggan='$nama',
        total_pembelian='$total', metode_pembayaran='$metode'
        WHERE id_transaksi=$id";

    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>
</body>
</html>