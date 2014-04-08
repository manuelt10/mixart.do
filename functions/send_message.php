<?php 
/*No empty*/
	if(!empty($_POST["messageMail"]) and !empty($_POST["messageName"]) and !empty($_POST["messageText"]))
	{
		/*Is valid email address*/
		if(preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST["messageMail"]))
		{
			$from = 'no-reply@mixart.do';
		    $subject = $_POST["messageMail"] . ' - ' . $_POST["messageName"];
		    $message = $_POST["messageText"];
		    $message = wordwrap($message, 70);
		    mail("manu.rosariob@gmail.com",$subject,$message,"From: $from\n");
		}
	}
	header('Location:' . $_SERVER["HTTP_REFERER"]);
?>