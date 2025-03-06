<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="col-4" style="float: right;">
            <div class="card">
                <div class="card-header bg-primary text-white">Daftar Harga</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light">TV : Rp4.200.000</li>
                    <li class="list-group-item bg-light">Kulkas : Rp3.100.000</li>
                    <li class="list-group-item bg-light">Mesin Cuci : Rp3.800.000</li>
                </ul>
                <div class="card-footer bg-primary text-white">Harga Dapat Berubah Setiap Saat</div>
            </div>
        </div>

        <div class="col-8">
            <div class="header">
                <header class="border-bottom">
                    <h3>Belanja Online</h3>
                </header>
            </div>
            <div class="col-8 align-middle">
                <form method="POST" action="form-belanja.php">
                    <div class="form-group row text-end mt-3">
                        <label for="nama" class="col-4 col-form-label">Customer</label>
                        <div class="col-8">
                            <input id="nama" name="nama" type="text" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="produk" class="col-4 text-end">Pilih Produk</label>
                        <div class="col-8">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="produk" id="produk1" type="radio" class="custom-control-input" value="TV" required>
                                <label for="produk1" class="custom-control-label">TV</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="produk" id="produk2" type="radio" class="custom-control-input" value="Kulkas" required>
                                <label for="produk2" class="custom-control-label">Kulkas</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="produk" id="produk3" type="radio" class="custom-control-input" value="Mesin Cuci" required>
                                <label for="produk3" class="custom-control-label">Mesin Cuci</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row text-end mt-3">
                        <label for="jumlah" class="col-4 col-form-label">Jumlah</label>
                        <div class="col-4">
                            <input id="jumlah" name="jumlah" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="proses" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr />

        <?php
        // Menangkap Data dari Form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_customer = $_POST["nama"];
            $produk_pilihan = $_POST["produk"];
            $jumlah_beli = $_POST["jumlah"];
            $harga = 0;

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

            // Menampilkan hasil belanja
            echo "<div class='mt-4 p-4 border rounded bg-light'>";
            echo "<h4>Detail Pembelian:</h4>";
            echo "<p><strong>Nama Customer:</strong> $nama_customer</p>";
            echo "<p><strong>Produk Dipilih:</strong> $produk_pilihan</p>";
            echo "<p><strong>Jumlah Beli:</strong> $jumlah_beli</p>";
            echo "<p><strong>Total Harga:</strong> Rp" . number_format($total_belanja, 0, ',', '.') . "</p>";
            echo "</div>";
        }
        ?>

    </div>
</body>

</html>