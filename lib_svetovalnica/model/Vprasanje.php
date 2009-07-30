<?php

class Vprasanje extends BaseVprasanje
{
	function __toString(){
		return $this->getNaslov();
		
	}
	function getTags(){
		$tagsCriteria = new Criteria();
    $tagsCriteria->add(TagsPeer::VPRASANJE_ID, $this->getId());
    return TagsPeer::doSelect($tagsCriteria);
	}
	
	function getTagsCommaSeparated(){
		if(count($this->getTags()) > 0){
			$out = '';
			foreach($this->getTags() as $tag){
				 $out .= $tag->getName() .', ';
			}
			return $out;
		}else{
			return true;
		}
	}
	
	function getOdgovori(){
		$c = new Criteria();
    $c->add(OdgovorPeer::VPRASANJE_ID, $this->getId());		
		return OdgovorPeer::doSelect($c);

	}

	public function getStrippedTitle($result = ''){
	  if($result == '') $result = strtolower($this->getNaslov());
	 	
	  // strip all non word chars
	  $result = preg_replace('/\W/', ' ', $result);
	 
	  // replace all white space sections with a dash
	  $result = preg_replace('/\ +/', '+', $result);
	 
	  // trim dashes
	  $result = preg_replace('/\-$/', '', $result);
	  $result = preg_replace('/^\-/', '', $result);
	 
	  return $result;		
	}
	

}
