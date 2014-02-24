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

if(!empty($session["iduser"]))
{
	$fM = new fileManager();
	$db = new mysqlManager();
	$sM = new stringManager();
	list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
	if($width > 400 and $height > 400)
	{
		$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		$extensions = Array('jpg', 'png', 'jpeg');
		if(in_array($ext, $extensions))
		{
			$imageName = $sM->generateFullRandomCode();
			if($fM->fileUpload($_FILES['image'], '../../../images/projects/' , $imageName))
		    {
		        	
	        	$fM->createThumbnail('../../../images/projects/', $imageName . '.' . $ext, '../../../images/projects/thumb400/', 400);
				$fM->createThumbnail('../../../images/projects/thumb400/', $imageName . '.' . $ext, '../../../images/projects/thumb100/', 100);
				$records = Array(
					'image' => $imageName . '.' . $ext,
					'created_by' => $session["iduser"]
				);
				$db->insertRecord('project_images',$records);
				$record = $db->selectRecord('project_images', Array('image'), Array('idproject' => null));
				foreach($record->data as $im)
				{
					?>
					<img src="images/projects/thumb400/<?php echo $im->image ?>">
					<?php
				}
			}
		}
	}
	
	
	
}
?>