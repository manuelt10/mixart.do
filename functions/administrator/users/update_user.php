<?php 
session_start();
$session = $_SESSION;


/*Autoload of classes*/
function autoLoader($class)
{
    $path = "../../../classes/$class.php";
    include $path;
}
spl_autoload_register('autoLoader');
if(!empty($session["iduser"]))
{
	if(!empty($_POST["memberName"]))
	{
		/*Creating objects and variables*/
		
		$fM = new fileManager();
		$db = new mysqlManager();
		$sM = new stringManager();
		$user_data = $db->selectRecord('user', NULL, array('iduser' => $session["iduser"]));
		$minWidth = 400;
		$minHeight = 400;
		$path = '../../../images/users/';
		if($_FILES['memberImage']['size'] > 0)
		{
			$extensions = Array('jpg', 'png', 'jpeg');
			$ext = pathinfo($_FILES['memberImage']['name'], PATHINFO_EXTENSION);
			$file = $_FILES['memberImage'];
			$imageName = $sM->generateFullRandomCode();
			list($width, $height) = getimagesize($file['tmp_name']);
			/*Needs to be an image*/
			if(in_array($ext, $extensions))
			{
				/*Image can't be less than the minWidth and minHeight*/
				if($width >= $minWidth and $height >= $minHeight)
				{
					if($fM->cropImage($path, $file, $imageName, $_POST["x"], $_POST["y"], $minWidth, $minHeight))
					{
						if(!empty($user_data->data[0]->image))
						{
							unlink($path . $user_data->data[0]->image);
							unlink($path . 'thumb100/' . $user_data->data[0]->image);
						}
						$fM->createThumbnail($path, $imageName . '.' . $ext, $path . '/thumb100/', 100);
						$db->updateRecord('user',array('image' => $imageName.'.'.$ext),array('iduser' => $session["iduser"]));
					}
				}
			}
		}
		$records = array(
		'name' => $_POST["memberName"],
		'website' => $_POST["website"],
		'description' => $_POST["memberDescription"],
		'phone' => $_POST["phone"],
		'cellphone' => $_POST["cellphone"],
		'updated_date' => $date = date('Y-m-d H:i:s'),
		'updated_by' => $session["iduser"]
		);
		$db->updateRecord('user', $records);
	}
}
header('Location: ' . $_SERVER["HTTP_REFERER"]);
?>