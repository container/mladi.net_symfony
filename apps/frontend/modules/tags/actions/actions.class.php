<?php

/**
 * tags actions.
 *
 * @package    svetovalnica
 * @subpackage tags
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class tagsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tags_list = TagsPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->tags = TagsPeer::retrieveByPk($request->getParameter('name'),
                                         $request->getParameter('vprasanje_id'));
    $this->forward404Unless($this->tags);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TagsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new TagsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
  	$tags = TagsPeer::retrieveByPk($request->getParameter('name'), $request->getParameter('vprasanje_id'));
    $this->forward404Unless(
    	$tags, 
    	sprintf('Object tags does not exist (%s).', $request->getParameter('name'), $request->getParameter('vprasanje_id'))
    );
    $this->form = new TagsForm($tags);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $tags = TagsPeer::retrieveByPk($request->getParameter('name'),
                                   $request->getParameter('vprasanje_id')
                                   );
    $this->forward404Unless(
    	$tags, 
    	sprintf('Object tags does not exist (%s).', $request->getParameter('name'),$request->getParameter('vprasanje_id'))
     );
    $this->form = new TagsForm($tags);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tags = TagsPeer::retrieveByPk($request->getParameter('name'),
                                   $request->getParameter('vprasanje_id')), sprintf('Object tags does not exist (%s).', $request->getParameter('name'),
                                   $request->getParameter('vprasanje_id')));
    $tags->delete();

    $this->redirect('tags/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tags = $form->save();

      $this->redirect('tags/edit?name='.$tags->getName().'&vprasanje_id='.$tags->getVprasanjeId());
    }
  }
}
