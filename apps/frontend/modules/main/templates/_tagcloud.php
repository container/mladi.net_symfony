<div id="tags">
<?php

if(count($tags) > 0){
	foreach($tags as $tag){
	//	print_r($tag->getName());
		echo link_to($tag->getName(), 'tags/show?name='. $tag->getName() ) . ' ';
	}
}
?>
</div>