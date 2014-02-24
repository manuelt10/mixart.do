<div class="userPanelWrapper">
	<a href="admin?form=newuser">New User</a>
	<div class="userHeader">
		<span>Username</span><span>Name</span><span>Mail</span>
	</div>
	<div>
		<?php 
		$record = $db->selectRecord('user');
		foreach($record->data as $rec)
		{
			?>
			<div>
				<span><?php echo $rec->username ?></span>
				<span><?php echo $rec->name ?></span>
				<span><?php echo $rec->mail ?></span>
			</div>
			<?php
		}
		
		?>
	</div>
</div>