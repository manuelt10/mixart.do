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
				<a href="index" class="itm cont1i" data-color="#FCFCFC" data-sec="1">Info</a>
				<a href="projects" class="itm cont2i" data-color="#0ac2d2" data-sec="2">Projects</a>
				<a href="team" class="itm active cont3i" data-color="#60d7a9" data-sec="3">Team</a>
				<a href="contact" class="itm cont4i" data-color="#fdc162" data-sec="4">Contact</a>
			</div>
		</div>
	</div>
	<div class="cont3 sections" data-id="3">
		<div class="bod">
				Not
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
		/* shows elements at first load */

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
	
	<!--
<script>
		$('.itm').click(function(){
		
			var dispSec = $(this).data('sec');
			var actColor = $(this).data('color');
			
			if($('.shown').hasClass('cont'+dispSec+'')){
				
			}
			
			else{
				if(dispSec == "1"){
					$('.Col').removeClass('Col');
				}
				
				else{
					$('.logo').addClass('Col');
					$('.itmBg').addClass('Col');
					$('.menuWrap').addClass('Col');
					$('.itm').addClass('Col');
				}
				
				$('.shown').addClass('decolor');
				
				$('.cont' + dispSec).addClass('shown');
				
				$('.container').children('.sections').each(function(){
					
					var dataID = $(this).data('id');
					
					if(dataID < dispSec){
						$(this).addClass('top');
						$(this).removeClass('shown');
					}
					
					else if(dataID > dispSec){
						$(this).removeClass('top');
						$(this).removeClass('shown');
					}
					
				})
				
				/*
if($('.'+dispSec).hasClass('top')){
					
					$('.shown').removeClass('shown');
					$('.top').addClass('shown');
					$('.top').removeClass('top');
				}
				
				else{
					$('.top').removeClass('top');
					$('.shown').addClass('top');
					$('.shown').removeClass('shown');
					$('.'+dispSec).addClass('shown');
				}
*/
			}
			
			
		
		});
		
		$('.itm').mouseup(function(){
			$('.decolor').removeClass('decolor');
		});
	</script>
-->
	
</body>

</html>