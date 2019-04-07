<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				
				<!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            
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
		$data['status']=0;
		$data['updatedBy']=1;
		$data['updatedOn']=date('Y-m-d H:i:s');
		
		$crud=new crud();
		$cons['id']=$_GET['id'];
		$ins=$crud->common_update('tbl_dept_info1',$data,$cons);
		if($ins['code']==0){
			echo "<script> alert('Data not deleted'); </script>";
		}else{
			echo "<script> alert('Data deleted'); </script>";
		}
	
?>

<?php include('include/footer.php'); ?>
<?php include('include/script.php'); ?>
