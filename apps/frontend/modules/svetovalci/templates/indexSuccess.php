<div id="left">
<?php 
foreach($svetovalci as $svetovalec){
	print_r($svetovalec);
?>
	<div class="svetovalec" >
		<div class="svetovalec_image">
			<img src="" height="200" width="150" alt ="<?php echo $svetovalec->getName();?>" />
		</div>
		<div class="svetovalec_data">
			<h2><?php echo link_to($svetovalec->getNickname(), 'svetovalec/show?id=' . $svetovalec->getId()) ?></h2>
		</div>
	</div>
	
<?php 
}?>
</div>
<div id="right">
<?php include_partial('main/tagcloud', array('tags' => $tags)) ?>
<?php include_partial('main/cats', array('cats' => $cats)) ?>
</div>