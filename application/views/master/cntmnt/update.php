<div class="section-header">
  <h1>Cntmnt</h1>
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
          <?php echo form_open('cntmnts/update/'.$cntmnts['sgcode']) ?>
            <div class="form-group">
              <label for="sgcode">cntmnt:</label>
              <input type="text" value="<?php echo $cntmnts['sgcode'];?>" class="form-control" id="cntmnt_id" readonly>
            </div>
            <div class="form-group">
              <label for="cntyear">cnt Year:</label>
              <input name="cntyear" type="text" value="<?php echo $cntmnts['cntyear'];?>" class="form-control" id="cntyear" required>
            </div>
            <div class="form-group">
              <label for="counter">Counter:</label>
              <input name="counter" type="text" value="<?php echo $cntmnts['counter'];?>" class="form-control" id="counter" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#menu_cntmnts").addClass('active');
</script>
