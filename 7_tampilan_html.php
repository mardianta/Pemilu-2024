<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data JSON</title>
</head>
<body>

<?php
// Path file JSON
$kode_prov = 11;
$kode_kab = 1101;
$kode_kec = 110101;
$kode_kel = 1101012001;
$kode_tps = 1101012001003;
$folder_path_tps = "data_json/".$kode_prov.'/'.$kode_kab.'/'.$kode_kec.'/'.$kode_kel.'/'.$kode_tps;
$file_path_tps = $folder_path_tps.'/ppwp_0_'.$kode_prov.'_'.$kode_kab.'_'.$kode_kec.'_'.$kode_kel.'_'.$kode_tps.'.json';

// Membaca isi file JSON
$json_data = file_get_contents($file_path_tps);

// Mendecode data JSON menjadi array PHP
$data = json_decode($json_data, true);

// Memeriksa apakah penguraian data berhasil
if ($data === null) {
    echo "Gagal mengurai data JSON.";
} else {
    // Menampilkan data dalam HTML
    echo "<h1>Data JSON</h1>";
    echo "<p>Prov: ".$kode_prov."</p>";
    echo "<p>Prov: ".$kode_kab."</p>";
    echo "<p>Prov: ".$kode_kec."</p>";
    echo "<p>Prov: ".$kode_kel."</p>";
    echo "<p>Prov: ".$kode_tps."</p>";
    echo "<ul>";
    echo "chart:".$data['ts'];
    echo "<br>chart:".$data['chart'];
    echo "<br>images:".$data['images'][0];
    echo "<br>ts:".$data['ts'];
    echo "<br>status_suara:".$data['status_suara'];
    echo "<br>status_adm:".$data['status_adm'];
    // echo "chart:".$data['chart'];
    // var_dump($data);
        // end();
    
    echo "</ul>";
}
?>

</body>
</html>
