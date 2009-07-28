<?php

class TagsPeer extends BaseTagsPeer
{
	/**
	 * renders tag cloud
	 * get all tags, sort by how many posts they have, display in random order in tagcloud
	 * 
	 *
	 */
	static function getTagCloud(){
		
		$c = new Criteria();
		  //$c->add(TagsPeer::, $this->getId())
		return $tags = TagsPeer::doSelect($c);
		
		
		if(count($tags) > 0){		
			$tagsOut = array();
			 foreach($tags as $tag){
			  $tagsOut[] = array('name' => $tag->getName());
			 }
			 return $tagsOut;
			
		}		
	}
}
