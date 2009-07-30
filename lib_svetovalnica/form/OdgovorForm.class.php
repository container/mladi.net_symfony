<?php

/**
 * Odgovor form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class OdgovorForm extends BaseOdgovorForm
{
  public function configure()
  {
  	
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'svetovalec_id' => new sfWidgetFormPropelChoice(array('model' => 'Svetovalec', 'add_empty' => true)),
      'naslov'        => new sfWidgetFormInput(),
      'text'          => new sfWidgetFormInput(),
      'captcha'       => new sfWidgetFormPHPCaptcha(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Odgovor', 'column' => 'id', 'required' => false)),
      'svetovalec_id' => new sfValidatorPropelChoice(array('model' => 'Svetovalec', 'column' => 'id', 'required' => false)),
      'naslov'        => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'text'          => new sfValidatorString(array('max_length' => 255, 'required' => true)),
   		'captcha'       => new sfValidatorPHPCaptcha(),
    ));
    $this->widgetSchema->setNameFormat('odgovor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);
  }
}
