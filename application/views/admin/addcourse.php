<form method="POST" action="">
    <legend>Add Course</legend>
    <label>Course Name</label>
    <input class="input-xxlarge" type="text" name="title" placeholder="Fundamentals of Computing" required="required">
    <div class="row-fluid">
      <div class="span4">
        <label>Course Number</label>
        <input type="text" class="input-xlarge" name="course_no" placeholder="CS101" required="required">
      </div>
      <div class="span2 offset2">
        <label>Units</label>
        <div class="input-append">
          <input id="appendedInput" class="input-medium" name="units" type="text" required="required">
          <span class="add-on">units</span>
        </div>      
      </div>
    </div>
    <div class="row-fluid">
      <div class="span2">
        <label>Hours of Lecture</label>
        <div class="input-append">
          <input id="appendedInput" class="input-medium" name="hrs_of_lecture" type="text" required="required">
          <span class="add-on">hours</span>
        </div>
      </div>
      <div class="span2 offset1">
        <label>Hours of Tutorial</label>
        <div class="input-append">
          <input id="appendedInput" class="input-medium"  name="hrs_of_tutorial" type="text" required="required">
          <span class="add-on">hours</span>
        </div>
      </div>
      <div class="span2 offset1">
        <label>Hours of Labs</label>
        <div class="input-append">
          <input id="appendedInput" class="input-medium" name="hrs_of_labs" type="text" required="required">
          <span class="add-on">hours</span>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <label>Course Details</label>
      <textarea rows="5" class="span9" name="syllabus"></textarea>
    </div>
    <fieldset>
      <h4>
        Pre-requisite
        <a href="#" id="addP"><i class="icon-plus"></i></a>
      </h4>
      <div class="row-fluid">
        <table class="table" id="prereq">
          <tbody>
            <tr>
              <td>
                <input type="text" placeholder="Eeg: CS101" class="input-xlarge" name="prereq[]" requried="true">
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </fieldset>
    <div class="row-fluid">
      <div class="form-actions">
      <button type="submit" class="btn btn-primary">Submit</button>
        <a onclick="history.go(-1)" class="btn">Cancel</a>
       </div>
    </div>
</form>
<script type="text/javascript">
$('#addP').click(function() {
  //$('#instructors tr:last').after('<tr><td><select><option>Faculty-Instructor</option><option>Student-Instructor</option></select></td><td><input type="text" placeholder="Email id" class="input-xlarge"></td><td><label class="checkbox"><input type="checkbox">Instructor in-charge</label></td></tr>');
  $('#prereq tr:last').after('<tr>' + $('#prereq tr:first').html() + '</tr>');
});
</script>