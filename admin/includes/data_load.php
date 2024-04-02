<?php
// load_data.php

// Koneksi ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'data_survey');

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Ambil tanggal dari parameter GET
$tanggal = $_GET['tanggal'];

// Lakukan kueri data berdasarkan tanggal
$query = "SELECT * FROM data_barang_bandar WHERE tanggal = '$tanggal'";
$result = mysqli_query($koneksi, $query);

// Tampilkan hasil dalam bentuk HTML
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Harga Lama</th>
                <th>Harga Baru (Rp)</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['nama_barang'] . "</td>";
        echo "<td>" . $row['tanggal'] . "</td>";
        echo "<td>" . $row['harga_kemarin'] . "</td>";
        echo "<td>" . $row['harga_sekarang'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada data yang ditemukan untuk tanggal $tanggal</p>";
}

// Tutup koneksi
mysqli_close($koneksi);
