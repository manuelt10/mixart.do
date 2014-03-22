<?php 

session_start();
$session = $_SESSION;
session_write_close();
#auto upload of classes
function autoLoader($class)
{
    $path = "../../../classes/$class.php";
    include $path;
}
spl_autoload_register('autoLoader');

/*
 There need to be a logged user
 */
if(!empty($session["iduser"]))
{
	/*
	 If passwords aren't empty 
	 */
	if(!empty($_POST["oldpass"]) and !empty($_POST["newpass1"]) and !empty($_POST["newpass2"]))
	{
		/*
		 passwords need to be equals 
		 */
		if($_POST["newpass1"] == $_POST["newpass2"])
		{
			/*
			 get user info 
			 */
			$db = new mysqlManager();
			$user_data = $db->selectRecord('user',NULL,Array('iduser' => $session["iduser"]));
			/*
			 if passwords are the same 
			 */
			if(md5($_POST["oldpass"]) == $user_data->data[0]->password)
			{
				/*
				 update records 
				 */
				$records = array('password' => md5($_POST["newpass2"]),
								 'updated_by' => $session["user"],
								 'updated_date' => $date = date('Y-m-d H:i:s')
				);
				$db->updateRecord('user', $records, array('iduser' => $session["iduser"]));
			}
		}
	}

}
header('Location: ' . $_SERVER["HTTP_REFERER"]);
?>