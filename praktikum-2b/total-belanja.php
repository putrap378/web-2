<?php
// buat variabel yang menerima value yang dikirim dari form
$nama_customer = $_POST["nama"] ?? "";
$produk_pilihan = $_POST["produk"] ?? "";
$jumlah_beli = $_POST["jumlah"] ?? 0;
$harga = 0;

// LOGIKA MENGHITUNG TOTAL HARGA
// Menentukan harga berdasarkan produk yang dipilih
if ($produk_pilihan == "TV") {
    $harga = 4200000;
} elseif ($produk_pilihan == "Kulkas") {
    $harga = 3100000;
} elseif ($produk_pilihan == "Mesin Cuci") {
    $harga = 3800000;
}

// Menghitung total belanja
$total_belanja = $harga * $jumlah_beli;

// mencetak belanjaan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<div class='mt-4 p-4 border rounded bg-light'>";
    echo "<h4>Detail Pembelian:</h4>";
    echo "<p><strong>Nama Customer:</strong> $nama_customer</p>";
    echo "<p><strong>Produk Dipilih:</strong> $produk_pilihan</p>";
    echo "<p><strong>Jumlah Beli:</strong> $jumlah_beli</p>";
    echo "<p><strong>Total Harga:</strong> Rp" . number_format($total_belanja, 0, ',', '.') . "</p>";
    echo "</div>";
}
?>