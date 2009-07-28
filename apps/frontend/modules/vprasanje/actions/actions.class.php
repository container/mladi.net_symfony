<?php

/**
 * vprasanje actions.
 *
 * @package    svetovalnica
 * @subpackage vprasanje
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class vprasanjeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
		$mailBody = $this->getComponent('mail', 'mailBody', array('name' => 'John Doe'));
    $this->vprasanje_list = VprasanjePeer::doSelect(new Criteria());
    
  }

  public function executeShow(sfWebRequest $request)
  {
  	
    $this->vprasanje = VprasanjePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->vprasanje);
      
    $this->odgovorForm = new OdgovorForm();
    
  
    /**
     * posting Odgovor
     */
    if($request->isMethod('post')){
	    $this->odgovorForm->bind(
	    	$request->getParameter($this->odgovorForm->getName()), 
	    	$request->getFiles($this->odgovorForm->getName())
	  	);
	  //	dump($this->odgovorForm->isValid(), true);
	    if ($this->odgovorForm->isValid())
	    {
	     	$this->odgovorForm->save();
				$this->redirect('vprasanje/show?id='.$request->getParameter('id'));
	    }  	
    }
    
    
    $this->cats = CategoryPeer::doSelect(new Criteria());
		$this->tags = TagsPeer::getTagCloud();
		
    
  }

  public function executeNew(sfWebRequest $request)
  {
  	$this->form = new VprasanjeForm();
  }
  
	/**
	 * parse VprasanjeForm and TagsForm; validate, update
	 *
	 * @param sfWebRequest $request
	 */
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new VprasanjeForm(); 
    //send form to tmpl too
    $form = $this->form;
		$form->bind(
			$request->getParameter($form->getName()), 
			$request->getFiles($form->getName())
		);
    
 		if ($form->isValid()){
				//$form->save();
				$mailBody = $this->getPartial('vprasanje/newVprasanjeNoticeMail', array('nickname' => $request->getPostParameter('nickname')));

 		  try
			{
			  // Create the mailer and message objects
			  $mailer = new Swift(new Swift_Connection_NativeMail());
			  $message = new Swift_Message('Mail\'s subject', $mailBody, 'text/html');
			 
			  // Send
			  $mailer->send($message, 'postmaster@localhost', 'postmaster@localhost');
			  $mailer->disconnect();
			}
			catch (Exception $e)
			{
			  $mailer->disconnect();
			 
			  // handle errors here
			}
				//save success notice in session
      	$this->redirect('main/index');
		}
		
    //in any other case render New template
		$this->setTemplate('new');
		
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($vprasanje = VprasanjePeer::retrieveByPk($request->getParameter('id')), sprintf('Object vprasanje does not exist (%s).', $request->getParameter('id')));
    $this->form = new VprasanjeForm($vprasanje);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($vprasanje = VprasanjePeer::retrieveByPk($request->getParameter('id')), sprintf('Object vprasanje does not exist (%s).', $request->getParameter('id')));
    $this->form = new VprasanjeForm($vprasanje);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($vprasanje = VprasanjePeer::retrieveByPk($request->getParameter('id')), sprintf('Object vprasanje does not exist (%s).', $request->getParameter('id')));
    $vprasanje->delete();

    $this->redirect('vprasanje/index');
  }
  
	public function executePermalink($request)
	{
		
	  $vprasanja = VprasanjePeer::doSelect(new Criteria());
	  $title = $request->getParameter('naslov');
	  if($request->getParameter('id')){
   		return $this->forward('vprasanje', 'show'); 	
	  }
	  
	  foreach ($vprasanja as $vprasanje)
	  {
	  	if ($vprasanje->getStrippedTitle() == $vprasanje->getStrippedTitle($title))
	    {
	      $request->setParameter('id', $vprasanje->getId());
	 
	    	return $this->forward('vprasanje', 'show');
	    }
	  }
		$this->forward404();
	}
	
	
	public function executeNewVprasanjeNoticeMail(){
		$this->setLayout(false);
	}

}
