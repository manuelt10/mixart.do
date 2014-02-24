<?php 
	session_start();
	$session = $_SESSION;
	unset($_SESSION["error"]);
	session_write_close(); 
	
	if(!empty($session["iduser"]))
	{
		header("Location: index.php");
	}
	
	require_once("templates/hea.php");
	
?>

<form method="POST" action="functions/login">
	<fieldset>
		<legend>Acceso de usuarios</legend>
		<input type="text" name="username"><br>
		<input type="password" name="password"><br>
		<?php 
			echo empty($session["error"]) ? "" : $session["error"];
		?>
		<button type="submit">Entrar</button>
	</fieldset>
</form>

<?php 
require_once("templates/foo.php");
?>