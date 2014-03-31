<style>
	.actualImage{
			width: 400px;
			height: 400px;
			position: relative;
			overflow: hidden;
			border: dashed 1px #AAA;
			border-radius: 4px;
		}
		
		.actualImage img{
			position: relative;
		}
</style>
<script src="scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
<div>
	<form method="post" action="functions/administrator/users/update_user.php" enctype="multipart/form-data">
		<legend>Update Profile</legend>
		<label>Name: </label><input type="text" name="memberName" value="<?php echo $user->getName(); ?>"><br>
		<label>Website: </label><input type="text" name="website" value="<?php echo $user->getWebsite(); ?>"><br>
		<label>Profile Image: </label><input type="file" name="memberImage" class="imageUploader"><br>
		<input type="hidden" class="coorX" name="x" value="0">
		<input type="hidden" class="coorY" name="y" value="0">
		<div class="actualImage userImage">
		
		</div>
		<?php 
		if($user->getImage() !== NULL)
		{
			?>
			<div class="usrImage">
				<img src="images/users/<?php echo $user->getImage(); ?>">
			</div>
			<?php
		}
		?>
		
		<label>Phone: </label><input type="text" name="phone" value="<?php echo $user->getPhone(); ?>"><br>
		<label>Cellphone: </label><input type="text" name="cellPhone" value="<?php echo $user->getCellPhone(); ?>"><br>
		
		
		<label>Description: </label>
		<textarea name="memberDescription" id="memberDescription"><?php echo $user->getDescription(); ?></textarea><br>
		<button type="submit">Send</button>
	</form>
	<form method="post" action="functions/administrator/users/change_pass.php">
		<legend>Change Password</legend>
		<label>Old Password:</label><input type="password" name="oldpass"><br>
		<label>New Password:</label><input type="password" name="newpass1"><br>
		<label>Repeat Password:</label><input type="password" name="newpass2"><br>
		<button type="submit">Change</button>
	</form>
</div>


<script type="text/javascript">
	//Function to create image preview
	function readURL(input) {

	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
			
	        reader.onload = function (e) {
	        	var image = new Image();
				image.src = e.target.result;
				
				image.onload = function(){
					if((this.width >= 400) && (this.height >= 400))
		        	{
			            $('.userImage').html('<img src="' + e.target.result + '">');
			        }
			        else
			        {
			        	alert('The image dimension need to be 400x400.');
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
<script type="text/javascript">
	CKEDITOR.replace( 'memberDescription' );
</script>