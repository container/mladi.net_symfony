<?php

/**
 * post actions.
 *
 * @package    sf_sandbox
 * @subpackage post
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class postActions extends autopostActions
{
  public function executeIndex($request)
  {
    
  	return $this->forward('post', 'list');
  }
  
  
  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/blog_post/filters');

    // pager
    $this->pager = new sfPropelPager('BlogPost', 5);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/blog_post')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/blog_post');
    }
  }
}
