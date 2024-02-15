<?php
// URL JSON yang akan di-scrap
// $json_url = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/0.json';
$kode_prov = 35;
$kode_kab = 3502;
$json_url = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'.json';

// Mengambil data dari URL JSON
// $json_data = file_get_contents($json_url);

// Mendecode data JSON menjadi array PHP
// $data = json_decode($json_data, true);

// Memeriksa apakah pengambilan data berhasil
// if ($data === null) {
//     echo "Gagal mendapatkan atau mengurai data JSON.<br>";
// } else {
//     foreach ($data as $kab) {
//         // Membuat folder berdasarkan nama kode
        $folder_path_kab = "data_json/".$kode_prov.'/'.$kode_kab;
//         if (!is_dir($folder_path_kab)) {
//             mkdir($folder_path_kab);
//         }

        $json_url_kab = 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'/'.$kode_kab.'.json';
        $json_data_kab = file_get_contents($json_url_kab);
        $json_kab_string = json_decode($json_data_kab, true);

        $file_path_kab = $folder_path_kab.'/ppwp_0_'.$kode_prov.'_'.$kode_kab.'.json';
    
        // Menyimpan data ke dalam file
        if (file_put_contents($file_path_kab, $json_data_kab)) {
            echo "Data Kab. ".$kode_kab." telah disimpan ke dalam file JSON.<br>";
            
        } else {
            echo "Gagal menyimpan data ke dalam file JSON.<br>";
            var_dump($file_path_prov);
            end();
        }

        foreach ($json_kab_string as $kec) {
            // Membuat folder berdasarkan nama kode
            $folder_path_kec = "data_json/".$kode_prov.'/'.$kode_kab.'/'.$kec['kode'];
            if (!is_dir($folder_path_kec)) {
                mkdir($folder_path_kec);
            }
    
            $json_url= 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'/'.$kode_kab.'/'.$kec['kode'].'.json';
            $json_data = file_get_contents($json_url);
            $json_data_string = json_decode($json_data, true);
    
            $file_path_kec = $folder_path_kec.'/ppwp_0_'.$kode_prov.'_'.$kode_kab.'_'.$kec['kode'].'.json';
        
            // Menyimpan data ke dalam file
            if (file_put_contents($file_path_kec, $json_data)) {
                echo "Data Kec.".$kec['nama'].$kec['kode']." Kab. ".$kode_kab."telah disimpan ke dalam file JSON.<br>";
                // var_dump($json_data);
                // end();
            } else {
                echo "Gagal menyimpan data ke dalam file JSON.<br>";
                var_dump($file_path_kec);
                end();
            }
            foreach ($json_data_string as $kel) {
                // Membuat folder berdasarkan nama kode
                $folder_path_kel = "data_json/".$kode_prov.'/'.$kode_kab.'/'.$kec['kode'].'/'.$kel['kode'];
                if (!is_dir($folder_path_kel)) {
                    mkdir($folder_path_kel);
                }
        
                $json_url= 'https://sirekap-obj-data.kpu.go.id/wilayah/pemilu/ppwp/'.$kode_prov.'/'.$kode_kab.'/'.$kec['kode'].'/'.$kel['kode'].'.json';
                $json_data = file_get_contents($json_url);
                $json_data_string = json_decode($json_data, true);
        
                $file_path_kel = $folder_path_kel.'/ppwp_0_'.$kode_prov.'_'.$kode_kab.'_'.$kec['kode'].'_'.$kel['kode'].'.json';
            
                // Menyimpan data ke dalam file
                if (file_put_contents($file_path_kel, $json_data)) {
                    // echo "Data telah disimpan ke dalam file JSON.<br>";
                    // var_dump($file_path_prov);
                    // end();
                } else {
                    echo "Gagal menyimpan data ke dalam file JSON.<br>";
                    var_dump($file_path_kel);
                    end();
                }

                foreach ($json_data_string as $tps) {
                    // Membuat folder berdasarkan nama kode
                    $folder_path_tps = "data_json/".$kode_prov.'/'.$kode_kab.'/'.$kec['kode'].'/'.$kel['kode'].'/'.$tps['kode'];
                    if (!is_dir($folder_path_tps)) {
                        mkdir($folder_path_tps);
                    }
            
                    $json_url= 'https://sirekap-obj-data.kpu.go.id/pemilu/hhcw/ppwp/'.$kode_prov.'/'.$kode_kab.'/'.$kec['kode'].'/'.$kel['kode'].'/'.$tps['kode'].'.json';
                    $json_data = file_get_contents($json_url);
                    // $json_data_string = json_decode($json_data, true);
            
                    $file_path_tps = $folder_path_tps.'/ppwp_0_'.$kode_prov.'_'.$kode_kab.'_'.$kec['kode'].'_'.$kel['kode'].'_'.$tps['kode'].'.json';
                
                    // Menyimpan data ke dalam file
                    if (file_put_contents($file_path_tps, $json_data)) {
                        // echo "Data telah disimpan ke dalam file JSON.<br>";
                        // var_dump($file_path_prov);
                        // end();
                    } else {
                        echo "Gagal menyimpan data ke dalam file JSON.<br>";
                        var_dump($file_path_tps);
                        end();
                    }
                }
            }
        }


    // }
// }
?>
