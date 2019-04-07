<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User 
        <small>Info</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Setting</a></li>
        <li class="active">User</li>
      </ol>
    </section>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
	
				
          <div class="box">
            
			
			<!-- Form -->
			<form role="form" method="post" action="">
				<div class="box-body">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="user_name">User Name</label>
						<input type="text" class="form-control" id="user_name" autocomplete="off" name="user_name" onblur="check_user(this)">
						<span class="umsg"></span>
					</div>
					<div class="form-group">
						<label for="dept">Department</label>
						<input type="text" class="form-control" id="dept" name="dept">
					</div>
					<div class="form-group">
						<label for="designation">Designation</label>
						<input type="designation" class="form-control" id="designation" name="designation">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="form-group">
						<label for="cpassword">Confirm Password</label>
						<input type="password" class="form-control" id="cpassword" name="cpassword">
					</div>
				</div>
			  
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
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
		$data['name']=$_POST['name'];
		$data['email']=$_POST['email'];
		$data['user_name']=$_POST['user_name'];
		$data['dept']=$_POST['dept'];
		$data['designation']=$_POST['designation'];
		
		
		if($_POST['password']!==$_POST['cpassword']){
			echo "<script> alert('password and confirm password are not same.'); </script>";
			return;
		}
		$data['password']=md5($_POST['password']);
		$data['active']=1;
		$data['status']=1;
		$data['createdBy']=1;
		$data['createdOn']=date('Y-m-d H:i:s');

		$crud=new crud();
		$ins=$crud->insert('tbl_auth',$data);
		if($ins['code']==0){
            echo "<script> alert('".$ins['msg']."'); </script>";
        }else{
            echo "<script> alert('".$ins['msg']."'); </script>";
        }

}
?>
<script>
function check_user(user){
	var username=user.value;
	
	$.post("php/check_data.php",{
		user_name: username
	},
	function(data){
		if(data>0){
			$(user).val('');
			$('.umsg').text('User already exist.Try another');
		}
		else{
			$('.umsg').text('');
		}
	});
}

</script>

<?php include('include/footer.php'); ?>
<?php include('include/script.php'); ?>

