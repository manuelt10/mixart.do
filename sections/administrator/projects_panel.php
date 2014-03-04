<div class="userPanelWrapper">
	<a href="admin?form=newproject">New Project</a>
	<div class="projectHeader">
		<span>Project Name</span><span>Status</span><span>Action</span>
	</div>
	<div>
		<?php 
			$project = $db->selectRecord('project');
			foreach($project->data as $p)
			{
				?>
				<div>
					<span><?php echo $p->name; ?></span>
					<span><?php echo $p->status == 1 ? "Visible" : "Invisible" ?></span>
					<span>
						<a href="?form=add_img_project&id=<?php echo $p->idprojects ?>">Add images</a>
						<a href="?form=esp_proj_img&id=<?php echo $p->idprojects ?>">Add Special Images</a>
						<a href="?form=change_project&id=<?php echo $p->idprojects ?>">Change Project</a>
					</span>
				</div>
				<?php
			}
		?>
	</div>
</div>