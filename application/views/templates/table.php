<?
/**
 * This is a bootstrapped table, you should pass along the following
 * array to this view to render it properly.
 *
 * $head = array();
 * $rows = array(array( ))
 */
$i = 1;
?>
<table class="table table-striped">
  <thead>
	<tr>
    <td>#</td>
		<? foreach ($head as $h): ?>
	  		<th><?= $h ?> </th>
	  	<? endforeach; ?>
	</tr>
  </thead>
  <tbody>
  	<? foreach ($rows as $row): ?>
      <tr>
        <td> <?= $i++ ?> </td>
  			<? foreach ($row as $col): ?>
	  			<td><?= $col ?> </td>
	  		<? endforeach; ?>
  		</tr>
  	<? endforeach; ?>
  </tbody>
</table>