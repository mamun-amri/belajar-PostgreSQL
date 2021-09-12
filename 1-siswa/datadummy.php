<?php
include 'koneksi.php';
require_once 'vendor_datadummy/autoload.php';

use Faker\Factory;

$faker = Factory::create('id_ID');

for ($i = 1; $i <= 10; $i++) {
    $nama = $faker->name;
    $alamat = $faker->address;
    $email = $faker->email;
    $nohp = $faker->phoneNUmber;
    $umur = $faker->numberBetween(25, 40);
    $kelas = 3;
    $query = "INSERT INTO siswa (nama,email,nohp,kelas,umur) 
    VALUES ('$nama','$email','$nohp','$kelas','$umur')";
    $result = pg_query($dbconn, $query);
}
echo '<script>alert("tambah data berhasil")</script>';
header("location:index.php");
