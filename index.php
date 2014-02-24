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

	<div class="cont1 sections shown" data-id="1">
		<div class="bod landAnim">
			<h2 class="sectTitle">What?</h2>
			<p>Mixart is a small team of young developers who thrive for perfection. What we make, we do it with love. Really.</p>
			
			<h2 class="sectTitle">It's all about <span class="bold">The Mix</span> <span class="lower">(pending trademark)</span></h2>
			<p>We can't tell you what our Secret Mix is made of, it's a secret, after all. But we can tell you how our process to bake delicious websites looks like:</p>
			
			<ul class="procList">
			 <li class="listItm one landAnim">
			 	<span class="stepNumber">1</span>
			 	<div class="stepDescrWrap">
				 	<h3>It starts with a sketch</h3>
				 	<p>It doesn't needs to be perfect, just a couple of lines here and some squares there. Cake's base is done.</p>
				 	
			 	</div>
			 	<!--
<div class="stepImgWrap">
			 		<img class="stepImg" src="images/sketchSmallW.jpg"  />
			 	</div>
-->
			 </li>
			  <li class="listItm two landAnim">
			  	<span class="stepNumber">2</span>
			  	<div class="stepDescrWrap">
				 	<h3>Get The Mix ready</h3>
				 	<p>Add some PHP, fill with a few queries, and stir until there are no more crumbs, or any other errors, for that matter.</p>
				 	
			 	</div>
			  </li>
			  <li class="listItm three landAnim">
			  	<span class="stepNumber">3</span>
			  	<div class="stepDescrWrap">
				 	<h3>Add layers!</h3>
				 	<p>CSS is your best friend, give shape to the cake! Try as many moulds as possible (beware of those pesky old browsers!). Add JavaScript to taste.</p>
				 	
			 	</div>
			  </li>
			   <li class="listItm four landAnim">
			  	<span class="stepNumber">4</span>
			  	<div class="stepDescrWrap">
				 	<h3>Serve it</h3>
				 	<p>Does it tastes like heaven? Yes? Then it's tasting time! Send it to the clients, we are sure they're gonna love it.</p>
				 	
			 	</div>
			  </li>
			 
			</ul>
		</div>
		
	</div>
	
<?php 
require_once('templates/foo.php');

?>