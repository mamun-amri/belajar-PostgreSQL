<?php
include 'koneksi.php';
if ($_REQUEST['act'] == 'edit') {
    $id = $_REQUEST['id'];
    $row = pg_fetch_assoc(pg_query($dbconn, "SELECT * FROM siswa WHERE id='$id'"));

    $id = $row['id'];
    $nama = $row['nama'];
    $email = $row['email'];
    $nohp = $row['nohp'];
    $kelas = $row['kelas'];
    $umur = $row['umur'];
    $act = "edit";
} else {
    $id = '';
    $nama = '';
    $email = '';
    $nohp = '';
    $kelas = '';
    $umur = '';
    $act = 'tambah';
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <form method="POST" action="proses.php?act=<?= $act ?>">
                        <div class="form-group">
                            <label for="nama"><?= ucfirst("nama") ?></label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" required>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="email"><?= ucfirst("email") ?></label>
                            <input type="email" class="form-control" id="email" name="email" required value="<?= $email ?>">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="nohp"><?= ucfirst("nohp") ?></label>
                            <input type="text" class="form-control" id="nohp" name="nohp" required value="<?= $nohp ?>">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="kelas"><?= ucfirst("kelas") ?></label>
                            <input type="number" class="form-control" id="kelas" name="kelas" required value="<?= $kelas ?>">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="umur"><?= ucfirst("umur") ?></label>
                            <input type="number" class="form-control" id="umur" name="umur" required value="<?= $umur ?>">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="js/jquery-3.6.0.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
    <script src="js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>