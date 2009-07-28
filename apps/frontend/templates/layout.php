<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
	<script type="text/javascript" src="/js/new_file.js" />
		
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
	<div id="container" >
	  <div id="navigation" >
	    <ul>
	      <li><?php echo link_to('Novo vprašanje', 'vprasanje/new') ?></li>
	      <li><?php echo link_to('domov', 'main/index') ?></li>
	      <li><?php echo link_to('O svetovalnici', 'main/about') ?></li>
	      <li><?php echo link_to('Svetovalci', 'svetovalci/index') ?></li>
	      <li><?php echo link_to('List of posts', 'post/index') ?></li>
	      <li><?php echo link_to('List of comments', 'comment/index') ?></li>
	    </ul>
	  </div>
	  <div id="title">
	    <h1><?php echo link_to('My first symfony project', '@homepage') ?></h1>
	  </div>
	 
	  <div id="content">
	    <?php echo $sf_data->getRaw('sf_content') ?>
		<br style="clear:both"/>
	  </div>
	</div>
</html>
