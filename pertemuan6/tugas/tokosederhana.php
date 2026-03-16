<?php
    $namaBarang = "Mouse";
    $harga = [75000, 100000, 87000];
    $jumlahBeli = 4;
    define("pajak", 0.10);

    $totalHarga = $harga[2] * $jumlahBeli;
    $hasilAkhir = $totalHarga * pajak;
    $totalBayar = $totalHarga + $hasilAkhir;
    
    echo "<h1>Perhitungan Total Pembelian</h1><hr>";
    echo "Nama Barang: " . $namaBarang;
    echo "<br>Harga Satuan: Rp " . number_format($harga[2], 0, ',', '.');
    echo "<br>Jumlah Beli: " . number_format($jumlahBeli, 0, ',', '.');
    echo "<br>Total Harga (Sebelum pajak): " . number_format($harga[2], 0, ',', '.') . " x " . number_format($jumlahBeli, 0, ',', '.') . " = Rp " . number_format($totalHarga, 0, ',', '.');
    echo "<br>Pajak (10%): Rp " . number_format($hasilAkhir, 0, ',', '.');
    echo "<br><b>Total Bayar: " . number_format($totalHarga, 0, ',', '.') . " + " . number_format($hasilAkhir, 0, ',', '.') . " = Rp " . number_format($totalBayar, 0, ',', '.');
?>