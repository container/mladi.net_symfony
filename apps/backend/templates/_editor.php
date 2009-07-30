<?php 
/**
 * standardna forma z title in body fieldi. 
 * 
 * @param $module: ime modula iz katerega kličemo formo. uporabi se pri url_for,  link_to, 
 * @param $model: ime modela za name tage v input fieldih ($module['fieldname'])
 */
$module = strtolower($sf_context->getModuleName());

 ?>
<link rel='stylesheet' href='<?php echo public_path('/admin/js/thickbox/thickbox.css')?>' type='text/css' media='all' />
<script type='text/javascript'>
/* <![CDATA[ */
var quicktagsL10n = {
	quickLinks: "(Quick Links)",
	wordLookup: "Enter a word to look up:",
	dictionaryLookup: "Dictionary lookup",
	lookup: "lookup",
	closeAllOpenTags: "Close all open tags",
	closeTags: "close tags",
	enterURL: "Enter the URL",
	enterImageURL: "Enter the URL of the image",
	enterImageDescription: "Enter a description of the image"
};
try{convertEntities(quicktagsL10n);}catch(e){};
/* ]]> */
</script>

<script type='text/javascript' src='<?php echo public_path('/admin/js/quicktags.dev.js')?>'></script>


<?php if ($form->hasErrors()): ?>
<div class="error below-h2" id="notice">
	<p>Nekatera polja so obvezna, prosim popravi napake pri vnosu:  <?php echo $form->renderGlobalErrors() ?></p>
	<ul class="ul-disc"	>
	<?php 
	foreach($form->getErrorSchema() as $fieldname => $error){
		echo '<li><strong>'.$fieldname.'</strong>: '.$error.'</li>';
	};
	?>
	</ul>
</div>
<?php endif; ?>
<?php if ($sf_user->hasFlash('postEditMessage')): ?>
<div class="updated fade below-h2" id="message" style="background-color: rgb(255, 251, 204);">
  <p><?php echo $sf_user->getFlash('postEditMessage') ?></p>
</div>
<?php endif; ?>



<form action="<?php echo url_for($module.'/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

<?php echo $form->renderHiddenFields() ?>
 
 

<div id="poststuff" class="metabox-holder has-right-sidebar">						
	
	<div id="side-info-column" class="inner-sidebar">
		<div id="side-sortables" class="meta-box-sortables ui-sortable">
			<div style="display: block;" id="submitdiv" class="postbox ">
			<div class="handlediv" title="Click to toggle"><br>
				</div>
				<h3 class="hndle"><span>Publish</span></h3>
				<div class="inside">
					<div class="submitbox" id="submitpost">
						<div id="major-publishing-actions">
						<div id="delete-action">
							<?php echo link_to('Delete', $module.'/delete?id='.$form->getObject()->getId(), array('class'=>'submitdelete deletion','method' => 'delete', 'confirm' => 'Are you sure?')) ?>
						</div>

						<div id="publishing-action">
								
								<?php if ($form->getObject()->isNew()): ?>
									<input name="save" class="button-primary" id="publish" tabindex="5" accesskey="p" value="Save Post" type="submit">
								<?php else : ?>
									<input name="save" class="button-primary" id="publish" tabindex="5" accesskey="p" value="Update Post" type="submit">
								<?php endif; ?>
									
						</div>
						<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="post-body">
		<div id="post-body-content">
			<div id="titlediv">
				<div id="titlewrap">
					<label class="screen-reader-text" for="title">Title</label>
					<input name="<?php echo $model;?>[title]" size="30" tabindex="1"  id="title" value="<?php echo $form['title']->getValue(); ?>" autocomplete="off" type="text">
				</div>
				<div class="inside">
					
				</div>
			</div>	
			
			
								
			<div class="postarea" id="postdivrich">

					<div id="editor-toolbar">
						<div class="zerosize"><input type="button" onclick="switchEditors.go('content')" accesskey="e"/></div>
							<a onclick="switchEditors.go('content', 'html');" class="hide-if-no-js" id="edButtonHTML">HTML</a>
							<a onclick="switchEditors.go('content', 'tinymce');" class="active hide-if-no-js" id="edButtonPreview">Visual</a>
						<div class="hide-if-no-js" id="media-buttons">
					Upload/Insert 
						<a onclick="return false;" title="Add an Image" class="thickbox" id="add_image" href="media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true"><img alt="Add an Image" src="http://localhost/glasbapomeri_symfony/web/images/media-button-image.gif"/></a>
						<a onclick="return false;" title="Add Video" class="thickbox" id="add_video" href="media-upload.php?post_id=1&amp;type=video&amp;TB_iframe=true"><img alt="Add Video" src="http://localhost/glasbapomeri_symfony/web/images/media-button-video.gif"/></a>
						<a onclick="return false;" title="Add Audio" class="thickbox" id="add_audio" href="media-upload.php?post_id=1&amp;type=audio&amp;TB_iframe=true"><img alt="Add Audio" src="http://localhost/glasbapomeri_symfony/web/images/media-button-music.gif"/></a>
						<a onclick="return false;" title="Add Media" class="thickbox" id="add_media" href="media-upload.php?post_id=1&amp;TB_iframe=true"><img alt="Add Media" src="http://localhost/glasbapomeri_symfony/web/images/media-button-other.gif"/></a>
					</div>
					</div>
						<div id="quicktags">	<script type="text/javascript">edToolbar()</script>
						</div>

					<div id="editorcontainer">
						<label class="screen-reader-text" for="content">Body</label>
						<textarea id="content" class="theEditor" name="<?php echo $model;?>[body]" cols="40" rows="10"><?php echo $form['body']->getValue() ?></textarea>
						<script type="text/javascript">
						edCanvas = document.getElementById('content');
						</script>
					</div>
				</div>
				
				
		</div>
	</div>
</div><!-- /poststuff -->
<br class="clear" />
</form>	



<script type='text/javascript' src='<?php echo public_path('/admin/js/utils.dev.js')?>'></script>
<script type='text/javascript' src='<?php echo public_path('/admin/js/editor.dev.js')?>'></script>
<script type='text/javascript' src='<?php echo public_path('/admin/js/media-upload.dev.js')?>'></script>
<script type='text/javascript' src='<?php echo public_path('/admin/js/thickbox/thickbox.js')?>'></script>


	<script type="text/javascript">
	/* <![CDATA[ */
	tinyMCEPreInit = {
		base : "http://localhost/glasbapomeri_wp/wp-includes/js/tinymce",
		suffix : "",
		query : "ver=3241-1141",
		mceInit : {mode:"specific_textareas", editor_selector:"theEditor", width:"100%", theme:"advanced", skin:"wp_theme", theme_advanced_buttons1:"bold,italic,strikethrough,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,|,link,unlink,wp_more,|,spellchecker,fullscreen,wp_adv", theme_advanced_buttons2:"formatselect,underline,justifyfull,forecolor,|,pastetext,pasteword,removeformat,|,media,charmap,|,outdent,indent,|,undo,redo,wp_help", theme_advanced_buttons3:"", theme_advanced_buttons4:"", language:"en", spellchecker_languages:"+English=en,Danish=da,Dutch=nl,Finnish=fi,French=fr,German=de,Italian=it,Polish=pl,Portuguese=pt,Spanish=es,Swedish=sv", theme_advanced_toolbar_location:"top", theme_advanced_toolbar_align:"left", theme_advanced_statusbar_location:"bottom", theme_advanced_resizing:"1", theme_advanced_resize_horizontal:"", dialog_type:"modal", relative_urls:"", remove_script_host:"", convert_urls:"", apply_source_formatting:"", remove_linebreaks:"1", gecko_spellcheck:"1", entities:"38,amp,60,lt,62,gt", accessibility_focus:"1", tabfocus_elements:"major-publishing-actions", media_strict:"", save_callback:"switchEditors.saveCallback", wpeditimage_disable_captions:"", plugins:"safari,inlinepopups,spellchecker,paste,wordpress,media,fullscreen,wpeditimage,wpgallery,tabfocus"},
		load_ext : function(url,lang){var sl=tinymce.ScriptLoader;sl.markDone(url+'/langs/'+lang+'.js');sl.markDone(url+'/langs/'+lang+'_dlg.js');}
	};
	/* ]]> */
	</script>

	<script type='text/javascript' src='http://localhost/glasbapomeri_wp/wp-includes/js/tinymce/wp-tinymce.php?c=1&amp;ver=3241-1141'></script>
	<script type='text/javascript' src='http://localhost/glasbapomeri_wp/wp-includes/js/tinymce/langs/wp-langs-en.js?ver=3241-1141'></script>

	<script type="text/javascript">
	/* <![CDATA[ */
	tinyMCEPreInit.go();
	tinyMCE.init(tinyMCEPreInit.mceInit);
	/* ]]> */
	</script>

