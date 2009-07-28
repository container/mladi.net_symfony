<?php

/**
 * post actions.
 *
 * @package    sf_sandbox
 * @subpackage post
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class postActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->blog_post_list = BlogPostPeer::doSelect(new Criteria());
    $this->riba = 'semenjčece';
  }

  public function executeShow(sfWebRequest $request)
  {
	$this->blog_post = BlogPostPeer::retrieveByPk($request->getParameter('id'));
	$this->forward404Unless($this->blog_post);

	$c = new Criteria();
	$c->add(BlogCommentPeer::BLOG_POST_ID, $request->getParameter('id'));
	$c->addAscendingOrderByColumn(BlogCommentPeer::CREATED_AT);
	$this->comments = BlogCommentPeer::doSelect($c);
	
	
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BlogPostForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new BlogPostForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($blog_post = BlogPostPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogPostForm($blog_post);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($blog_post = BlogPostPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_post does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogPostForm($blog_post);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($blog_post = BlogPostPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_post does not exist (%s).', $request->getParameter('id')));
    $blog_post->delete();

    $this->redirect('post/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $blog_post = $form->save();

      $this->redirect('post/edit?id='.$blog_post->getId());
    }
  }
  
	public function executePermalink($request)
	{
	  $posts = BlogPostPeer::doSelect(new Criteria());
	  $title = $request->getParameter('title');
	  foreach ($posts as $post)
	  {
	    if ($post->getStrippedTitle() == $title)
	    {
	      $request->setParameter('id', $post->getId());
	 
	    	return $this->forward('post', 'show');
	    }
	  }
	 
	  $this->forward404();
	}
}
