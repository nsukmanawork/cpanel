<div class="section-header">
  <h1>Service</h1>
</div>
<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add New service</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <?php echo validation_errors(); ?>
          <?php echo form_open('services/update/'.$services['service_id']) ?>
            <div class="form-group">
              <label for="service_id">Service ID:</label>
              <input type="text" value="<?php echo $services['service_id'];?>" class="form-control" id="service_id" readonly>
            </div>
            <div class="form-group">
              <label for="service_name">Service Name:</label>
              <input name="service_name" type="text" value="<?php echo $services['service_name'];?>" class="form-control" id="service_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#menu_services").addClass('active');
</script>
