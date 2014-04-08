<div>
	<style>
		#newUserForm .form-control
		{
			width: 60%;
			margin-left: 20%;
		}
		#newUserForm label
		{
			margin-left: 20%;
		}
		#newUserForm .sendForm
		{
			margin-left: 20%;
		}
	</style>
	<form id="newUserForm" action="functions/administrator/users/insert_user.php" method="post" enctype="multipart/form-data" role="form">
		<label><h3>Add User</h3></label><br>
		<label>Username: </label>
		<input class="form-control" type="text" name="username" class="userName" maxlength="20" required>
		<?php echo $session["error"]["userExistErr"]; ?>
		<br>
		<label>Password: </label>
		<input class="form-control" type="password" name="password" required><br>
		<label>Repeat Password: </label>
		<input class="form-control" type="password" name="password2" required>
		<?php echo $session["error"]["passErr"]; ?>
		<br>
		<label>Name: </label>
		<input class="form-control" type="text" name="name" maxlength="100"><br>
		<label>Screenshot: </label>
		<input class="form-control" type="file" name="userimage"><br>
		<label>E-mail: </label>
		<input class="form-control" type="text" name="email" maxlength="100" required>
		<?php echo $session["error"]["emailErr"]; ?>
		<br>
		<label>Phone: </label>
		<input class="form-control" type="text" name="phone" maxlength="20"><br>
		<label>Cellphone: </label>
		<input class="form-control" type="text" name="cellphone" maxlength="20"><br>
		<select class="form-control" name="tipo_usuario">
			<option value="1">Administrator</option>
			<option value="2">Normal</option>
			<option value="3">Client</option>
		</select>
		<?php echo $session["error"]["emptyErr"]; ?><br>
		<button type="submit" class="sendForm btn btn-default">Send</button>
	</form>
</div>
