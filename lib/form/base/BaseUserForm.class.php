<?php

/**
 * User form base class.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'nickname' => new sfWidgetFormInput(),
      'name'     => new sfWidgetFormInput(),
      'email'    => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'User', 'column' => 'id', 'required' => false)),
      'nickname' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'password' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }


}
