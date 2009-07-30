<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * User filter form base class.
 *
 * @package    svetovalnica
 * @subpackage filter
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nickname' => new sfWidgetFormFilterInput(),
      'name'     => new sfWidgetFormFilterInput(),
      'email'    => new sfWidgetFormFilterInput(),
      'password' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nickname' => new sfValidatorPass(array('required' => false)),
      'name'     => new sfValidatorPass(array('required' => false)),
      'email'    => new sfValidatorPass(array('required' => false)),
      'password' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'User';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'nickname' => 'Text',
      'name'     => 'Text',
      'email'    => 'Text',
      'password' => 'Text',
    );
  }
}
