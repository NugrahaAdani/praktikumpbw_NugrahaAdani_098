<?php
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $email = $_POST['email'];
    $jenisLayanan = $_POST['jl'];
    $barang = $_POST['barang'];
    $jumlahBarang = $_POST['jb'];
    define("pajak", 0.15);
    $daftarHarga = [
    'pulpen' => 50000,
    'spidol' => 10000,
    'pensil' => 3000,
    'penghapus' => 2000,
    'penggaris' => 15000
    ];
    
    // menghubungkan harga barang dengan barang
    $hargaBarang = $daftarHarga[$barang];

    // menghitung sub total
    $subtotal = $hargaBarang * $jumlahBarang;

    // menghitung pajak
    $pajak = $subtotal * pajak;

    if($jenisLayanan == 'Prioritas'){
        $biayaLayanan = 5000;
    }
    elseif($jenisLayanan == 'Reguler'){
        $biayaLayanan = 0;
    }

    $total =  $subtotal + $pajak + $biayaLayanan;

?>

    <h2>Data pemesanan</h2><hr>
    <p>Nama: <?php echo $nama; ?></p>
    <p>NPM: <?php echo $npm; ?></p>
    <p>E-mail: <?php echo $email; ?></p>
    <p>Jenis Layanan: <?php echo $jenisLayanan; ?></p>
    <p>Daftar Barang: <?php echo $barang; ?></p>
    <p>Subtotal: <?php echo $subtotal; ?></p>
    <p>Pajak: <?php echo $pajak; ?></p>
    <p>Biaya Layanan: <?php echo $biayaLayanan; ?></p>
    <p>Total: <?php echo $total; ?></p>