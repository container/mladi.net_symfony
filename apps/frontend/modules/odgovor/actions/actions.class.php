<?php

/**
 * odgovor actions.
 *
 * @package    svetovalnica
 * @subpackage odgovor
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class odgovorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->odgovor_list = OdgovorPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->odgovor = OdgovorPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->odgovor);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new OdgovorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless(
    	($request->isMethod('post') OR $request->getParameter('vprasanje_id')), 
    	'ne morš sejvat odgovora, če pa ni vprasanje_id!' 
    );
		
    $this->form = new OdgovorForm();

    $this->processForm($request, $this->form);
		$this->redirect('vprasanje/show?id='.$request->getParameter('vprasanje_id'));
    
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless(
    	$odgovor = OdgovorPeer::retrieveByPk(
    		$request->getParameter('id')), 
    		sprintf('Object odgovor does not exist (%s).', $request->getParameter('id')
    	)
    );
    $this->form = new OdgovorForm($odgovor);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($odgovor = OdgovorPeer::retrieveByPk($request->getParameter('id')), sprintf('Object odgovor does not exist (%s).', $request->getParameter('id')));
    $this->form = new OdgovorForm($odgovor);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($odgovor = OdgovorPeer::retrieveByPk($request->getParameter('id')), sprintf('Object odgovor does not exist (%s).', $request->getParameter('id')));
    $odgovor->delete();

    $this->redirect('odgovor/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $odgovor = $form->save();

      $this->redirect('odgovor/edit?id='.$odgovor->getId());
    }
  }
  

}
