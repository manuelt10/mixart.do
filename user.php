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


if(!empty($session["iduser"]))
{
	$db = new mysqlManager();
	$data = $db->selectRecord('user',NULL,Array("iduser" => $session["iduser"]));
	
	$user = new user($data->data[0]);
	
}
require_once('templates/hea.php');
?>

<?php 
print_r($_GET);
?>


<?php 
require_once('templates/foo.php');

?>