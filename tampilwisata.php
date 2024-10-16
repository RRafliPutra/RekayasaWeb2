<?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// alamat localhost untuk file getwisata.php, sambil hasil export JSON
$send = curl("http://localhost/rekayasaweb/praktikum2/getwisata.php");

//mengubah JSON menjadi array
$data = json_decode($send, TRUE);

// Cek apakah data tersedia
if ($data && is_array($data)) {
    // Membuat tabel HTML
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>KOTA</th>
            <th>LANDMARK</th>
            <th>TARIF</th>
          </tr>";

// Looping untuk menampilkan setiap baris data wisata
    foreach($data as $row){
        echo "<tr>";
        echo "<td>{$row['kota']}</td>";
        echo "<td>{$row['landmark']}</td>";
        echo "<td>{$row['tarif']}</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "Tidak ada data yang dapat ditampilkan.";
}
?>