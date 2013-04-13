<?
/**
 * This is a bootstrapped table, you should pass along the following
 * array to this view to render it properly.
 *
 * $title = ''
 * $head = array();
 * $rows = array(array( ))
 */
$i = 1;
?>
<? if(isset($title)): ?>
  <h3 class="text-center subheading"><?= $title ?></h3>
<? endif; ?>
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
    <? if(count($rows)>0): ?>
    	<? foreach ($rows as $row): ?>
        <tr>
          <td> <?= $i++ ?> </td>
    			<? foreach ($row as $col): ?>
  	  			<td><?= $col ?> </td>
  	  		<? endforeach; ?>
    		</tr>
    	<? endforeach; ?>
    <? endif; ?>
  </tbody>
</table>