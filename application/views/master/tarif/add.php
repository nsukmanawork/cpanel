<div class="section-header">
  <h1>tarif</h1>
</div>
<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add New tarif</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <?php echo validation_errors(); ?>
          <?php echo form_open('tarifs/add') ?>
            <div class="form-group">
              <label for="origin_city_code">Origin city code:</label>
              <input name="origin_city_code" type="text" value="<?php echo set_value('origin_city_code');?>" class="form-control" id="origin_city_code" required>
            </div>
            <div class="form-group">
              <label for="origin_city_name">Origin city name:</label>
              <input name="origin_city_name" type="text" value="<?php echo set_value('origin_city_name');?>" class="form-control" id="origin_city_name" required>
            </div>
            <div class="form-group">
              <label for="origin_province">Origin province:</label>
              <input name="origin_province" type="text" value="<?php echo set_value('origin_province');?>" class="form-control" id="origin_province" required>
            </div>
            <div class="form-group">
              <label for="origin_district">Origin district:</label>
              <input name="origin_district" type="text" value="<?php echo set_value('origin_district');?>" class="form-control" id="origin_district" required>
            </div>
            <div class="form-group">
              <label for="origin_sub_district">Origin sub district:</label>
              <input name="origin_sub_district" type="text" value="<?php echo set_value('origin_sub_district');?>" class="form-control" id="origin_sub_district" required>
            </div>
            <div class="form-group">
              <label for="dest_city_code">Dest city code:</label>
              <input name="dest_city_code" type="text" value="<?php echo set_value('dest_city_code');?>" class="form-control" id="dest_city_code" required>
            </div>
            <div class="form-group">
              <label for="dest_city_name">Dest city name:</label>
              <input name="dest_city_name" type="text" value="<?php echo set_value('dest_city_name');?>" class="form-control" id="dest_city_name" required>
            </div>
            <div class="form-group">
              <label for="dest_province">Dest province:</label>
              <input name="dest_province" type="text" value="<?php echo set_value('dest_province');?>" class="form-control" id="dest_province" required>
            </div>
            <div class="form-group">
              <label for="dest_district">Dest district:</label>
              <input name="dest_district" type="text" value="<?php echo set_value('dest_district');?>" class="form-control" id="dest_district" required>
            </div>
            <div class="form-group">
              <label for="dest_sub_district">Dest sub district:</label>
              <input name="dest_sub_district" type="text" value="<?php echo set_value('dest_sub_district');?>" class="form-control" id="dest_sub_district" required>
            </div>
            <div class="form-group">
              <label for="service">Service:</label>
              <input name="service" type="text" value="<?php echo set_value('service');?>" class="form-control" id="service" required>
            </div>
            <div class="form-group">
              <label for="sla">Sla:</label>
              <input name="sla" type="text" value="<?php echo set_value('sla');?>" class="form-control" id="sla" required>
            </div>
            <div class="form-group">
              <label for="currency">Currency:</label>
              <input name="currency" type="text" value="<?php echo set_value('currency');?>" class="form-control" id="currency" required>
            </div>
            <div class="form-group">
              <label for="publish">Publish:</label>
              <input name="publish" type="text" value="<?php echo set_value('publish');?>" class="form-control" id="publish" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#menu_tarifs").addClass('active');
</script>
