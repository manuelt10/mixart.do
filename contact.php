<?php 
session_start();
$session = $_SESSION;
session_write_close();

function autoLoader($class)
{
    $path = "classes/$class.php";
    include $path;
}
spl_autoload_register('autoLoader');

$db = new mysqlManager();
if(!empty($session["iduser"]))
{
	
	$data = $db->selectRecord('user',NULL,Array("iduser" => $session["iduser"]));
	
	$user = new user($data->data[0]);
	
}
require_once('templates/hea.php');
?>
	<div class="cont4 sections" data-id="4">
		<div class="bod">
				<form method="post" action="functions/send_message.php">
					<label>Name</label>
					<input name="messageName" required>
					<label>E-mail</label>
					<input type="text" name="messageMail" required>
					<label>Message</label>
					<textarea name="messageText"></textarea>
					<button type="submit">Send Message</button>
				</form>
		</div>
	</div>
<?php 
require_once('templates/foo.php');

?>