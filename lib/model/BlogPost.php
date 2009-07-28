<?php

class BlogPost extends BaseBlogPost
{
	public function __toString()
	{
		return $this->getTitle();
	}
	
	
	public function getStrippedTitle(){
	  $result = strtolower($this->getTitle());
	 
	  // strip all non word chars
	  $result = preg_replace('/\W/', ' ', $result);
	 
	  // replace all white space sections with a dash
	  $result = preg_replace('/\ +/', '-', $result);
	 
	  // trim dashes
	  $result = preg_replace('/\-$/', '', $result);
	  $result = preg_replace('/^\-/', '', $result);
	 
	  return $result;		
	}
	
	public function getNbComments()
	{
	  return count($this->getBlogComments());
	}
}
