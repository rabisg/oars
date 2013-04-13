<table>
  <tr>
    <td class="span2"> Course No: </td>
    <td> <?= $fields->course_no ?> </td>
  </tr>
  <tr>
    <td class="span2"> Title: </td>
    <td> <?= $fields->title ?> </td>
  </tr>
  <tr>
    <td class="span2"> Units: </td>
    <td> <?= $fields->units ?> </td>
  </tr>
  <tr>
    <td class="span2"> Instructor-in-charge: </td>
    <td> <?= $fields->name . ' [<a href="mailto:'. $fields->email .'">' . $fields->email . '</a>]'?> </td>
  </tr>
  <tr>
    <td class="span2"> Office: </td>
    <td> <?= $fields->room_no . ', ' .$fields->office_bldg ?> </td>
  </tr>
  <tr>
    <td class="span2"> Instructor's Note: </td>
    <td> <?= $fields->syllabus ?> </td>
  </tr>  
  <tr>
    <td class="span2"> Hours of lecture: </td>
    <td> <?= $fields->hrs_of_lecture ?> hours</td>
  </tr> 
  <tr>
    <td class="span2"> Hours of Tutorial: </td>
    <td> <?= $fields->hrs_of_tutorial ?> hours </td>
  </tr> 
  <tr>
    <td class="span2"> Hours of Lab: </td>
    <td> <?= $fields->hrs_of_labs ?> hours </td>
</table>