<?php

/**
 * Notifications form base class.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseNotificationsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'odgovor_id' => new sfWidgetFormPropelChoice(array('model' => 'Odgovor', 'add_empty' => true)),
      'email'      => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Notifications', 'column' => 'id', 'required' => false)),
      'odgovor_id' => new sfValidatorPropelChoice(array('model' => 'Odgovor', 'column' => 'id', 'required' => false)),
      'email'      => new sfValidatorPropelChoice(array('model' => 'Notifications', 'column' => 'email', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('notifications[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notifications';
  }


}
