<?
/**
 * This is a bootstrapped form, you should pass along the following
 * array to this view to render it properly.
 *
 * $fields = array(
 *    array(
 *       'name' => What post variable it will return. [ex. first_name]
 *       'type' => The field type [ex. password, text, etc.]
 *       'default' => The default value for this field.
 *    )
 * )
 */
?>

<form class="form-horizontal" method="POST">
   <? foreach ($fields as $field): ?>
      <div class="control-group">
      	<label class="control-label"><?= $field['name'] ?></label>
         <div class="controls">
            <? if (strcmp($field['type'], 'select')!=0): ?>
   				<input 
                  class="input-xlarge" 
                  type="<?= $field['type'] ?>" 
                  name="<?= $field['name'] ?>" 
                  value="<? if (!empty($value)) echo $value; ?>" 
               />
            <? else: ?>
               <select name="<?= $field['name'] ?>" >
                  <? foreach ($field['options'] as $option): ?>
                     <option value="<?= $option ?>"><?= $option ?></option>
                  <? endforeach; ?>
               </select>
            <? endif; ?>
			</div>
      </div>
   <? endforeach; ?>

   <div class="form-actions">
      <button type="submit" class="btn btn-primary">Submit</button>
   	<a onclick="history.go(-1)" class="btn">Cancel</a>
   </div>
</form>