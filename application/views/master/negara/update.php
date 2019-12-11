<div class="section-header">
  <h1>Negara</h1>
</div>
<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <?php echo validation_errors(); ?>
          <?php echo form_open('negaras/update/'.$negaras['KdEdi']) ?>
            <div class="form-group">
              <label for="KdEdi">Kode Negara:</label>
              <input type="text" value="<?php echo $negaras['KdEdi'];?>" class="form-control" id="KdEdi" readonly>
            </div>
            <div class="form-group">
              <label for="UrEdi">Nama negara:</label>
              <input name="UrEdi" type="text" value="<?php echo $negaras['UrEdi'];?>" class="form-control" id="UrEdi" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#menu_negaras").addClass('active');
</script>
