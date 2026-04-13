<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
</head>
<body>

    <h2>Menu Navigasi</h2>
    <ul>
        <li><a href="?page=soal1">Soal 1</a></li>
        <li><a href="?page=soal2">Soal 2</a></li>
        <li><a href="?page=soal3">Soal 3</a></li>
        <li><a href="?page=soal4">Soal 4</a></li>
    </ul>

    <hr>

    <div>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
                case 'soal1':
                    include 'soal1.php';
                    break;
                case 'soal2':
                    include 'soal2.php';
                    break;
                case 'soal3':
                    include 'soal3.php';
                    break;
                case 'soal4':
                    include 'soal4.php';
                    break;
                default:
                    echo "Halaman tidak ditemukan";
            }
        } else {
            echo "Pilih soal";
        }
        ?>
    </div>

</body>
</html>