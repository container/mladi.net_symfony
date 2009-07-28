<?php

/**
 * BlogComment form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class BlogCommentForm extends BaseBlogCommentForm
{
  public function configure()
  {
  	$this->validatorSchema['email'] = new sfValidatorEmail(
									  		array('required' => false),
									  		array('invalid' => 'The email address is not valid')
									  	);
		$this->validatorSchema['author'] = new sfValidatorString(
												array('min_length'=>2),
												array('min_length' => 'prekratgega imaš (ime). daljšega od 2 moraš imet')
											);
  	$this->widgetSchema['blog_post_id'] = new sfWidgetFormInputHidden();
  }
}
