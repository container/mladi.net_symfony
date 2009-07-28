<?php

/**
 * svetovalnica actions.
 *
 * @package    sf_sandbox
 * @subpackage svetovalnica
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class svetovalnicaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->vprasanje_list = VprasanjePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->vprasanje = VprasanjePeer::retrieveByPk($request->getParameter('id'),
                               $request->getParameter('category_id'));
    $this->forward404Unless($this->vprasanje);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VprasanjeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new VprasanjeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($vprasanje = VprasanjePeer::retrieveByPk($request->getParameter('id'),
                         $request->getParameter('category_id')), sprintf('Object vprasanje does not exist (%s).', $request->getParameter('id'),
                         $request->getParameter('category_id')));
    $this->form = new VprasanjeForm($vprasanje);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($vprasanje = VprasanjePeer::retrieveByPk($request->getParameter('id'),
                         $request->getParameter('category_id')), sprintf('Object vprasanje does not exist (%s).', $request->getParameter('id'),
                         $request->getParameter('category_id')));
    $this->form = new VprasanjeForm($vprasanje);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($vprasanje = VprasanjePeer::retrieveByPk($request->getParameter('id'),
                         $request->getParameter('category_id')), sprintf('Object vprasanje does not exist (%s).', $request->getParameter('id'),
                         $request->getParameter('category_id')));
    $vprasanje->delete();

    $this->redirect('svetovalnica/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $vprasanje = $form->save();

      $this->redirect('svetovalnica/edit?id='.$vprasanje->getId().'&category_id='.$vprasanje->getCategoryId());
    }
  }
}
