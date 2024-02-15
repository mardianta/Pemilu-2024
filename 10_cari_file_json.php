
<?php

function cariFileDalamFolder($folderPath, $isi) {
    $result = [];

    $files = scandir($folderPath);

    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;
            if (is_dir($filePath)) {
                $result = array_merge($result, cariFileDalamFolder($filePath, $isi));
            } elseif (is_file($filePath)) {
                $fileContent = file_get_contents($filePath);
                if (strpos($fileContent, $isi) !== false) {
                    $result[] = $filePath;
                }
            }
        }
    }

    return $result;
}

$folderPath = "data_json"; // Ganti dengan path folder Anda
$isiYangDicari = 'status_suara';

$filesWithContent = cariFileDalamFolder($folderPath, $isiYangDicari);
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Data JSON</title>";
echo "</head>";
echo "<body>";
echo "File yang mengandung isi tersebut: <br>";
echo "<table>";
echo "<tr>";
echo "<td>anies</td>";
echo "<td>prabowo</td>";
echo "<td>ganjar</td>";
echo "<td>file</td>";
echo "</tr>";
foreach ($filesWithContent as $file) {
    $json_data = file_get_contents($file);
    $data_ppwp_0 = json_decode($json_data, true);
    
    if($data_ppwp_0['chart'] != null){
        // var_dump($data_ppwp_0['chart']['100025']);
        // end();
        echo "<tr>";
        if(isset($data_ppwp_0['chart']['100025'])){
            echo "<td>".$data_ppwp_0['chart']['100025']."</td>";
        }
        else{
            echo "<td>-</td>";
        }
        if(isset($data_ppwp_0['chart']['100026'])){
            echo "<td>".$data_ppwp_0['chart']['100026']."</td>";
        }
        else{
            echo "<td>-</td>";
        }
        if(isset($data_ppwp_0['chart']['100027'])){
            echo "<td>".$data_ppwp_0['chart']['100027']."</td>";
        }
        else{
            echo "<td>-</td>";
        }
        echo "<td>".$file."</td>";
        // echo $file . "<br>";
        echo "</tr>";
        // var_dump($data_ppwp_0);
    // end();
    }
}
echo "</table>";
echo "</body>";
echo "</html>";

?>
