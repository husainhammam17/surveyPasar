<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

  <!-- Sidebar -->


  <div id="content-wrapper">

    <div class="container-fluid">
      <!-- Page Content -->
      <style>
        .floating-message {
          position: fixed;
          bottom: 20px;
          left: 50%;
          transform: translateX(-50%);
          background-color: green;
          color: white;
          padding: 10px 20px;
          border: 1px solid #ccc;
          border-radius: 5px;
          z-index: 9999;
        }

        .floating-message-Error {
          position: fixed;
          bottom: 20px;
          left: 50%;
          transform: translateX(-50%);
          background-color: red;
          color: white;
          padding: 10px 20px;
          border: 1px solid #ccc;
          border-radius: 5px;
          z-index: 9999;
        }

        .input-group #tanggal,
        .input-group #lokasi,
        .input-group #harga,
        .input-group #barang {
          border: solid 1px #5f8671;
          border-radius: 5px;
        }

        .input-group span {
          background-color: #5f8671;
          border: solid 1px #5f8671;
          color: white;
        }

        .input-group #satuan {
          height: 38px;
          margin-top: 31px;
          border: solid 1px #5f8671;
          border-radius: 5px;
        }

        .btn .submit {
          background-color: #16cc2c;
          color: white;
          border: #16cc2c 1px solid;
          border-radius: 5px;
        }

        .btn .submit:hover {
          background-color: white;
          color: #16cc2c;
          cursor: pointer;
        }

        .btn .reset {
          background-color: #d12613;
          border: #d12613 1px solid;
          border-radius: 5px;
        }

        .btn .reset:hover {
          background-color: white;
          color: #d12613;
          cursor: pointer;
        }

        hr {
          width: 27%;
          border: solid 1px;
        }

        .card {
          border: none;
          margin-top: 2rem;
        }

        table {
          margin: auto 3rem auto 3rem;
        }
      </style>
      <center>
        <h2>Input Data Harga Komoditas</h2>
        <hr>
      </center>


      <form id="inputForm" action="action.php" method="POST" onsubmit="return validateForm()">
        <div class="card">
          <table>
            <tr style="display:flex;">
              <!-- <td>
                        Tanggal
                    </td> -->
              <td>
                <div class="input-group mb-3">
                  <?php
                  $tanggalHariIni = date("Y-m-d");
                  ?>
                  <input type="date" name="tanggal[]" id="tanggal" class="form-control" value="<?php echo $tanggalHariIni; ?>">
                </div>
              </td>
            </tr>
            <tr style="display:flex; margin-bottom: 2rem;">
              <!-- <td>
                        Lokasi
                    </td> -->
              <td>
                <div class="input-group mb-3">
                  <select name="lokasi[]" id="lokasi" class="form-select">
                    <option value="pilih-lokasi">Pilih Lokasi</option>
                    <option value="Pasar Bandar">Pasar Bandar</option>
                    <option value="Pasar Pahing">Pasar Pahing</option>
                    <option value="Pasar Setono Betek">Pasar Setono Betek</option>
                  </select>
                </div>
              </td>
            </tr>
            <?php
            $barang = array("Beras Premium", "Beras Medium", "Gula Kristal Putih", "Minyak Goreng Curah", "Minyak Goreng Kemasan Premium", "Minyak Goreng Kemasan Sederhana", "Minyak Goreng MINYAKITA", "Daging Sapi Paha Belakang", "Daging Ayam Ras", "Daging Ayam Kampung", "Telur Ayam Ras", "Telur Ayam Kampung", "SKM Merk Bendera", "SKM Merk Indomilk", "Susu Bubuk Merk Bendera (Instant)", "Susu Bubuk Merk Indomilk (Instant)", "Jagung Pipilan Kering", "Garam Beryodium Bata", "Garam Beryodium Halus", "Terigu Protein Sedang (Kemasan)", "Kedelai Impor", "Kedelai Lokal", "Indomie Rasa Kari Ayam", "Cabe Merah Keriting", "Cabe Merah Besar", "Cabe Rawit Merah", "Bawang Merah", "Bawang Putih Sinco/Honan", "Ikan Asin Teri", "Kacang Hijau", "Kacang Tanah", "Ketela Pohon", "Kol/Kubis", "Kentang", "Tomat Merah", "Wortel", "Buncis", "Ikan Bandeng", "Ikan Kembung", "Ikan Tuna", "Ikan Tongkol", "Ikan Cakalang", "Gas LPG 3Kg");
            $satuan = array("Kg", "3Kg", "1 Liter", "397 gr/kl", "390 gr/kl", "400 gr/dos", "Buah", "Bungkus");
            foreach ($barang as $item) {
            ?>
              <tr>
                <td>
                  <div class="input-group">
                    <label for="barang"><?php echo $item; ?></label>
                    <input type="hidden" name="barang[]" id="barang" class="form-control" value="<?php echo $item; ?>">
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Rp</span>
                    <input type="text" name="harga_sekarang[]" id="harga" class="form-control" aria-label="Amount" placeholder="Masukkan Harga">
                  </div>
                </td>
                <td>
                  <div class="input-group mb-3">
                    <select name="satuan[]" id="satuan" class="form-select">
                      <option value="satuan">Pilih Satuan</option>
                      <?php
                      foreach ($satuan as $s) {
                        echo "<option value='$s'>$s</option>";
                      }
                      ?>
                    </select>
                  </div>
                </td>
              </tr>

            <?php
            }
            ?>

          </table>
          <div class="btn">

            <input class="submit" name="submit" type="submit" value="Submit">
            <input class="reset" name="reset" type="reset" value="Reset">

          </div>
        </div>
      </form>



    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<script>
  function validateForm() {
    var tanggal = document.getElementById('tanggal').value;
    var lokasi = document.getElementById('lokasi').value;
    var satuan = document.getElementById('satuan').value;
    var inputs = document.querySelectorAll('input[type="text"]');
    var filled = true;

    inputs.forEach(function(input) {
      if (input.value === '') {
        filled = false;
      }
    });

    if (tanggal === '' || lokasi === '' || satuan === '' || !filled) {
      // Jika ada field yang belum terisi
      var floatingError = document.createElement('div');
      floatingError.className = 'floating-message-Error';
      floatingError.innerText = 'Data tidak boleh kosong';
      document.body.appendChild(floatingError);
      setTimeout(function() {
        floatingError.remove();
      }, 3000); // Munculkan pesan error selama 3 detik
      return false; // Menghentikan pengiriman formulir
    } else {
      // Jika semua field sudah terisi
      var floatingSuccess = document.createElement('div');
      floatingSuccess.className = 'floating-message';
      floatingSuccess.innerText = 'Data berhasil disimpan';
      document.body.appendChild(floatingSuccess);
      setTimeout(function() {
        floatingSuccess.remove();
      }, 3000); // Munculkan pesan sukses selama 3 detik
      return true; // Lanjutkan pengiriman formulir
    }
  }
</script>

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>