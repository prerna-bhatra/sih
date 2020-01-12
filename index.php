<?php
$page_title="Login ";
include_once "header.php";
?>
<div class="row">
	<div class="col-md-4">
		<form method="POST" action="login.php">
			<select name="role" class="form-control">
				<option value="1" >Admin</option>
				<option value="2">User</option>
			</select>
			<label>Username</label>
			<input type="email" name="Username" class="form-control">
			<label>Passowrd</label>
			<input type="password" name="passowrd" class="form-control">
		</form>
	</div>
</div>
<?php
include_once "footer.php";
 ?>