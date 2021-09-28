<?php 
include('connection.php');
if(isset($_POST['email'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="SELECT * FROM tabel_user WHERE user_email='$email'";
	$result=$connection->query($sql);
	if($row=mysqli_fetch_assoc($result)){
		$db_password = $row['user_password'];
		$user_id = $row['user_id'];
        $db_role = $row['user_type'];
		if($password == $db_password){
			session_start();
			$_SESSION['user_id'] = $user_id;		
			$_SESSION['role'] = $db_role;
			header('location:index.php');
		} else {
			?>
			<script>
				window.alert('Incorrect password or username');
				window.location.href='signupform.php';
			</script>
			<?php
		}
	} else {
		?>
		<script>
			window.alert('Incorrect password or username');
			window.location.href='signupform.php';
		</script>
		<?php
	}
}
?>