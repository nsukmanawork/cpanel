<div class="section-header">
  <h1>Project</h1>
</div>
<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Add New project</h6>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
          <?php echo validation_errors(); ?>
          <?php echo form_open('projects/add') ?>
            <div class="form-group">
              <label for="custproject">Cust project:</label>
              <input name="custproject" type="text" value="<?php echo set_value('custproject');?>" class="form-control" id="custproject" required>
            </div>
            <div class="form-group">
              <label for="custname">Cust name:</label>
              <input name="custname" type="text" value="<?php echo set_value('custname');?>" class="form-control" id="custname" required>
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input name="address" type="text" value="<?php echo set_value('address');?>" class="form-control" id="address" required>
            </div>
            <div class="form-group">
              <label for="province">Province:</label>
              <input name="province" type="text" value="<?php echo set_value('province');?>" class="form-control" id="province" required>
            </div>
            <div class="form-group">
              <label for="city">City ID:</label>
              <input name="city" type="text" value="<?php echo set_value('city');?>" class="form-control" id="city" required>
            </div>
            <div class="form-group">
              <label for="district">District:</label>
              <input name="district" type="text" value="<?php echo set_value('district');?>" class="form-control" id="district" required>
            </div>
            <div class="form-group">
              <label for="subdistrict">Subdistrict:</label>
              <input name="subdistrict" type="text" value="<?php echo set_value('subdistrict');?>" class="form-control" id="subdistrict" required>
            </div>
            <div class="form-group">
              <label for="country">Country:</label>
              <input name="country" type="text" value="<?php echo set_value('country');?>" class="form-control" id="country" required>
            </div>
            <div class="form-group">
              <label for="postalcode">Postal code:</label>
              <input name="postalcode" type="text" value="<?php echo set_value('postalcode');?>" class="form-control" id="postalcode" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input name="email" type="text" value="<?php echo set_value('email');?>" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input name="phone" type="text" value="<?php echo set_value('phone');?>" class="form-control" id="phone" required>
            </div>
            <div class="form-group">
              <label for="contactperson">Contact person:</label>
              <input name="contactperson" type="text" value="<?php echo set_value('contactperson');?>" class="form-control" id="contactperson" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#menu_projects").addClass('active');
</script>
