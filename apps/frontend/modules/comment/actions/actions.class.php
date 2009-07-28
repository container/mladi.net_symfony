<?php

/**
 * comment actions.
 *
 * @package    sf_sandbox
 * @subpackage comment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class commentActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->blog_comment_list = BlogCommentPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BlogCommentForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new BlogCommentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($blog_comment = BlogCommentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_comment does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogCommentForm($blog_comment);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($blog_comment = BlogCommentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_comment does not exist (%s).', $request->getParameter('id')));
    $this->form = new BlogCommentForm($blog_comment);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($blog_comment = BlogCommentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object blog_comment does not exist (%s).', $request->getParameter('id')));
    $blog_comment->delete();

    $this->redirect('comment/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $blog_comment = $form->save();

      $this->redirect('post/show?id='.$blog_comment->getBlogPostId());
    }
  }
}
