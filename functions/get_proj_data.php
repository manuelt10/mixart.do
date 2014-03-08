<?php 
function autoLoader($class)
{
    $path = "../classes/$class.php";
    include $path;
}
spl_autoload_register('autoLoader');

$db = new mysqlManager();
$projectData = $db->selectRecord('project',NULL,array('idprojects' => $_POST["idproject"]));
?>

<div class="projectInfo">
	<?php 
	if($projectData->data[0]->logo !== NULL)
	{
		?>
		<img class="logo" src="images/<?php echo $projectData->data[0]->folder ?>/thumb400/<?php echo $projectData->data[0]->logo ?>">
		<?php
	}
	?>
	<span><?php echo $projectData->data[0]->name ?></span><?php echo $projectData->data[0]->note ?></span><br><span>
	<div class="participants">
		<span>Members: </span><br>
		<?php 
		//vw_project_user
		$project_user = $db->selectRecord('vw_project_user',NULL,array('idproject' => $_POST["idproject"]));
		foreach($project_user->data as $pu)
		{
			?>
			<a href="<?php echo $pu->username ?>"><?php echo $pu->name ?></a><br>
			<?php
		}
		?>
	</div>
	<span><?php echo $projectData->data[0]->description ?></span>
	<a href="<?php echo $projectData->data[0]->url ?>">Visit</a>
</div>

<?php 
$project_image = $db->selectRecord('project_images',NULL,array('idproject' => $_POST["idproject"], 'special_image' => 1));
?>
<div class="special_image">
	<?php 
		foreach($project_image->data as $pi)
		{
			?>
				<img src="images/<?php echo $projectData->data[0]->folder ?>/thumb400/<?php echo $pi->image ?>">
			<?php
		}
	?>
</div>


<div class="proyImgWrap">
	<?php 
	$project_img = $db->selectRecord('project_images',NULL,array('idproject' => $_POST["idproject"], 'special_image' => 0));
		foreach($project_img->data as $pi)
		{
			?>
			<span class="proyImgMask transTw">
				<img src="images/<?php echo $projectData->data[0]->folder ?>/thumb400/<?php echo $pi->image ?>">
			</span>
			<?php
		}
	?>
</div>