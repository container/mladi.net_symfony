<html lang="sl" xmlns="http://www.w3.org/1999/xhtml" xml:lang="sl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta content="text/html; charset=utf-8" http-equiv="content-type"/> 
<link media="all" type="text/css" href="<?php echo public_path('/admin/css/admin.css')?>"  rel="stylesheet"/>
<link media="all" type="text/css" href="<?php echo public_path('/admin/css/colors.css')?>" rel="stylesheet"/>
<link media="all" type="text/css" href="<?php echo public_path('/admin/css/main.css')?>"   rel="stylesheet"/>
<link href="/favicon.ico" rel="shortcut icon"/>
<script type='text/javascript' src='<?php echo public_path('/admin/js/jquery.js')?>'></script>
<script type='text/javascript' src='<?php echo public_path('/admin/js/common.dev.js')?>'></script>

</head>
<body class="wp-admin js post-php">
<div id="wpwrap">
	<div id="wpcontent">
		<div id="wphead">
		
			<img width="32" height="32" alt="" src="http://localhost/glasbapomeri_symfony/web/wp-includes/images/blank.gif" id="header-logo"/> 
			<h1 id="site-heading"><a title="Visit Site" href="http://localhost/glasbapomeri_wp/"><span id="site-title">Mladi.net</span> <em id="site-visit-button">Visit Site</em></a></h1>
			
			<div id="wphead-info">
				<div id="user_info">
					<p>Howdy, <a title="Edit your profile" href="profile.php">admin</a><span class="turbo-nag hidden" style="display: inline;"> | <a href="tools.php">Turbo</a></span> |
				
					<a title="Log Out" href="http://localhost/glasbapomeri_wp/wp-login.php?action=logout&amp;_wpnonce=2239d5d884">Log Out</a></p>
				</div>
				<div id="favorite-actions"><div id="favorite-first" class=""><a href="post-new.php">Najbolj pogoste akcije</a></div>
					<div id="favorite-toggle"><br/></div>
					<div id="favorite-inside" style="width: 126px; display: none;" class="slideUp">
						<div class="favorite-action"><a href="edit.php?post_status=draft">Drafts</a></div>
						<div class="favorite-action"><a href="page-new.php">New Page</a></div>
						<div class="favorite-action"><a href="media-new.php">Upload</a></div>
						<div class="favorite-action"><a href="edit-comments.php">Comments</a></div>
					</div>
				</div>
			</div>
		</div>
		<div id="wpbody">
<?php include_partial('global/menu'); ?>
			<div id="wpbody-content">
				<div class="wrap">

<?php echo $sf_content ?>
					
				</div>

				<br class="clear"/>

			</div><!-- wpbody-content -->
			<br class="clear" />

		</div><!-- wpbody -->

		<div class="clear"/>

	</div><!-- wpcontent -->
	</div>
</body>
</html>