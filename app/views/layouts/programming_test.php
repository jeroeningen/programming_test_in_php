<!DOCTYPE html>
<html>
	<head>
	    <title>Programming test</title>
	    <?php echo $stylesheet->link('programming_test'); ?>
	    <?php echo $javascript->tag(array("jquery-1.5.2.min", "application")); ?>
	</head>
  	<body>
  		<div id="wrapper">
	  		<div id="header">
	  			<div id="logo">
	  			<?php 
	  				$html->link($html->image("logo.jpg", array('in_anchor' => true)), "/");
	  			?>
	  			</div>
	  			<div id="menu"></div>
	  		</div>
	  		<div id="content">
		  		<?php 
		  			eval('?>' . $content . '<?');
		  		?>
	  		</div>
	  	</div>
	</body>
</html>