<?php
// URL JSON yang akan di-scrap
$json_url = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/0.json';

// Mengambil data dari URL JSON
$json_data = file_get_contents($json_url);

// Mendecode data JSON menjadi array PHP
$data = json_decode($json_data, true);

// Memeriksa apakah pengambilan data berhasil
if ($data === null) {
    echo "Gagal mendapatkan atau mengurai data JSON.";
} else {
    foreach ($data as $item) {
        // Membuat folder berdasarkan nama kode
        $folder_path = "data_json/".$item['kode'];
        if (!is_dir($folder_path)) {
            mkdir($folder_path);
        }
    }
    $file_path = 'data_json/ppwp_0.json';
    $json_string = json_encode($data, JSON_PRETTY_PRINT);
    
    // Menyimpan data ke dalam file
    if (file_put_contents($file_path, $json_string)) {
        echo "Data telah disimpan ke dalam file JSON.";
    } else {
        echo "Gagal menyimpan data ke dalam file JSON.";
    }
}
?>
