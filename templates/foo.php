	<div class="foo">
			
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
	
	var animCnt = 0,
		addAnimCnt = 0;

	setTimeout(function(){
		$('.toColBar').css('top', 0);
	}, 200);
	
	$('body').find('.landAnim').each(function(i){
		$(this).addClass('anim'+i);
		animCnt++;
		
	});

	var addAnim = setInterval(function(){
		$('.anim'+addAnimCnt).addClass('finished');
		addAnimCnt++;
		
		if(addAnimCnt == animCnt){
			clearInterval(addAnim);
			
/*
			addAnimCnt = 1;
			
			var animListInt = setInterval(function(){
				$('.listItm.' + addAnimCnt).addClass('shown');
				addAnimCnt++;
			}, 150);
*/
			
			console.log("finished at "+ addAnimCnt + "--" + animCnt);
		}
		
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