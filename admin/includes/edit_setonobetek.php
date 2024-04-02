<style>
    .card {
        display: block;
        /* position: relative; */
        width: auto;
        margin: auto auto;
        padding: 20px;
        border: none;
    }

    label {
        margin-bottom: 1rem;
    }

    input[type="text"] {
        border: solid 1px grey;
        border-radius: 5px;
        color: black;
    }

    input[type="submit"] {
        background-color: green;
        color: white;
        border: solid 1px green;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: white;
        color: green;
        border: solid 1px green;
    }

    input[type="submit"]:active {
        transform: translateY(-1.5px);
        box-shadow: none;
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    // Ambil data yang ingin diubah dari database
    $sql = "SELECT * FROM data_barang_setonobetek WHERE id_barang = $id_barang";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
        <h2>Edit Data</h2>
        <form method="post" action="">
            <div class="card"><label><?php echo $row['nama_barang']; ?></label><br>
                <label>Harga Sekarang:</label>
                <input type="text" name="harga_sekarang" value="<?php echo $row['harga_sekarang']; ?>">
                <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
                <input type="submit" name="submit_edit" value="Simpan">
            </div>
        </form>
<?php
    } else {
        echo "Data tidak ditemukan.";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_edit'])) {
    $harga_sekarang = $_POST['harga_sekarang'];
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];

    // Update data di database
    $sql = "SELECT * FROM data_barang_setonobetek WHERE id_barang = $id_barang";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // hitung selisih baru
        $selisih_baru = $harga_sekarang - $row['harga_kemarin'];

        // update data di database
        $sql = "UPDATE data_barang_setonobetek SET harga_sekarang = $harga_sekarang, selisih = $selisih_baru WHERE id_barang = $id_barang";
        $result = $conn->query($sql);

        if ($result === TRUE) {
            $message = "Data berhasil diubah";

            $_SESSION['floating_message'] = $message;
            echo "<script>window.history.go(-2);</script>";
            exit();
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Data tidak ditemukan";
    }
}

$conn->close();
?>