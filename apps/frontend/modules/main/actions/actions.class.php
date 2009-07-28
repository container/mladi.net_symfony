<?php

/**
 * main actions.
 *
 * @package    sf_sandbox
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class mainActions extends sfActions
{

	function executeIndex(){
		$this->recentVprasanje = VprasanjePeer::doSelect(new Criteria());
		
		$this->newForm = new VprasanjeForm();
		
		$this->cats = CategoryPeer::doSelect(new Criteria());
		$this->tags = TagsPeer::getTagCloud();
		
	}
	
	function executeAbout(){
		$this->blog_post_list = BlogPostPeer::doSelect(new Criteria());
		
		$this->cats = CategoryPeer::doSelect(new Criteria());
		$this->tags = TagsPeer::getTagCloud();		
	}
	


}
