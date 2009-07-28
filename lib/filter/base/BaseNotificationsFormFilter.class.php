<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Notifications filter form base class.
 *
 * @package    svetovalnica
 * @subpackage filter
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseNotificationsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'odgovor_id' => new sfWidgetFormPropelChoice(array('model' => 'Odgovor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'odgovor_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Odgovor', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('notifications_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Notifications';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'odgovor_id' => 'ForeignKey',
      'email'      => 'Text',
    );
  }
}
