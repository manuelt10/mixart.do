<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<meta name="HandheldFriendly" content="true" />

<title>mixart</title>

<link rel="shortcut icon" href="favicon.png"/>	

<link rel="stylesheet" type="text/css" href="styles/home.css"/>
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

<script type='text/javascript' src='scripts/jquery.min.js'></script>

</head>

<body>
<div class="container">	
	<div class="toColBar"></div>
	<div class="hea">
		<h2 class="logo landAnim">Mixart</h2>
		<div class="menuWrap landAnim">
			<div class="menu">
				<span class="itmBg"></span>
				<a href="index" class="itm  cont1i" data-color="#FCFCFC" data-sec="1">Info</a>
				<a href="projects" class="itm cont2i" data-color="#0ac2d2" data-sec="2">Projects</a>
				<a href="team" class="itm cont3i" data-color="#60d7a9" data-sec="3">Team</a>
				<a href="contacts" class="itm active cont4i" data-color="#fdc162" data-sec="4">Contact</a>
			</div>
		</div>
	</div>	
	<div class="cont4 sections" data-id="4">
		<div class="bod">
				Sparta!
		</div>
	</div>
</div>	
	
<script>

	/* menu items' hover animation */

	var /* dataColor = $('.active').data('color'), */
		itmDist,
		currItm = $('.active').data('sec'),
		baseWidth = 96,
		itmBGPos = (currItm-1)*baseWidth,
		origPos = itmBGPos;

		/* $('.container').css('background', dataColor); */

		$('.itmBg').css('left', itmBGPos);

	$('.itm').mouseenter(function(){
		 	currItm = $(this).data('sec');
			itmBGPos = (currItm-1)*baseWidth;
			
			$('.itmBg').css('left', itmBGPos);
		
	});
	
	$('.itm').mouseleave(function(){
		$('.itmBg').css('left', origPos);	
	});

	
</script>	
	


	<script>
		/* shows elements at first load with animation*/

		setTimeout(function(){
			$('.toColBar').css('top', 0);
		}, 200);
		
		$('body').find('.landAnim').each(function(i){
			$(this).addClass('anim'+i);
			
			
		});
		
		var cont = 0;
		setInterval(function(){
			$('.anim'+cont).addClass('finished');
			cont++;
		}, 150);

	</script>
	
</body>

</html>