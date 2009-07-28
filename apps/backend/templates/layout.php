<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>


  <body>
  	<div id="navigation">
	  <ul style="list-style:none;">
		<li><?php echo link_to('home', 'home/index') ?></li>
		<li><?php echo link_to('Manage posts', 'post/index') ?></li>
		<li><?php echo link_to('Manage comments', 'comment/index') ?></li>
		<li><?php echo link_to('kategorije', 'kategorije/index') ?></li>
	    <li><?php echo link_to('vprasanja', 	'vprasanja/index') ?></li>
	    <li><?php echo link_to('svetovalci', 'svetovalci/index') ?></li>
	  </ul>
	</div>
    <?php echo $sf_content ?>
  </body>
</html>
