<?php
/**
 * Elgg comments add form
 *
 * @package Elgg
 *
 * @uses ElggEntity $vars['entity'] The entity to comment on
 * @uses bool       $vars['inline'] Show a single line version of the form?
 */


if (isset($vars['entity']) && elgg_is_logged_in()) {
	
	$inline = elgg_extract('inline', $vars, false);
	
	if ($inline) {
		echo '<div class="form-group">';
		echo elgg_view('input/text', array('name' => 'generic_comment'));
		echo '</div>';
		
		echo elgg_view('input/button', array('value' => elgg_echo("comment"), "class"=>"btn btn-primary btn-sm","type"=>'submit'));
	} else {
?>
	<div>
		<label><?php echo elgg_echo("generic_comments:add"); ?></label>
		<?php echo elgg_view('input/longtext', array('name' => 'generic_comment')); ?>
	</div>
	<div class="elgg-foot">
<?php
		echo elgg_view('input/button', array('value' => elgg_echo("generic_comments:post"), "class"=>"btn btn-primary","type"=>'submit'));
?>
	</div>
<?php
	}
	
	echo elgg_view('input/hidden', array(
		'name' => 'entity_guid',
		'value' => $vars['entity']->getGUID()
	));
}