<?php

/**
 * clanki actions.
 *
 * @package    svetovalnica
 * @subpackage clanki
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class clankiActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	$this->pager = ClanekPeer::getAll($this->getRequestParameter('page', 1));
  	$this->clanek_list = $this->pager->getResults();
  	$this->tag = '';
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClanekForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new ClanekForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
  	
    $this->forward404Unless($clanek = ClanekPeer::retrieveByPk($request->getParameter('id')), sprintf('Object clanek does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClanekForm($clanek);
  }

  public function executeUpdate(sfWebRequest $request)
  {
  	$this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($clanek = ClanekPeer::retrieveByPk($request->getParameter('id')), sprintf('Object clanek does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClanekForm($clanek);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($clanek = ClanekPeer::retrieveByPk($request->getParameter('id')), sprintf('Object clanek does not exist (%s).', $request->getParameter('id')));
    $clanek->delete();

    $this->redirect('clanki/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $clanek = $form->save();
			//$clanek->setUserId('1');
			//$clanek->save();
			$clanek->setUpdatedAt(time());
			$clanek->save();
			$this->getUser()->setFlash('postEditMessage', 'success');
      $this->redirect('clanki/edit?id='.$clanek->getId());
    }
  }
}
