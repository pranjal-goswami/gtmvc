{include file="_header.tpl"}
<div class="container">
	<div class="row">
	<div class="col-md-5 well">
		<form role="form" action="create.php" method="post">
		  <legend>Create New App</legend>
		  <div class="form-group">
			<label for="app_name">APP Name</label>
			<input type="text" class="form-control" id="app_name" name="app_name" placeholder="Name of the APP" required>
		  </div>
		  <div class="form-group">
			<label for="app_keyword">APP Prefix/Keyword</label>
			<input type="text" class="form-control" id="app_keyword" name="app_keyword" 
				placeholder="Keep it short like INSCRIBE" required>
		  </div>
		  <div class="form-group">
			<label for="app_keyword">APP URL</label>
			<input type="text" class="form-control" id="app_url" name="app_url" 
				placeholder="skip the http://" required>
		  </div>
		  
		  <button type="submit" class="btn btn-info">Create Project</button>
		</form>
	</div>
	</div>
</div>

{include file="_footer.tpl"}