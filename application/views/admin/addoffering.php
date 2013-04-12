<form method="POST">
    <legend>Add Course Offering</legend>
    <div class="row-fluid">
      <div class="span4">
        <label>Course Number</label>
        <input type="text" class="input-xlarge" placeholder="CS101">
      </div>
    </div>
    <div class="row-fluid">
      <div class="span3">
        <label>Academic year</label>
        <input type="hidden" value="<? echo $this->config->item('PR_year') ?>">
        <input type="text" class="input-large" value="<? echo $this->config->item('PR_year') ?>" disabled="disabled">
      </div>
      <div class="span3 offset1">
        <label>Semester</label>
        <input type="hidden" value="<? echo $this->config->item('PR_sem') ?>">
        <input type="text" class="input-large" value="<? echo $this->config->item('PR_sem') ?>" disabled="disabled">
      </div>
    </div>
    <fieldset>
      <h4>
        Instructors
        <a href="#" id="addInst"><i class="icon-plus"></i></a>
      </h4>
      <div class="row-fluid">
        <table class="table" id="instructors">
          <tbody>
            <tr>
              <td>
                <select>
                  <option>Faculty-Instructor</option>
                  <option>Student-Instructor</option>
                </select>
              </td>
              <td>
                <input type="text" placeholder="Email id" class="input-xlarge">
              </td>
              <td>
                <label class="checkbox">
                  <input type="checkbox">Instructor in-charge
                </label>
              </td>
            </tr>
          </tbody>
        </table>
    </fieldset>

    <fieldset>
      <h4>Time Table 
        <a href="#" id="addMeeting"><i class="icon-plus"></i></a>
      </h4>
      <div class="row-fluid">
        <table class="table" id="meeting">
          <thead>
            <tr> <td>Meeting Type</td> <td>Day</td><td>Venue</td><td>Start Time</td><td>Duration</td> </tr>
          <tbody>
            <tr>
              <td>
                <select class="input-medium">
                  <option>Lecture</option>
                  <option>Tutorial</option>
                  <option>Lab</option>
                </select>
              </td>
              <td>
                <select class="input-medium">
                  <option>Monday</option>
                  <option>Tuesday</option>
                  <option>Wednesday</option>
                  <option>Thursday</option>
                  <option>Friday</option>
                  <option>Saturday</option>
                  <option>Sunday</option>
                </select>
              </td>
              <td>
                <input type="text" placeholder="eg: L7, CS101" class="input-medium">
              </td>              
              <td>
                <input type="text" placeholder="08:00am" class="input-small">
              </td>
              <td>
                <div class="input-append">
                  <input id="appendedInput" class="input-small" type="text" placeholder="eg: 50">
                  <span class="add-on">mins</span>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
    </fieldset>       
    <div class="row-fluid">
      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a onclick="history.go(-1)" class="btn">Cancel</a>
      </div>
    </div>
</form>

<script type="text/javascript">
$('#addInst').click(function() {
  //$('#instructors tr:last').after('<tr><td><select><option>Faculty-Instructor</option><option>Student-Instructor</option></select></td><td><input type="text" placeholder="Email id" class="input-xlarge"></td><td><label class="checkbox"><input type="checkbox">Instructor in-charge</label></td></tr>');
  $('#instructors tr:last').after('<tr>' + $('#instructors tr:first').html() + '</tr>');
});
$('#addMeeting').click(function() {
  $('#meeting tr:last').after('<tr>' + $('#meeting tbody tr:first').html() + '</tr>');
});
</script>