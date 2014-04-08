<div>
	<div>
		<a href="?form=change_profile">Update Profile</a>
	</div>
	<div class="proilePic">
	<?php 
	if($user->getImage() !== NULL)
	{
		?>
		<img alt="<?php echo $user->getImage(); ?>" src="images/users/<?php echo $user->getImage(); ?>">
		<?php
	}
	?>
	
	</div>
	<div class="profileData">
		<span><?php echo $user->getName() ?></span><br>
		<span><?php echo $user->getMail() ?></span><br>
		<span><?php echo $user->getDescription() ?></span><br>
		<span><?php echo $user->getPhone() ?></span><br>
		<span><?php echo $user->getCellPhone() ?></span><br>
	</div>
</div>