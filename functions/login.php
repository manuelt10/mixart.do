<?php 
function autoLoader($class)
{
    $path = "../classes/$class.php";
    include $path;
}
spl_autoload_register('autoLoader');

if(!empty($_POST["username"]) or !empty($_POST["password"]))
{
	$db = new mysqlManager();
	$where = Array(
	"username" => $_POST["username"], 
	"password" => md5($_POST["password"]));
	$data = $db->selectRecord('user',NULL,$where);
	if($data->rowcount == 1)
	{
		session_start();
		$_SESSION["iduser"] = $data->data[0]->iduser;
		session_write_close();
		header("Location: ../index");
	}
	else
	{
		session_start();
		$_SESSION["error"] = "<label class='error-label'>El usuario o la contraseña son invalidos.</label>";
		session_write_close();
		?>
		<script>
			window.history.go(-1);
		</script>
		<?php
	}
}
else
{
	session_start();
	$_SESSION["error"] = "<label class='error-label'>El usuario o la contraseña estan vacias.</label>";
	session_write_close();
	?>
	<script>
		window.history.go(-1);
	</script>
	<?php
}

?>