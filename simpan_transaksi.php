<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $jenisBahanBakar = htmlspecialchars($_POST['jenisBahanBakar']);
    $jumlah = htmlspecialchars($_POST['jumlah_liter']);
    $harga = htmlspecialchars($_POST['harga_liter']);
    $total = htmlspecialchars($_POST['total_harga']);
    $waktu = htmlspecialchars($_POST['waktu']);

    $pesan = "Nama: $name\nEmail: $email\nJenis Bahan Bakar: $jenisBahanBakar\nJumlah: $jumlah\nHarga: $harga\nTotal: $total\nWaktu: $waktu\n\n";
    file_put_contents('transaksi.txt', $pesan, FILE_APPEND);

    echo "<script>alert('Transaksi berhasil disimpan.'); window.location.href = 'transaksi.txt';</script>";
}
?>
