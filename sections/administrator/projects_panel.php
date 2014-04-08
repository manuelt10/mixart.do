<div class="userPanelWrapper">
	<a href="admin.php?form=newproject">New Project</a>
	<table class="table">
		<thead>
			<th><strong>Project Name</strong></th>
			<th><strong>Status</strong></th>
			<th><strong>Action</strong></th>
		</thead>
		<?php 
			$project = $db->selectRecord('project',NULL,NULL,Array('created_date' => 'desc'));
			foreach($project->data as $p)
			{
				?>
				<tbody>
					<td><?php echo $p->name; ?></td>
					<td><?php echo $p->status == 1 ? "Visible" : "Invisible" ?></td>
					<td>
						<a class="btn btn-default" href="?form=add_img_project&id=<?php echo $p->idprojects ?>">Add images</a>
						<a class="btn btn-default" href="?form=esp_proj_img&id=<?php echo $p->idprojects ?>">Add Special Images</a>
						<a class="btn btn-default" href="?form=change_project&id=<?php echo $p->idprojects ?>">Change Project</a>
					</td>
				</tbody>
				<?php
			}
		?>
		</table>
</div>