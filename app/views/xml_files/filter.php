<?php 
	$filter = new Filter();
	$session = new Session();
	$records = $filter->retrieve_xml($session->get('xml_file'));
?>
<h1>Remove doubles</h1>
<p>
	The file that you uploaded contains <b id="doubles"><?php echo count($records);?></b> records. 
	You can now remove all doubles from this file. 
	Use the checkboxes to specify the field or the combinatation of fields that should be unique. 
</p>
<?php 
	$form->create('filter', 'xml_files/result', array('id' => 'filter_form'));
	foreach (array_keys($records[0]) as $key) {
		echo '<div class="filter_form_inputs">';
		$form->checkbox('field[]', array('class' => 'remove_doubles', 'value' => $key));
		$form->label($key);
		echo "</div>";
	}
	echo '<div class="filter_form_inputs">';
	$form->submit('Download filtered file');
	echo "</div>";
?>
<p>
	Based on the checkboxes that you have selected, 
	<b id="removed_doubles">0</b> doubles were removed and the file now contains 
	<b id="nr_doubles"><?php echo count($records); ?></b>
	unique records.
</p> 