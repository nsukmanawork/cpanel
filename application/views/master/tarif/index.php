<div class="section-header">
  <h1>Tarif</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard tarif</h1>
  <div class="">
    <a href="<?php echo site_url('tarifs/form') ?>" class="btn btn-success shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Import Tarif</a>
    <a href="<?php echo site_url('tarifs/add') ?>" class="btn btn-primary shadow-sm"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add Tarif</a>
  </div>
</div>

<div class="card shadow mb-4">
  <div class="card-header py-12">
    <h6 class="m-0 font-weight-bold text-primary">Data tarif</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Tarif ID</th>
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tarifs as $tarif): ?>
            <tr>
              <td><?php echo $tarif['tarrif_id'] ?></td>
              <td><?php echo $tarif['origin_city_code'] ?></td>
              <td><?php echo $tarif['origin_city_name'] ?></td>
              <td><?php echo $tarif['origin_province'] ?></td>
              <td><?php echo $tarif['origin_district'] ?></td>
              <td><?php echo $tarif['origin_sub_district'] ?></td>
              <td><?php echo $tarif['dest_city_code'] ?></td>
              <td><?php echo $tarif['dest_city_name'] ?></td>
              <td><?php echo $tarif['dest_province'] ?></td>
              <td><?php echo $tarif['dest_district'] ?></td>
              <td><?php echo $tarif['dest_sub_district'] ?></td>
              <td><?php echo $tarif['service'] ?></td>
              <td><?php echo $tarif['sla'] ?></td>
              <td><?php echo $tarif['currency'] ?></td>
              <td><?php echo $tarif['publish'] ?></td>
              <td>
                <a href="<?php echo site_url('tarifs/detail/'.$tarif['tarrif_id']) ?>">Detail</a> |
                <a href="<?php echo site_url('tarifs/update/'.$tarif['tarrif_id']) ?>">Edit</a>
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
  $("#menu_tarifs").addClass('active');
</script>
