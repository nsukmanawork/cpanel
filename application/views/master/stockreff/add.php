<div class="section-header">
  <h1>Stock</h1>
</div>
<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add New stockreff</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <?php echo validation_errors(); ?>
          <?php echo form_open('stockreffs/add') ?>
            <div class="form-group">
              <label for="reffno">Reff No:</label>
              <input name="reffno" type="text" value="<?php echo set_value('reffno');?>" class="form-control" id="reffno" required>
            </div>
            <div class="form-group">
              <label for="usestatus">Use Status:</label>
              <input name="usestatus" type="text" value="<?php echo set_value('usestatus');?>" class="form-control" id="usestatus" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#menu_stockreffs").addClass('active');
</script>
