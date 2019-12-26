<div class="section-header">
  <h1>Cntmnt</h1>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard Cntmnt</h1>
  <a href="<?php echo site_url('cntmnts/add') ?>" class="btn btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add Cntmnt</a>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-12">
    <h6 class="m-0 font-weight-bold text-primary">Data Cntmnt</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Cntmnt</th>
            <th>Cnt year</th>
            <th>Counter</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cntmnts as $cntmnt): ?>
            <tr>
              <td><?php echo $cntmnt['sgcode'] ?></td>
              <td><?php echo $cntmnt['cntyear'] ?></td>
              <td><?php echo $cntmnt['counter'] ?></td>
              <td>
                <a href="<?php echo site_url('cntmnts/detail/'.$cntmnt['sgcode']) ?>">Detail</a> |
                <a href="<?php echo site_url('cntmnts/update/'.$cntmnt['sgcode']) ?>">Edit</a>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- nandar -->

<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js')?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('js/demo/datatables-demo.js')?>"></script>

<script type="text/javascript">
  $("#menu_cntmnts").addClass('active');
</script>
