<?php
// URL JSON yang akan di-scrap
// $json_url = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/0.json';
$kode_prov = 35;
$kode_kab = 3578;
$json_url = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'/'.$kode_kab.'.json';

// Mengambil data dari URL JSON
$json_data = file_get_contents($json_url);

// Mendecode data JSON menjadi array PHP
$data = json_decode($json_data, true);

// Memeriksa apakah pengambilan data berhasil
if ($data === null) {
    echo "Gagal mendapatkan atau mengurai data JSON.";
} else {
    foreach ($data as $kec) {
        // Membuat folder berdasarkan nama kode
        $folder_path_kec = "data_json/".$kode_prov.'/'.$kode_kab.'/'.$kec['kode'];
        if (!is_dir($folder_path_kec)) {
            mkdir($folder_path_kec);
        }

        $json_url= 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'/'.$kode_kab.'/'.$kec['kode'].'.json';
        $json_data = file_get_contents($json_url);
        $json_data_string = json_encode($json_data, JSON_PRETTY_PRINT);

        $file_path_kec = $folder_path_kec.'/ppwp_0_'.$kode_prov.'_'.$kode_kab.'_'.$kec['kode'].'.json';
    
        // Menyimpan data ke dalam file
        if (file_put_contents($file_path_kec, $json_data_string)) {
            echo "Data telah disimpan ke dalam file JSON.";
            // var_dump($file_path_prov);
            // end();
        } else {
            echo "Gagal menyimpan data ke dalam file JSON.";
            var_dump($file_path_kec);
            end();
        }
    }
}
?>
