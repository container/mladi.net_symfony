<?php

/**
 * svetovalci actions.
 *
 * @package    svetovalnica
 * @subpackage svetovalci
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class svetovalciActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->svetovalci = SvetovalecPeer::doSelect(new Criteria());
    
    
    $this->cats = CategoryPeer::doSelect(new Criteria());
		$this->tags = TagsPeer::getTagCloud();
  }
  

}
