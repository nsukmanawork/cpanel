<div class="section-header">
  <h1>Stock</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Form Import Stock</h1>
</div>

  <hr>

  <a href="<?php echo base_url().'stockreffs/downloadexcel'; ?>">Download Format</a>
  <br>
  <br>

  <form method="post" action="<?php echo base_url("stockreffs/form"); ?>" enctype="multipart/form-data">
    <div class="form-group row">
      <div class="col-xs-4">
        <div class="custom-file">
          <input type="file" name="file" class="custom-file-input col-xs-4" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
      </div>
      <div class="col-xs-4">
        <input type="submit" name="preview" value="Preview" class="btn btn-primary">
      </div>
    </div>

    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->

  </form>

  <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }

    // Buat sebuah tag form untuk proses import data ke database
    // echo "<div style='width:70%'>";
    echo '
    <div class="card shadow mb-4 col-lg-8">
      <div class="card-header py-12">
        <h6 class="m-0 font-weight-bold text-primary">Preview data</h6>
      </div>
    <div class="card-body">
      <div class="table-responsive">';
    echo "<form method='post' action='".base_url("stockreffs/import")."'>";

    // Buat sebuah div untuk alert validasi kosong
    // echo "<div style='color: red;' id='kosong'>
    // Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    // </div>";

    echo "
    <table class='table table-bordered' id='dataTable'>
    <thead>
    <tr>
      <th class='text-primary' style='text-align: center;'>Reff No</th>
    </tr></thead>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){
      // Ambil data pada excel sesuai Kolom
      $nis = $row['A']; // Ambil data NIS

      // Cek jika semua data tidak diisi
      if($nis == "")
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah

        // Jika salah satu data ada yang kosong
        if($nis == ""){
          $kosong++; // Tambah 1 variabel $kosong
        }

        echo "<tr>";
        echo "<td".$nis_td.">".$nis."</td>";
        echo "</tr>";
      }

      $numrow++; // Tambah 1 setiap kali looping
    }

    echo "</table>";

    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";

      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' name='import' class='btn btn-success'>Import</button>";
      echo "<a href='".base_url("stockreffs")."'>Cancel</a>";
    }

    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
  ?>


<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('js/demo/datatables-demo.js')?>"></script>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script type="text/javascript">
  $("#menu_stockreffs").addClass('active');
</script>
