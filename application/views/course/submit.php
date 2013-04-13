<div class="row-fluid">
	<form method="POST" action="">
		<legend>Submit Request</legend>
		<div class="span4" style="margin-left:50px;">
			<select name="course_offering" class="input-xlarge">
				<? foreach($options as $option): ?>
					<option value="<?= $option->course_offering ?>"><?= $option->text ?></option>
				<? endforeach; ?>
			</select>
			</div>
		<div class="span2">
			<button class="btn btn-primary">Register</button>
		</div>
	</form>
</div>
<div class="row-fluid">
	<div class="centered offset4" style="margin-top:50px;lo">
		<button class='btn btn-danger btn-large'>Submit</button>
	</div>
</div>