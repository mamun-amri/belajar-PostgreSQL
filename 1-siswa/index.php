<?php
require_once 'koneksi.php';
if (isset($_REQUEST['act']) == 'hapus') {
    $id = $_REQUEST['id'];
    $query = pg_fetch_row(pg_query($dbconn, "DELETE FROM siswa WHERE id='$id'"));
    if ($query) {
        echo '<script>alert("berhasil hapus data")</script>';
        header('location:index.php');
    } else {
        echo '<script>alert("gagal hapus data")</script>';
        header('location:index.php');
    }
}
if (isset($_GET['cari'])) {
    $kata = $_GET['cari'];
    $cari = pg_query($dbconn, "SELECT * FROM siswa WHERE 
        nama LIKE '%$kata%' or
        email LIKE '%$kata%' or
        nohp LIKE '%$kata%' or
        kelas LIKE '%$kata%' or
        umur LIKE '%$kata%'
");
    if (!$cari) {
        echo "An error occurred.\n";
    }
} else {
    $cari = pg_query($dbconn, "SELECT * FROM siswa");
    if (!$cari) {
        echo "An error occurred.\n";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Data Siswa</title>
</head>

<body>
    <div class="container mt-5">
        <a href="form.php?act=tambah" class="btn btn-primary">Tambah</a>
        <a href="datadummy.php" class="btn btn-primary">Tambah Dummy</a>
        <a href="print/cetak.php" target="_blank" class="btn btn-info">Cetak</a>
        <a href="print/laporan.php" target="_blank" class="btn btn-info">Data</a>
        <form action="index.php" method="get" class="mt-2">
            <input type="text" class="form-control-md" name="cari" placeholder="cari">
            <button type="submit" class="btn btn-light">Cari</button>
        </form>
        <br>
        <table class="table table-responsive-sm table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Kelas</th>
                    <th>Usia</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $a = 1;
                while ($isi = pg_fetch_array($cari)) :
                ?>
                    <tr>
                        <td><?= $a ?></td>
                        <td><?= $isi['nama'] ?></td>
                        <td><?= $isi['email'] ?></td>
                        <td><?= $isi['nohp'] ?></td>
                        <td><?= $isi['kelas'] ?></td>
                        <td><?= $isi['umur'] ?></td>
                        <td>
                            <a href="form.php?act=edit&id=<?= $isi['id'] ?>" class="btn btn-primary">edit</a>
                            <a href="index.php?act=hapus&id=<?= $isi['id'] ?>" class="btn btn-info" onclick="return confirm('Hapus Data?')">hapus</a>
                        </td>
                    </tr>
                <?php
                    $a++;
                endwhile;
                pg_close($dbconn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="js/jquery-3.6.0.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
    <script src="js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>