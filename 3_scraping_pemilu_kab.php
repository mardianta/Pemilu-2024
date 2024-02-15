<?php

// Folder utama
$folder_utama = 'data_json';

// Mendapatkan daftar file dan folder di dalam folder utama
$daftar_item = scandir($folder_utama);

// Menginisialisasi array untuk menyimpan nama subfolder
$subfolder_names = array();

// Loop melalui setiap item
foreach ($daftar_item as $item) {
    // Memeriksa apakah item adalah folder dan bukan "." atau ".."
    if (is_dir($folder_utama . '/' . $item) && $item != '.' && $item != '..') {
        // Menyimpan nama folder ke dalam array
        $subfolder_names[] = $item;
        // URL JSON yang akan di-scrap
// $json_url = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/0.json';
$kode_prov = $item;
$json_url = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'.json';

// Mengambil data dari URL JSON
$json_data = file_get_contents($json_url);

// Mendecode data JSON menjadi array PHP
$data = json_decode($json_data, true);

// Memeriksa apakah pengambilan data berhasil
if ($data === null) {
    echo "Gagal mendapatkan atau mengurai data JSON.";
} else {
    foreach ($data as $kab) {
        // Membuat folder berdasarkan nama kode
        $folder_path_kab = "data_json/".$kode_prov.'/'.$kab['kode'];
        if (!is_dir($folder_path_kab)) {
            mkdir($folder_path_kab);
        }

        $json_url_kab = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'/'.$kab['kode'].'.json';
        $json_data_kab = file_get_contents($json_url_kab);
        // $json_kab_string = json_encode($json_data_kab, JSON_PRETTY_PRINT);

        $file_path_kab = $folder_path_kab.'/ppwp_0_'.$kode_prov.'_'.$kab['kode'].'.json';
    
        // Menyimpan data ke dalam file
        if (file_put_contents($file_path_kab, $json_data_kab)) {
            echo "Data telah disimpan ke dalam file JSON.";
            // var_dump($file_path_prov);
            // end();
        } else {
            echo "Gagal menyimpan data ke dalam file JSON.";
            var_dump($file_path_prov);
            end();
        }
    }
}
    }
}

// Menampilkan array nama subfolder
print_r($subfolder_names);


?>
