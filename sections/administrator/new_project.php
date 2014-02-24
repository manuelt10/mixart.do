<script src="scripts/jquery.form.min.js" type="text/javascript"></script>
<script src="scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
<form method="post" action="<?php echo htmlspecialchars('functions/administrator/projects/create_project.php');?>" enctype="multipart/form-data">
	<fieldset>
	<label>Name:</label><input type="text" name="projectName" class="projectName" maxlength="100" required><?php echo $session["error"]["projectName"]; ?><br>
	<label>Folder:</label> <input type="text" name="projectFolder" class="folderName" readonly="true"><br>
	<label>Description:</label><textarea id="projectDescription" name="projectDescription"></textarea><br>
	<label>Note:</label><textarea id="projectNote" name="projectNote"></textarea><br>
	<label>Logo:</label><input type="file" name="projectLogo"><br>
	<label>Project Members:</label>
	<div>
		<?php 
		$where = Array(
			'user_type' => 1, 
			'status' => 'A'
		);
		$users = $db->selectRecord('user',NULL, $where);
		foreach($users->data as $u)
		{
			?>
			<input type="checkbox" name="projectUsers[]" value="<?php echo $u->iduser ?>"><label><?php echo $u->name ?></label>
			<?php
		}
		?>
	</div>
	<?php echo $session["error"]["projectUser"]; ?><br>
	<label>Status:</label><input type="checkbox" name="projectStatus" value="1">
	<br>
	<button type="submit">Create Project</button>
</form>



<script>
	$('.projectName').keyup(function(){
		var projName = $(this).val();
		var folderName = projName.toLowerCase().replace(/[^A-Z0-9]/ig, "");
		
		$('.folderName').val(folderName);
	})
</script>
<script type="text/javascript">
	CKEDITOR.replace( 'projectDescription' );
	CKEDITOR.replace( 'projectNote' );
</script>