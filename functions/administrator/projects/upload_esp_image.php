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



if(!empty($session["iduser"]) and !empty($_POST["idproject"]))
{
	
	/*Creation of variables and objects*/
	$fM = new fileManager();
	$db = new mysqlManager();
	$sM = new stringManager();
	$extensions = Array('jpg', 'png', 'jpeg');
	$minWidth = 1400;
	$minHeight = $_POST["imageHeight"];
	$x = $_POST["x"] * 3;
	$y = $_POST["y"] * 3;
	$path = '../../../images/';
	$ext = pathinfo($_FILES['projectImage']['name'], PATHINFO_EXTENSION);
	$file = $_FILES['projectImage'];
	$imageName = $sM->generateFullRandomCode();
	$project_data = $db->selectRecord('project', NULL, array('idprojects' => $_POST["idproject"]));
	list($width, $height) = getimagesize($file['tmp_name']);
	/*Needs to be an image*/
	if(in_array($ext, $extensions))
	{
		/*Image can't be less than the minWidth and minHeight*/
		if($width >= $minWidth and $height >= $minHeight)
		{
			/*If crop is executed*/
			if($fM->cropImage($path . $project_data->data[0]->folder . '/' , $file, $imageName, $x, $y, $minWidth, $minHeight))
			{
				/*Creation of thumbnails*/
				$fM->createThumbnail($path . $project_data->data[0]->folder . '/', $imageName . '.' . $ext, $path . $project_data->data[0]->folder . '/thumb400/', 400);
				$fM->createThumbnail($path . $project_data->data[0]->folder . '/thumb400/', $imageName . '.' . $ext, $path . $project_data->data[0]->folder . '/thumb100/', 100);
				
				/*Database insertion*/
				$records = Array(
					'image' => $imageName . '.' . $ext,
					'created_by' => $session["iduser"],
					'idproject' => $_POST["idproject"],
					'special_image' => 1
				);
				$db->insertRecord('project_images',$records);
				header('Location: ' . $_SERVER["HTTP_REFERER"]);
			}
		}
	}
	
	
	
}
header('Location: ' . $_SERVER["HTTP_REFERER"]);
?>