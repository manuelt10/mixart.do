<?php 
$project_data = $db->selectRecord('project',NULL,array('idprojects' => $_GET["id"]));
?>
<script src="scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
<form method="post" action="<?php echo htmlspecialchars('functions/administrator/projects/change_project.php');?>" enctype="multipart/form-data">
	<input type="hidden" value="<?php echo $project_data->data[0]->idprojects ?>" name="idproject">
	<fieldset>
	<label>Name:</label><input type="text" name="projectName" value="<?php echo $project_data->data[0]->name ?>" class="projectName" maxlength="100" required><?php echo $session["error"]["projectName"]; ?><br>
	<label>Description:</label><textarea id="projectDescription" name="projectDescription"><?php echo $project_data->data[0]->description ?></textarea><br>
	<label>URL:</label><input type="text" name="projectUrl" class="projectUrl" maxlength="250" value="<?php echo $project_data->data[0]->url ?>"><br>
	<label>Note:</label><textarea id="projectNote" name="projectNote"><?php echo $project_data->data[0]->note ?></textarea><br>
	<label>Logo:</label><input type="file" name="projectLogo"><br>
	<?php 
	if($project_data->data[0]->logo !== NULL)
	{
		?>
		<div>
			<?php 
			echo '<img src="images/'.$project_data->data[0]->folder.'/thumb100/'.$project_data->data[0]->logo.'"' ;
			?>
		</div>
		<?php
	}
	?>
	<label>Project Members:</label>
	<div>
		<?php 
		$where = Array(
			'user_type' => 1, 
			'status' => 'A'
		);
		$users = $db->selectRecord('user',NULL, $where);
		
		$project_users = $db->selectRecord('project_user',NULL, array('idproject' => $_GET["id"]));
		foreach($project_users->data as $pu)
		{
			$puser[] = $pu->iduser;
		}
		foreach($users->data as $u)
		{
			?>
			<input type="checkbox" <?php echo in_array($u->iduser,$puser) ? "checked" : ""; ?> name="projectUsers[]" value="<?php echo $u->iduser ?>"><label><?php echo $u->name ?></label>
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
			<option value="<?php echo $pt->idproject_type ?>" ><?php echo $pt->description; ?></option>
			<?php
		}
		?>
	</select>
	<label>Status:</label><input type="checkbox" name="projectStatus" value="1" <?php echo $project_data->data[0]->status === '1' ? "checked" : ""; ?>>
	<br>
	<button type="submit">Change Project</button>
</form>
<script type="text/javascript">
	CKEDITOR.replace( 'projectDescription' );
	//CKEDITOR.replace( 'projectNote' );
</script>