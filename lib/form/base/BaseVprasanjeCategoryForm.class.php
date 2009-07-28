<?php

/**
 * VprasanjeCategory form base class.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseVprasanjeCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'vprasanje' => new sfWidgetFormInputHidden(),
      'category'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'vprasanje' => new sfValidatorPropelChoice(array('model' => 'Vprasanje', 'column' => 'id', 'required' => false)),
      'category'  => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vprasanje_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'VprasanjeCategory';
  }


}
