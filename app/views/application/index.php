<h1>Upload a XML file with addresses</h1>
<p>
	Use the form below to choose an XML file from your hard disk and upload it to the server. The XML file contains a number of records with contact data of persons. 
</p>
<?php 
	$form->create('xml', 'filter', array('multipart' => true));
	$form->file_field('xml_file');
	$form->submit('Upload XML');
	$form->end();
?>