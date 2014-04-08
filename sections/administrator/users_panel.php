<div class="userPanelWrapper">
	<legend>
		User Panel
	</legend>
	<a href="admin.php?form=newuser" class="btn btn-default">New User</a>
	<table class="table">
		<thead>
			<th><strong>Username</strong></th>
			<th><strong>Name</strong></th>
			<th><strong>Mail</strong></th>
		</thead>
		<?php 
		$record = $db->selectRecord('user');
		foreach($record->data as $rec)
		{
			?>
			<tbody>
				<td><?php echo $rec->username ?></td>
				<td><?php echo $rec->name ?></td>
				<td><?php echo $rec->mail ?></td>
			</tbody>
			<?php
		}
		
		?>
		
	</table>
	
</div>