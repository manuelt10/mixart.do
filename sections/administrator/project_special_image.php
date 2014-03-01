<style>
	.actualImage{
			width: 565px;
			height: 465px;
			position: relative;
			overflow: hidden;
			border: dashed 1px #AAA;
			border-radius: 4px;
		}
		
		.actualImage img{
			position: relative;
		}
</style>


<form action="functions/administrator/projects/upload_image.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="idproject" value="<?php echo $_GET["id"]; ?>">
	<input type="file" name="projectImage" class="imageUploader">
	<div class="actualImage projImage">
		
	</div>
	<input type="hidden" class="coorX" name="x" value="0">
	<input type="hidden" class="coorY" name="y" value="0">
	<button type="submit">Send</button>
</form>


<script type="text/javascript">
	//Function to create image preview
	function readURL(input) {

	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
			
	        reader.onload = function (e) {
	        	var image = new Image();
				image.src = e.target.result;
				
				image.onload = function(){
					if((this.width >= 565) && (this.height >= 465))
		        	{
			            $('.projImage').html('<img src="' + e.target.result + '">');
			        }
			        else
			        {
			        	alert('The image dimension need to be 565x465.');
			        	var imageUploader = $('.imageUploader');
			        	imageUploader.replaceWith( imageUploader = imageUploader.clone( true ) );
			        	$('.projImage').empty();
			        	$('.coorX').val(0);
			        	$('.coorY').val(0);
			        }
				}
	        	
	        }
	
	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$(".imageUploader").change(function(){
	    readURL(this);
	});
</script>
<script type="text/javascript"> //draggable image repositionator (pending trademark)
	var draggy  = $('.projImage img'),
		clickCoordX,
		clickCoordY,
		lastImgPosX,
		lastImgPosY,
		newImgPosX,
		newImgPosY,
		imgWidthDiff,
		imgHeightDiff;

	$('.actualImage').on('mousedown', 'img', function(event){
		draggy = $(this);
		draggy.addClass('draggable');
		imgWidthDiff 	= (draggy.parent().width() - draggy.width());
		imgHeightDiff 	= (draggy.parent().height() - draggy.height());
		lastImgPosX 	= draggy.offset().left - draggy.parent().offset().left;
		lastImgPosY 	= draggy.offset().top - draggy.parent().offset().top;
		clickCoordX 	= event.pageX;
		clickCoordY 	= event.pageY;
		
	})
	
	$('.actualImage').on('dragstart', draggy, function(event){
		event.preventDefault();
	})
	
	$('html').mouseup(function(){ 
		if(draggy.hasClass('draggable')){
			
			draggy.parent().siblings('.coorX').val((-1)*draggy.position().left);
			draggy.parent().siblings('.coorY').val((-1)*draggy.position().top);
			
		}
		
		draggy.removeClass('draggable');
		
	
	})	
	
	$('html').mousemove(function(event){
		
		if(draggy.hasClass('draggable')){
			
			newImgPosX = (lastImgPosX + (event.pageX - clickCoordX));
			newImgPosY = (lastImgPosY + (event.pageY - clickCoordY));

			if(newImgPosX > 0 && newImgPosY > 0){
				$('.draggable').css({
					left: 0,
					top: 0
				});
				
			}
			
			else if(newImgPosX < imgWidthDiff && newImgPosY > 0){
				$('.draggable').css({
					left: imgWidthDiff,
					top: 0
				});
				
			}
			
			else if(newImgPosX > 0 && newImgPosY < imgHeightDiff){
				$('.draggable').css({
					left: 0,
					top: imgHeightDiff
				});
				
			}
			
			else if(newImgPosX < imgWidthDiff && newImgPosY < imgHeightDiff){
				$('.draggable').css({
					left: imgWidthDiff,
					top: imgHeightDiff
				});
				
			}
			
			else if(newImgPosX > 0){
				$('.draggable').css({
					left: 0,
					top: newImgPosY
				});
				
			}
			
			else if(newImgPosX < imgWidthDiff){
				$('.draggable').css({
					left: imgWidthDiff,
					top: newImgPosY
				});
				
			}
			
			else if(newImgPosY > 0){
				$('.draggable').css({
					left: newImgPosX,
					top: 0
				});
				
			}
			
			else if(newImgPosY < imgHeightDiff){
				$('.draggable').css({
					left: newImgPosX,
					top: imgHeightDiff
				});
				
			}			
			
			else{
				$('.draggable').css({
					left: newImgPosX,
					top: newImgPosY
				});
			}		
		
		}
		
	});
	
</script>