<style>
    tr:nth-child(even) {
        background-color: rgba(240, 183, 54, 0.4);
    }

    tr {
        border: 1px solid #292627;
    }

    th {
        background-color: #292627;
        color: #f0b736;
        font-weight: 400;
        padding-left: 5px;
        padding-right: 5px;
        text-align: center;
    }

    td {
        padding-left: 4px;
        padding-right: 4px;
    }

    td #validasi-button {
        color: #30b512;
    }

    hr {
        width: 27%;
        border: solid 1px;

    }

    .scrollmenu {
        overflow-x: auto;
        overflow-y: hidden;
        display: inline-flex;
        flex-direction: column-reverse;
        width: 100%;
    }

    .scrollmenu table {
        width: max-content;
    }
</style>
<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "data_survey";

$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk memvalidasi data
function validasiData($id_barang)
{
    global $conn;
    $sql = "UPDATE data_barang_pahing SET status_validasi = 'true' WHERE id_barang = $id_barang";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        $message = "Data berhasil divalidasi";
        echo "<div id='floating-message' style='position: fixed; top: 5%; left: 50%; transform: translate(-50%, -50%); background-color: green; color: white; padding: 10px; border-radius: 5px;'>" . $message . "</div>";
        echo "<script>
                setTimeout(function() {
                    var elem = document.getElementById('floating-message');
                    elem.remove();
                }, 1000);
              </script>";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
        echo "<div id='floating-message' style='position: fixed; top: 5%; left: 50%; transform: translate(-50%, -50%); background-color: red; color: white; padding: 10px; border-radius: 5px;'>" . $message . "</div>";
        echo "<script>
                setTimeout(function() {
                    var elem = document.getElementById('floating-message');
                    elem.remove();
                }, 1000);
              </script>";
    }
    header("location:{$_SERVER['HTTP_REFERER']}");
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['floating_message'])) {
    $message = $_SESSION['floating_message'];
    echo "<div id='floating-message' style='position: fixed; top: 5%; left: 50%; transform: translate(-50%, -50%); background-color: green; color: white; padding: 10px; border-radius: 5px;'>" . $message . "</div>";
    echo "<script>
            setTimeout(function() {
                var elem = document.getElementById('floating-message');
                elem.remove();
            }, 1000);
          </script>";
    // Unset the session variable to clear the message
    unset($_SESSION['floating_message']);
}

// Tampilkan form untuk memvalidasi data
if (isset($_GET['action']) && $_GET['action'] == 'validasi') {
    $id_barang = $_GET['id'];
    echo validasiData($id_barang);
}

// Tampilkan daftar data yang perlu divalidasi
$sql = "SELECT * FROM data_barang_pahing WHERE status_validasi = 'pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<center>";
    echo "<h2>Data yang perlu divalidasi:</h2>";
    echo "<hr>";
    echo "</center>";
    echo "<div style='overflow-x:auto;' class='scrollmenu'>";
    echo "<table border='1'>";
    echo "<tr><th>ID Barang</th><th>Nama Barang</th><th>Tanggal</th><th>Harga Kemarin</th><th>Harga Sekarang</th><th>Selisih</th><th>Lokasi</th><th>Status Validasi</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_barang'] . "</td>";
        echo "<td>" . $row['nama_barang'] . "</td>";
        echo "<td>" . $row['tanggal'] . "</td>";
        echo "<td>" . $row['harga_kemarin'] . "</td>";
        echo "<td>" . $row['harga_sekarang'] . "</td>";
        echo "<td>" . $row['selisih'] . "</td>";
        echo "<td>" . $row['lokasi'] . "</td>";
        echo "<td>" . $row['status_validasi'] . "</td>";
        echo "<td><a id='validasi-button' href='../admin/includes/pasar_pahing.php?action=validasi&id=" . $row['id_barang'] . "'>Validasi</a> | <a id='edit-button' href='?action=edit&id=" . $row['id_barang'] . "&source=edit_pahing'>Edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "Tidak ada data yang perlu divalidasi";
}

$conn->close();
?>