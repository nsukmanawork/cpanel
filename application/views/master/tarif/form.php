<div class="section-header">
  <h1>Tarif</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Form Import Tarif</h1>
</div>

  <hr>

  <a href="<?php echo base_url().'tarifs/downloadexcel'; ?>">Download Format</a>
  <br>
  <br>

  <form method="post" action="<?php echo base_url("tarifs/form"); ?>" enctype="multipart/form-data">
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
    <div class="card shadow mb-4">
      <div class="card-header py-12">
        <h6 class="m-0 font-weight-bold text-primary">Preview data</h6>
      </div>
    <div class="card-body">
      <div class="table-responsive">';
    echo "<form method='post' action='".base_url("tarifs/import")."'>";

    // Buat sebuah div untuk alert validasi kosong
    // echo "<div style='color: red;' id='kosong'>
    // Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    // </div>";

    echo "
    <table class='table table-bordered' id='dataTable'>
    <thead>
    <tr>
      <th>Origin city code</th>
      <th>Origin city name</th>
      <th>Origin province</th>
      <th>Origin district</th>
      <th>Origin sub district</th>
      <th>Dest city code</th>
      <th>Dest city name</th>
      <th>Dest province</th>
      <th>Dest district</th>
      <th>Dest sub district</th>
      <th>Service</th>
      <th>Sla</th>
      <th>Currency</th>
      <th>Publish</th>
    </tr></thead>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){
      // Ambil data pada excel sesuai Kolom
      $origin_city_code = $row['A'];
      $origin_city_name = $row['B'];
      $origin_province = $row['C'];
      $origin_district = $row['D'];
      $origin_sub_district = $row['E'];
      $dest_city_code = $row['F'];
      $dest_city_name = $row['G'];
      $dest_province = $row['H'];
      $dest_district = $row['I'];
      $dest_sub_district = $row['J'];
      $service = $row['K'];
      $sla = $row['L'];
      $currency = $row['M'];
      $publish = $row['N'];

      // Cek jika semua data tidak diisi
      if(
          $origin_city_code == "" &&
          $origin_city_name == "" &&
          $origin_province == "" &&
          $origin_district == "" &&
          $origin_sub_district == "" &&
          $dest_city_code == "" &&
          $dest_city_name == "" &&
          $dest_province == "" &&
          $dest_district == "" &&
          $dest_sub_district == "" &&
          $service == "" &&
          $sla == "" &&
          $currency == "" &&
          $publish == ""
        )
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        $origin_city_code_td = ( ! empty($origin_city_code))? "" : " style='background: #E07171;'";
        $origin_city_name_td = ( ! empty($origin_city_name))? "" : " style='background: #E07171;'";
        $origin_province_td = ( ! empty($origin_province))? "" : " style='background: #E07171;'";
        $origin_district_td = ( ! empty($origin_district))? "" : " style='background: #E07171;'";
        $origin_sub_district_td = ( ! empty($origin_sub_district))? "" : " style='background: #E07171;'";
        $dest_city_code_td = ( ! empty($dest_city_code))? "" : " style='background: #E07171;'";
        $dest_city_name_td = ( ! empty($dest_city_name))? "" : " style='background: #E07171;'";
        $dest_province_td = ( ! empty($dest_province))? "" : " style='background: #E07171;'";
        $dest_district_td = ( ! empty($dest_district))? "" : " style='background: #E07171;'";
        $dest_sub_district_td = ( ! empty($dest_sub_district))? "" : " style='background: #E07171;'";
        $service_td = ( ! empty($service))? "" : " style='background: #E07171;'";
        $sla_td = ( ! empty($sla))? "" : " style='background: #E07171;'";
        $currency_td = ( ! empty($currency))? "" : " style='background: #E07171;'";
        $publish_td = ( ! empty($publish))? "" : " style='background: #E07171;'";

        // Jika salah satu data ada yang kosong
        if(
            $origin_city_code == "" OR
            $origin_city_name == "" OR
            $origin_province == "" OR
            $origin_district == "" OR
            $origin_sub_district == "" OR
            $dest_city_code == "" OR
            $dest_city_name == "" OR
            $dest_province == "" OR
            $dest_district == "" OR
            $dest_sub_district == "" OR
            $service == "" OR
            $sla == "" OR
            $currency == "" OR
            $publish == ""){
          $kosong++; // Tambah 1 variabel $kosong
        }

        echo "<tr>";
        echo "<td".$origin_city_code_td.">".$origin_city_code."</td>";
        echo "<td".$origin_city_name_td.">".$origin_city_name."</td>";
        echo "<td".$origin_province_td.">".$origin_province."</td>";
        echo "<td".$origin_district_td.">".$origin_district."</td>";
        echo "<td".$origin_sub_district_td.">".$origin_sub_district."</td>";
        echo "<td".$dest_city_code_td.">".$dest_city_code."</td>";
        echo "<td".$dest_city_name_td.">".$dest_city_name."</td>";
        echo "<td".$dest_province_td.">".$dest_province."</td>";
        echo "<td".$dest_district_td.">".$dest_district."</td>";
        echo "<td".$dest_sub_district_td.">".$dest_sub_district."</td>";
        echo "<td".$service_td.">".$service."</td>";
        echo "<td".$sla_td.">".$sla."</td>";
        echo "<td".$currency_td.">".$currency."</td>";
        echo "<td".$publish_td.">".$publish."</td>";
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
      echo "<a href='".base_url("tarifs")."'>Cancel</a>";
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
  $("#menu_tarifs").addClass('active');
</script>
