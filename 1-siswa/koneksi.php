<?php
// konfigurasi koneksi
$host       =  "localhost";
$dbuser     =  "postgres";
$dbpass     =  "ADMIN";
$port       =  "5432";
$dbname    =  "latihan";

// $pg_options = "--client_encoding=UTF8";

// $connection_string = "host={$host} port={$port} dbname={$dbname} user={$dbuser} password={$dbpass} options='{$pg_options}'";
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$dbuser} password={$dbpass}";
$dbconn = pg_connect($connection_string);


// if ($dbconn) {
//     echo "Connected to " . pg_host($dbconn);
// } else {
//     echo "Error in connecting to database.";
// }
