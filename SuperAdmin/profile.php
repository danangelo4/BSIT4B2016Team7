<?php
	if(!isset($_SESSION)){
		session_start();
	}
	
	if(!isset($_SESSION['sa_username'])){
		header("Location:admin.php");
	}
?>

<?php
include_once "lib/webdesign.php";
htmlHeader('Profile','profile','');
pageHeader('Profile','profile','');


if (isset($_REQUEST['update_information'])) {
    update_info($_POST['email']);
	echo "<script type='text/javascript'>alert('Your personal information has been updated!');</script>";
	echo '<script>window.location.href = "admin.php?action=profile";</script>';
	exit;
} if (isset($_REQUEST['update_password'])) {
    update_pass($_POST['oldpassword'],$_POST['newpassword'],$_POST['newpassword_retyped']);
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
			<?php
					if( isset($ProfileDetails) && count($ProfileDetails)>0 ){
						foreach($ProfileDetails as $ProfileDetails){
							echo '
			<div class="col-xs-6">
				<section class="panel">
                    <header class="panel-heading">
                        Account Information
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label class="col-sm-12">Username</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="disabledInput" value="'.$_SESSION['sa_username'].'" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">First Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="'.$ProfileDetails['first_name'].'" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Last Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="'.$ProfileDetails['last_name'].'" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Email Address</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="email" value="'.$ProfileDetails['email'].'" />
                                </div>
                            </div>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success btn-md" name="update_information">Save</button>
								</div>
							</div>
                        </form>
                    </div>
                </section>		
			</div><!--/.col-->
				
			<div class="col-xs-6">
				<section class="panel">
                    <header class="panel-heading">
                        Change Password
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label class="col-sm-12">Old Password</label>
                                <div class="col-sm-12">
                                    <input type="password" name="oldpassword" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">New Password</label>
                                <div class="col-sm-12">
                                    <input type="password" name="newpassword" pattern=".{8,30}" title="Minimum of 8 characters. Maximum of 30 characters" class="form-control" />
								</div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Re-Type Password</label>
                                <div class="col-sm-12">
                                    <input type="password" name="newpassword_retyped" class="form-control" />
                                </div>
                            </div>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-success btn-md" name="update_password">Save</button>
								</div>
							</div>
                        </form>
                    </div>
                </section>		
			</div><!--/.col-->	
							';
					}}
							?>
                        </form>
                    </div>
                </section>	
			</div><!--/.col-->
		</div><!--/.row-->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<?php
function update_info(){
include "model/config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$email = $_POST['email'];
$sql = "UPDATE super_admin SET email='$email' WHERE username='" . $_SESSION['sa_username'] . "'";

//display
$result = mysqli_query($conn,$sql);


$username=$_SESSION['sa_username'];
$action="edits own profile";
$object_id="";
$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";

//display
$result2 = mysqli_query($conn,$sql2);
}


function update_pass(){
include "model/config.php";
$conn = mysqli_connect($host,$user,$pass,$db);

//check
if( mysqli_connect_errno($conn) ){
	echo "Error in DB";
}else{
}
//prepare
$oldpassword=md5($_POST['oldpassword']);

$query = "SELECT password FROM super_admin WHERE username='" . $_SESSION['sa_username'] . "'";
$result1 = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result1);

if ($oldpassword==$row['password']){
	$newpassword = md5($_POST['newpassword']);
	$newpassword_retyped = md5($_POST['newpassword_retyped']);	
	
	if($newpassword==$newpassword_retyped){
		$sql = "UPDATE super_admin SET password='$newpassword' WHERE username='" . $_SESSION['sa_username'] . "'";
		//display
		$result2 = mysqli_query($conn,$sql);
		

		$username=$_SESSION['sa_username'];
		$action="changed password";
		$object_id="";
		$sql2 = "INSERT INTO logs(username,action,object_id,datetime) VALUES('$username','$action','$object_id',now())";
		$result2 = mysqli_query($conn,$sql2);
		
		echo "<script type='text/javascript'>alert('Your password has been updated successfully!');</script>";
	}else if ($newpassword!=$newpassword_retyped){
		echo "<script type='text/javascript'>alert('Password did not match');</script>";
	}
}else{
	echo "<script type='text/javascript'>alert('Wrong password');</script>";
}



}



?>  

<?php
pageFooter();
?>
<?php
htmlFooter();
?>