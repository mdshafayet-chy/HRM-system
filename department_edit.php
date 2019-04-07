<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting
        <small> Update Department</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Setting</a></li>
        <li class="active">Update Department</li>
      </ol>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
<?php
	include('class/crud.php');
	$crud=new crud();
	$cons['id']=$_GET['id'];
	$datas=$crud->common_select('tbl_dept_info1','*','id','ASC',$cons);
?>
				
				<!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="dn">Department Name</label>
                  <input type="text" class="form-control" id="dn" name="dept_name" value="<?= $datas[0]['dept_name']?>">
                </div>
                <div class="form-group">
                  <label for="dd">Department Description</label>
                  <input type="text" class="form-control" id="dd" name="dept_des" value="<?= $datas[0]['dept_des']?>">
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
	if(isset($_POST['save'])){
		$data['dept_name']=$_POST['dept_name'];
		$data['dept_des']=$_POST['dept_des'];
		$data['updatedBy']=1;
		$data['updatedOn']=date('Y-m-d H:i:s');
		
		$cons['id']=$_GET['id'];
		$ins=$crud->common_update('tbl_dept_info1',$data,$cons);
		if($ins['code']==0){
			echo "<script> alert('".$ins['msg']."'); </script>";
		}else{
			echo "<script> alert('".$ins['msg']."'); </script>";
		}
	}
?>

<?php include('include/footer.php'); ?>
<?php include('include/script.php'); ?>
