<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting
        <small> Add Department</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Setting</a></li>
        <li class="active">Add Department</li>
      </ol>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
	
				
				<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="dn">Department Name</label>
                  <input type="text" class="form-control" id="dn" name="dept_name">
                </div>
                <div class="form-group">
                  <label for="dd">Department Description</label>
                  <input type="text" class="form-control" id="dd" name="dept_des">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
				
				
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  

<?php
include('class/crud.php');

if(isset($_POST['save'])){
		$data['dept_name']=$_POST['dept_name'];
		$data['dept_des']=$_POST['dept_des'];
		$data['status']=1;
		$data['createdBy']=1;
		$data['createdOn']=date('Y-m-d H:i:s');

    $crud=new crud();
    $ins=$crud->insert('tbl_dept_info1',$data);
		if($ins['code']==0){
            echo "<script> alert('".$ins['msg']."'); </script>";
        }else{
            echo "<script> alert('".$ins['msg']."'); </script>";
        }

}
?>
    
<?php include('include/footer.php'); ?>
<?php include('include/script.php'); ?>
