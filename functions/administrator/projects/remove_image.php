<?php 
session_start();
$session = $_SESSION;
session_write_close();
function autoLoader($class)
{
    $path = "../../../classes/$class.php";
    include $path;
}
spl_autoload_register('autoLoader');

/*Check the data is not empty*/
if(!empty($_POST["idproject"]) and !empty($_POST["id"]) and !empty($session["iduser"]))
{
	
	print_r($_POST);
	/*Variable declaration*/
	$db = new mysqlManager();
	$path = '../../../images/';
	$project = $db->selectRecord('project', array('folder'),array('idprojects' => $_POST["idproject"]));
	$project_image = $db->selectRecord('project_images', NULL, array("idproject_image" => $_POST["id"]));
	
	/*Remove Images*/
	unlink($path . $project->data[0]->folder . '/' . $project_image->data[0]->image);
	unlink($path . $project->data[0]->folder . '/thumb400/' . $project_image->data[0]->image);
	unlink($path . $project->data[0]->folder . '/thumb100/' . $project_image->data[0]->image);
	
	/*Delete image from database*/
	$db->deleteRecord('project_image', array("idproject_image" => $_POST["id"]));
}
?>