<?php include('include/header.php'); ?>
<!-- DataTables -->
  <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php include('include/sidebar.php'); ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting
        <small>Department</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Setting</a></li>
        <li class="active">Department</li>
      </ol>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
	
				
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Department List</h3>
			  <a class="btn btn-primary pull-right" href="department_add.php">Add New</a>
            </div>
			
			<!-- Form -->
			<form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="dept">Department</label>
                  <input type="text" class="form-control" id="dept" placeholder="Type Department Name">
                </div>
                <div class="form-group">
                  <label for="dept_des">Password</label>
                  <input type="text" class="form-control" id="dept_des" placeholder="Descrition of Department">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
			<?php
				include('class/crud.php');
				$crud=new crud();
				$cons['status']=1;
				$datas=$crud->common_select('tbl_dept_info1','*','id','ASC',$cons);
			?>	
			
            <!-- Table -->
			<!-- /.box-header -->
            <div class="box-body">
              <table id="datatbl" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#SL</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				if($datas){
				 $i=0; foreach($datas as $data){ $i++  ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $data['dept_name']; ?></td>
                  <td><?= $data['dept_des']; ?></td>
                  <td>
						<a href="department_edit.php?id=<?= $data['id']?>" class="btn btn-primary">Update</a>
						<a href="department_delete.php?id=<?= $data['id']?>" class="btn btn-danger">Delete</a>
				  </td>
                </tr>
				<?php } //end of foreach 
				  }//end of if 
				  else{ ?>
				  <tr>
						<td colspan="4" > NO DATA FOUND</td>
				  </tr>
				  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
				
				
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  


<?php include('include/footer.php'); ?>
<?php include('include/script.php'); ?>

<!-- DataTables -->
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#datatbl').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
