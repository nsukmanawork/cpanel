<div class="section-header">
  <h1>User</h1>
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
          <?php echo form_open('users/update/'.$users['username']) ?>
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" value="<?php echo $users['username'];?>" class="form-control" id="username" readonly>
            </div>
            <div class="form-group">
              <label for="name">Name:</label>
              <input name="name" type="text" value="<?php echo $users['name'];?>" class="form-control" id="name" required>
            </div>
            <div class="form-group">
              <label for="Custproject">Custproject:</label>
              <input name="custproject" type="text" value="<?php echo $users['custproject'];?>" class="form-control" id="Custproject" required>
            </div>
            <div class="form-group">
              <label for="level">Level:</label>
              <input name="level" type="text" value="<?php echo $users['level'];?>" class="form-control" id="level" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#menu_users").addClass('active');
</script>
