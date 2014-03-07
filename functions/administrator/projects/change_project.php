<?php 
session_start();
$_SESSION["error"] = array();
/*Autoload of classes*/
function autoLoader($class)
{
    $path = "../../../classes/$class.php";
    include $path;
}
spl_autoload_register('autoLoader');



if(!empty($_POST))
{
	/*Form validations*/
	if(empty($_POST["projectName"]))
	{
		$_SESSION["error"]["projectName"] = '<label class="error-label">The project name is necessary.</label>';
	}
	if(empty($_POST["projectUsers"]))
	{
		$_SESSION["error"]["projectUser"] = '<label class="error-label">You need to have at least one user in the project.</label>';
	}
	
	if(!empty($_SESSION["error"]))
	{
		session_write_close();
		echo "<script>window.history.go(-1)</script>";
	}
	else
	{
		/*Create objects*/
		$fM = new fileManager();
		$db = new mysqlManager();
		$sM = new stringManager();
		$project = $db->selectRecord('project', NULL , array('idprojects' => $_POST["idproject"]));
		/*Clean variables*/
		$projectFolder = $project->data[0]->folder;
		$logoImage = $project->data[0]->logo;
		
		
		$projectName = $sM->cleanVariable($_POST["projectName"]);
		$projectDescription = $_POST["projectDescription"];
		$projectNote = $_POST["projectNote"];
		if(isset($_POST["projectStatus"]))
		{
			$status = 1;
		}
		else {
			$status = 0;
		}
		
		if($_FILES["projectLogo"]["size"] > 0)
		{
		/*Get the width and the height of the image, the minimun size of the imge is 400x400*/
			list($width, $height) = getimagesize($_FILES['projectLogo']['tmp_name']);
			if($width >= 400 and $height >= 400)
			{
				/*Only jpg, png and jpeg image*/
				$ext = pathinfo($_FILES['projectLogo']['name'], PATHINFO_EXTENSION);
				$extensions = Array('jpg', 'png', 'jpeg');
				if(in_array($ext, $extensions))
				{
					/*Generate a random name for the image*/
					$imageName = $sM->generateFullRandomCode();
					if($fM->fileUpload($_FILES['projectLogo'], "../../../images/$projectFolder/" , $imageName))
			        {
			        	/*Create thumbnails*/
			        	$fM->createThumbnail("../../../images/$projectFolder/", $imageName . '.' . $ext, "../../../images/$projectFolder/thumb400/", 400);
						$fM->createThumbnail("../../../images/$projectFolder/thumb400/", $imageName . '.' . $ext, "../../../images/$projectFolder/thumb100/", 100);
						
						unlink("../../../images/$projectFolder/$logoImage");
						unlink("../../../images/$projectFolder/thumb400/$logoImage");
						unlink("../../../images/$projectFolder/thumb100/$logoImage");
						$logoImage = $imageName . '.' . $ext;
					}
				}
					
			}
		}
		
		 
		 /*Records for project table*/
		$records = array(
			'name' => $projectName,
			'idproject_type' => $_POST["projectType"],
			'logo' => $logoImage,
			'description' => $projectDescription,
			'note' => $projectNote,
			'status' => $status,
			'updated_by' => $_SESSION["iduser"],
			'updated_date' => date('Y-m-d H:i:s')
			
		);
		$update = $db->updateRecord("project", $records, array('idprojects' => $_POST["idproject"]));
		/*Insert of users project*/
		$db->deleteRecord("project_user",array('idproject' => $_POST["idproject"]));
		foreach($_POST["projectUsers"] as $pu)
		{
			$projectUsers = array(
				'iduser' => $pu,
				'idproject' => $_POST["idproject"]
			);
			$insert = $db->insertRecord("project_user", $projectUsers);
		}
		
		
		session_write_close();
		/*Go back to the project panel*/
		header("Location: ../../../admin?form=projectpanel" );
	}

	
	
	
	
}



?>