<script src="scripts/ckeditor/ckeditor.js" type="text/javascript"></script>
<div>
	<form>
		<label>Name: </label><input type="text" name="memberName"><br>
		<label>Profile Image: </label><input type="file" name="memberImage"><br>
		<label>Phone: </label><input type="text" name="phone"><br>
		<label>Cellphone: </label><input type="text" name="cellPhone"><br>
		
		
		<label>Description: </label>
		<textarea name="memberDescription" id="memberDescription"></textarea><br>
		<button type="button">Add Section</button>
		<div class="sectionWrapper">
			
		</div>
		<button type="submit">Send</button>
	</form>
</div>



<script type="text/javascript">
	CKEDITOR.replace( 'memberDescription' );
</script>