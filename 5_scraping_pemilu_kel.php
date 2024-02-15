<?php
// URL JSON yang akan di-scrap
// $json_url = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/0.json';
$kode_prov = 11;
$kode_kab = 1101;
$kode_kec = 110101;
$json_url = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'/'.$kode_kab.'/'.$kode_kec.'.json';

// Mengambil data dari URL JSON
$json_data = file_get_contents($json_url);

// Mendecode data JSON menjadi array PHP
$data = json_decode($json_data, true);

// Memeriksa apakah pengambilan data berhasil
if ($data === null) {
    echo "Gagal mendapatkan atau mengurai data JSON.";
} else {
    foreach ($data as $kel) {
        // Membuat folder berdasarkan nama kode
        $folder_path_kel = "data_json/".$kode_prov.'/'.$kode_kab.'/'.$kode_kec.'/'.$kel['kode'];
        if (!is_dir($folder_path_kel)) {
            mkdir($folder_path_kel);
        }

        $json_url= 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'/'.$kode_kab.'/'.$kode_kec.'/'.$kel['kode'].'.json';
        $json_data = file_get_contents($json_url);
        $json_data_string = json_encode($json_data, JSON_PRETTY_PRINT);

        $file_path_kel = $folder_path_kel.'/ppwp_0_'.$kode_prov.'_'.$kode_kab.'_'.$kode_kec.'_'.$kel['kode'].'.json';
    
        // Menyimpan data ke dalam file
        if (file_put_contents($file_path_kel, $json_data_string)) {
            echo "Data telah disimpan ke dalam file JSON.";
            // var_dump($file_path_prov);
            // end();
        } else {
            echo "Gagal menyimpan data ke dalam file JSON.";
            var_dump($file_path_kel);
            end();
        }
    }
}
?>
