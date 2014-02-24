<div>
	<div>
		<a href="?form=change_profile">Update Profile</a>
	</div>
	<div class="proilePic">
	<?php 
	if((file_exists('images/users/thumb400/' . $user->getImage())) and ($user->getImage() !== NULL))
	{
		?>
		<img alt="<?php echo $user->getName(); ?>" src="images/users/thumb400/<?php echo $user->getImage(); ?>">
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