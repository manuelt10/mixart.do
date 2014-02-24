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


/*Form validation*/
if(empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["password2"]) or empty($_POST["email"]))
{
		$_SESSION["error"]["emptyErr"] = "<label class='error-label'>There are empty mandatory fields.</label>";
}
if($_POST["password2"] <> $_POST["password"])
{
		$_SESSION["error"]["passErr"] = "<label class='error-label'>Password mismatch.</label>";
}
if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST["email"]))
{
	$_SESSION["error"]["emailErr"] = "<label class='error-label'>Invalid Email.</label>";
}
	/*Creating objects*/
	$fM = new fileManager();
	$db = new mysqlManager();
	$sM = new stringManager();
	
	
	/*Verify if the username already exist*/
	$where = Array(
		"username" => $_POST["username"]
	);
	$record = $db->selectRecord("user",NULL,$where);
	if($record->data[0]->rowcount > 0)
	{
		$_SESSION["error"]["userExistErr"] = "<label class='error-label'>User exist.</label>";
	}
	/*Go Back if there is an error on the form*/
	if(!empty($_SESSION["error"]))
	{
		session_write_close();
		echo "<script>window.history.go(-1)</script>";
	}
	else{
		if($_FILES['userimage']['size'] > 0)
		{
			/*Get the width and the height of the image, the minimun size of the imge is 400x400*/
			list($width, $height) = getimagesize($_FILES['userimage']['tmp_name']);
			if($width >= 400 and $height >= 400)
			{
				/*Only jpg, png and jpeg image*/
				$ext = pathinfo($_FILES['userimage']['name'], PATHINFO_EXTENSION);
				$extensions = Array('jpg', 'png', 'jpeg');
				if(in_array($ext, $extensions))
				{
					/*Generate a random name for the image*/
					$imageName = $sM->generateFullRandomCode();
					if($fM->fileUpload($_FILES['userimage'], '../../../images/users/' , $imageName))
			        {
			        	/*Create thumbnails*/
			        	$fM->createThumbnail('../../../images/users/', $imageName . '.' . $ext, '../../../images/users/thumb400/', 400);
						$fM->createThumbnail('../../../images/users/thumb400/', $imageName . '.' . $ext, '../../../images/users/thumb100/', 100);
					
					}
				}
			}
		}
		/*Clean variables*/
		$userName = $sM->cleanVariable($_POST["username"]);
		$name = $sM->cleanVariable($_POST["name"]);
		$mail = $sM->cleanVariable($_POST["email"]);
		$phone = $sM->cleanVariable($_POST["phone"]);
		$cellPhone = $sM->cleanVariable($_POST["cellphone"]);
		
		/*Record for insert*/
		$records = Array (
			"username" => $userName,
			"password" => md5($_POST["password"]),
			"name" => $name,
			"image" => $imageName . '.' . $ext,
			"mail" => $mail,
			"phone" => $phone,
			"cellphone" => $cellPhone,
			"user_type" => $_POST["tipo_usuario"],
			"created_by" =>$session["iduser"] 
		);
		/*Insert*/
		$db->insertRecord("user", $records);
		session_write_close();
		/*Go back to the users panel*/
		header("Location: ../../../admin?form=userspanel" );
	}
?>