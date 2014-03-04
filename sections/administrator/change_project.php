<?php 
$project_data = $db->selectRecord('project',NULL,array('idprojects' => $_GET["id"]));
?>
<script src="scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
<form method="post" action="<?php echo htmlspecialchars('functions/administrator/projects/create_project.php');?>" enctype="multipart/form-data">
	<fieldset>
	<label>Name:</label><input type="text" name="projectName" value="<?php echo $project_data->data[0]->name ?>" class="projectName" maxlength="100" required><?php echo $session["error"]["projectName"]; ?><br>
	<label>Description:</label><textarea id="projectDescription" name="projectDescription"><?php echo $project_data->data[0]->description ?></textarea><br>
	<label>Note:</label><textarea id="projectNote" name="projectNote"><?php echo $project_data->data[0]->note ?></textarea><br>
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
	<label>Project Type:</label>
	<select name="projectType">
		<?php 
		$proj_type = $db->selectRecord('project_type');
		foreach($proj_type->data as $pt)
		{
			?>
			<option value="<?php echo $pt->idproject_type ?>"><?php echo $pt->description; ?></option>
			<?php
		}
		?>
	</select>
	<label>Status:</label><input type="checkbox" name="projectStatus" value="1">
	<br>
	<button type="submit">Create Project</button>
</form>
<script type="text/javascript">
	CKEDITOR.replace( 'projectDescription' );
	CKEDITOR.replace( 'projectNote' );
</script>