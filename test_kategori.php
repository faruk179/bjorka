<?php

include 'config/database.php';

$q = mysqli_query($conn,"SELECT * FROM kategori");

echo "Jumlah Data : ".mysqli_num_rows($q);
echo "<hr>";

while($r = mysqli_fetch_assoc($q)){
    echo $r['id_kategori']." - ".$r['nama_kategori']."<br>";
}