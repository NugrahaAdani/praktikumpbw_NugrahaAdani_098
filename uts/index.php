<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi mahasiswa</title>
</head>
<body>
    <form action="proses.php" method="post">
        <div>
            <label>Nama: </label>
            <input type="text" name="nama" placeholder="Masukan nama anda" required>
        </div>

        <div>
            <label>NPM: </label>
            <input type="number" name="npm" maxlength="20" placeholder="Masukan NPM" required>
        </div>

        <div>
            <label>E-mail</label>
            <input type="email" name="email" placeholder="Masukan E-mail" required>
        </div>

        <div>
            <label>Jenis Layanan:</label>
                <input type="radio" name="jl" value="Prioritas">
                    <span>Prioritas</span>
                <input type="radio" name="jl" value="Reguler" checked>
                    <span>Reguler</span>
        </div>
    
        <div>
            <label>Barang:</label>
            <input type="checkbox" name="barang" value="pulpen">
            <span>Pulpen</span>
            <input type="checkbox" name="barang" value="spidol">
            <span>Spidol</span>
            <input type="checkbox" name="barang" value="pensil">
            <span>Pensil</span>
            <input type="checkbox" name="barang" value="penghapus">
            <span>Penghapus</span>
            <input type="checkbox" name="barang" value="Penggaris">
            <span>Penggaris</span>
        </div>

        <div>
            <label>Jumlah barang</label>
            <input type="number" name="jb" min="1" placeholder="Masukan Jumlah barang">
        </div>

        <div>
            <button class="btn" >Submit</button>
        </div>

    </form>


</body>
</html>