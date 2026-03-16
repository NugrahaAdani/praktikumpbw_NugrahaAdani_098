<?php 
    echo "Hello hi";
    $nama = "nugi";
    $umur = 19;

    class mahasiswa {
        public $nama;

        public function sapa(){
            return "Halo, saya" . $this->nama;
        }
    }

    echo "Nama saya " . $nama . ", umur saya ". $umur . " tahun";
    define("Prodi", "Informatika");
    echo "<br>saya kuliah di " . Prodi;
    echo defined("Prodi") ? "<br>konstanta prodi sudah di definisikan." : "<br> konstanta prodi belum di definisikan.";
    var_dump($nama)
?>