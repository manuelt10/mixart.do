<div>
	<form action="functions/administrator/users/insert_user.php" method="post" enctype="multipart/form-data">
		<legend>Add User</legend>
		<label>Username: </label><input type="text" name="username" class="userName" maxlength="20" required>
		<?php echo $session["error"]["userExistErr"]; ?>
		<br>
		<label>Password: </label><input type="password" name="password" required><br>
		<label>Repeat Password: </label><input type="password" name="password2" required>
		<?php echo $session["error"]["passErr"]; ?>
		<br>
		<label>Name: </label><input type="text" name="name" maxlength="100"><br>
		<label>Screenshot: </label><input type="file" name="userimage"><br>
		<label>E-mail: </label><input type="text" name="email" maxlength="100" required>
		<?php echo $session["error"]["emailErr"]; ?>
		<br>
		<label>Phone: </label><input type="text" name="phone" maxlength="20"><br>
		<label>Cellphone: </label><input type="text" name="cellphone" maxlength="20"><br>
		<select name="tipo_usuario">
			<option value="1">Administrator</option>
			<option value="2">Normal</option>
			<option value="3">Client</option>
		</select>
		<?php echo $session["error"]["emptyErr"]; ?><br>
		<button type="submit" class="sendForm">Send</button>
	</form>
</div>
