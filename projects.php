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
				<a href="projects" class="itm active cont2i" data-color="#0ac2d2" data-sec="2">Projects</a>
				<a href="team" class="itm cont3i" data-color="#60d7a9" data-sec="3">Team</a>
				<a href="contact" class="itm cont4i" data-color="#fdc162" data-sec="4">Contact</a>
			</div>
		</div>
	</div>
	<div class="cont2 sections" data-id="2">
		<div class="bod projects">
				<div class="proyWrap landAnim">
					<h3 class="proyTitle"><a href="http://www.tumall.do">tuMall</a> <span class="smallTitle">(in the oven)</span></h3>
					<div class="proyImgWrap">
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-1.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-2.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-3.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-4.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-5.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-6.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-7.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/tumall/tumall-8.jpg" />
						</span>
					</div>
				</div>
				
				<div class="proyWrap landAnim">
					<h3 class="proyTitle"><a href="https://www.facebook.com/BLUECOUNTRYJEANS/app_208195102528120">First Audiovisual Festival - Blue Country</a> </h3>
					<div class="proyImgWrap">
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-1.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-2.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-3.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-4.jpg" />
						</span>
<!--
						<span class="proyImgMask transTw">
							<img src="images/bluec/bluec-5.jpg" />
						</span>
-->
					</div>
				</div>
				
				<div class="proyWrap landAnim">
					<h3 class="proyTitle"><a href="http://www.sun-age.org">Sunage</a> <span class="smallTitle">(Colab with <a class="inAnchor" target="_blank" href="http://www.olivo.do">Olivo.do</a>)</span></h3>
					<div class="proyImgWrap">
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-1.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-2.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-3.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-4.jpg" />
						</span>
<!--
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-5.jpg" />
						</span>
-->
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-6.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/sunage/suna-7.jpg" />
						</span>
					</div>
				</div>

				<div class="proyWrap landAnim">
					<h3 class="proyTitle"><a href="http://www.dreamcher.com">Dreamcher</a></h3>
					<div class="proyImgWrap">
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-1.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-2.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-3.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-4.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-5.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-6.jpg" />
						</span>
						<span class="proyImgMask transTw">
							<img src="images/dreamcher/dreams-7.jpg" />
						</span>
					</div>
				</div>				
				
		</div>
	</div>

	

</div>	
	
<script>

	/* menu hover animation */

	var itmDist,
		currItm = $('.active').data('sec'),
		baseWidth = 96,
		itmBGPos = (currItm-1)*baseWidth,
		origPos = itmBGPos;

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

	
<script> //zooms yay!
	
	var zoomSRC,
		realPosX,
		realPosY,
		currImgPosX,
		currImgPosY,
		imgMoveX,
		imgMoveY;
		
		$('.proyImgMask img').on('mouseenter', function(){
			currImgPosX = $(this).offset().left;
			currImgPosY = $(this).offset().top;
			
			zoomSRC = $(this).attr('src');
			
			$(this).parent().append('<div class="zoomWrap"><img src='+ zoomSRC +' /></div>');
		});
		
		$('.proyImgMask').on('mouseleave', function(){
			$('.zoomWrap').remove();
			$('.hoverable').remove();
		});
		
		$('.proyImgWrap').on('mousemove', function(event){
			
			realPosX = event.pageX - currImgPosX;
			realPosY = event.pageY - currImgPosY;
			
			console.log(realPosY);
			
			$('.zoomWrap').css({
				left: (realPosX-100),
				top: (realPosY-100)
			})
			
			imgMoveX = (realPosX*2.825)-100;
			imgMoveY = (realPosY*2.825)-100;
			
			$('.zoomWrap img').css({
				left: -imgMoveX,
				top: -imgMoveY
			})
			
			
		});
		
	
</script>	
	
	
</body>

</html>