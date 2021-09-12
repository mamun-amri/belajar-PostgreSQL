<?php
include 'koneksi.php';
if ($_REQUEST['act'] == 'tambah') {
    $cek = pg_fetch_row(pg_query($dbconn, "SELECT * FROM siswa WHERE email='$_POST[email]'"));
    if ($cek) {
        echo '<script>alert("email sudah terdaftar")</script>';
        header('location:form.php?act=tambah');
    } else {
        $query = "INSERT INTO siswa (nama,email,nohp,kelas,umur) 
    VALUES ('$_POST[nama]','$_POST[email]','$_POST[nohp]','$_POST[kelas]','$_POST[umur]')";
        $result = pg_query($dbconn, $query);
        if ($query) {
            echo '<script>alert("tambah data berhasil")</script>';
            header('location:index.php');
        }
    }
} else {
    $row = pg_query($dbconn, "UPDATE siswa SET  id        = '$_POST[id]',
                                                nama      = '$_POST[nama]',
                                                email     = '$_POST[email]',
                                                nohp      = '$_POST[nohp]',
                                                kelas     = '$_POST[kelas]',
                                                umur      = '$_POST[umur]'
                                           WHERE id       = '$_POST[id]'
                                                ");
    if ($row) {
        echo '<script>alert("update berhasil")</script>';
        header('location:index.php');
    } else {
        echo '<script>alert("update gagal!")</script>';
        header("location:form.php?act=edit&id=$_POST[id]");
    }
}
