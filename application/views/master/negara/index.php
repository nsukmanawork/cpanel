<div class="section-header">
  <h1>Negara</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard Negara</h1>
  <a href="<?php echo site_url('negaras/add') ?>" class="btn btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add Negara</a>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-12">
    <h6 class="m-0 font-weight-bold text-primary">Data Negara</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Negara ID</th>
            <th>Negara Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($negaras as $negara): ?>
            <tr>
              <td><?php echo $negara['KdEdi'] ?></td>
              <td><?php echo $negara['UrEdi'] ?></td>
              <td>
                <a href="<?php echo site_url('negaras/detail/'.$negara['KdEdi']) ?>">Detail</a> |
                <a href="<?php echo site_url('negaras/update/'.$negara['KdEdi']) ?>">Edit</a>
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
  $("#menu_negaras").addClass('active');
</script>
