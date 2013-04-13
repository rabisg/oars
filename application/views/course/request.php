<form method="POST" action="">
	<legend>Request Course</legend>
	<div class="span2">
		<select class="input-medium" name="course_type">
			<option>Compulsory</option>
			<option>Dept Elective</option>
			<option>Open Elective</option>
			<option>HSS Elective</option>
			<option>Science Elective</option>
		</select>
	</div>
	<div class="span2" style="margin-left:50px;">
		<select class="input-medium" name="regn_type">
			<option>Normal</option>
			<option>Repeat</option>
			<option>Substitute</option>
		</select>
	</div>
	<div class="span4" style="margin-left:50px;">
		<input autocomplete="off" type="text" name="course_offering" class="input-xlarge" data-provide="typeahead" data-items="10" data-source='["<? echo implode($options, '", "')?>"]'>
		</div>
	<div class="span2">
		<button class="btn btn-primary">Submit</button>
	</div>
</form>