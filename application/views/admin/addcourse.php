<form method="POST" action="">
    <legend>Add Course</legend>
    <label>Course Name</label>
    <input class="input-xxlarge" type="text" name="title" placeholder="Fundamentals of Computing">
    <div class="row-fluid">
      <div class="span4">
        <label>Course Number</label>
        <input type="text" class="input-xlarge" name="course_no" placeholder="CS101">
      </div>
      <div class="span2 offset2">
        <label>Units</label>
        <div class="input-append">
          <input id="appendedInput" class="input-medium" name="units" type="text">
          <span class="add-on">units</span>
        </div>      
      </div>
    </div>
    <div class="row-fluid">
      <div class="span2">
        <label>Hours of Lecture</label>
        <div class="input-append">
          <input id="appendedInput" class="input-medium" name="hrs_of_lecture" type="text">
          <span class="add-on">hours</span>
        </div>
      </div>
      <div class="span2 offset1">
        <label>Hours of Tutorial</label>
        <div class="input-append">
          <input id="appendedInput" class="input-medium"  name="hrs_of_tutorial" type="text">
          <span class="add-on">hours</span>
        </div>
      </div>
      <div class="span2 offset1">
        <label>Hours of Labs</label>
        <div class="input-append">
          <input id="appendedInput" class="input-medium" name="hrs_of_labs" type="text">
          <span class="add-on">hours</span>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <label>Course Details</label>
      <textarea rows="5" class="span9" name="syllabus"></textarea>
    </div>
    <div class="row-fluid">
      <div class="form-actions">
      <button type="submit" class="btn btn-primary">Submit</button>
        <a onclick="history.go(-1)" class="btn">Cancel</a>
       </div>
    </div>
</form>