<?php 
session_start();
$session = $_SESSION;
$_SESSION["error"] = '';
session_write_close();
if(empty($session["iduser"]))
{
	header('Location: index');
}
function autoLoader($class)
{
    $path = "classes/$class.php";
    include $path;
}
spl_autoload_register('autoLoader');

if(!empty($session["iduser"]))
{
	$db = new mysqlManager();
	$data = $db->selectRecord('user',NULL,Array("iduser" => $session["iduser"]));
	$user = new user($data->data[0]);
}
require_once('templates/admhea.php');
?>

	<div class="cont1 sections shown" data-id="1">
	<?php 
	switch($_GET["form"])
	{
		case 'userspanel' : 		require_once('sections/administrator/users_panel.php'); 					break;
		case 'newuser' : 			require_once('sections/administrator/new_user.php'); 						break;
		case 'projectpanel' : 		require_once('sections/administrator/projects_panel.php'); 					break;
		case 'newproject' : 		require_once('sections/administrator/new_project.php'); 					break;
		case 'add_img_project' : 	require_once('sections/administrator/project_images.php'); 					break;
		case 'esp_proj_img' : 		require_once('sections/administrator/project_special_image.php');			break;
		case 'profile' : 			require_once('sections/administrator/profile/profile.php'); 				break;
		case 'change_profile' : 	require_once('sections/administrator/profile/change_profile.php');			break;
		case 'change_project' : 	require_once('sections/administrator/change_project.php');			break;
		default : 					require_once('sections/administrator/users_panel.php'); 					break;
	}
	?>
	</div>

	

	
<?php 
require_once("templates/foo.php");
?>