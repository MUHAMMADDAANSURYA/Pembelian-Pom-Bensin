<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $jenis = htmlspecialchars($_POST['jenishbahanbakar']);
    $jumlah = htmlspecialchars($_POST['jumlah(liter)']);
    $harga = htmlspecialchars($_POST['harga(liter)']);
    $total = htmlspecialchars($_POST['totalharga']);
    $waktu = htmlspecialchars($_POST['waktu']);

    $pesan = "Nama: $name\nEmail: $email\nJumlahperLiter: $jenis\nJenisBahanBakar: $jumlah\nHargaperLiter: $harga\nTotalharga: $total\nWaktupesan: $waktu\n\n";
    file_put_contents('transaksi.txt', $pesan, FILE_APPEND);

    echo "Pesanan Sukses Terimakasih";
}
?>
