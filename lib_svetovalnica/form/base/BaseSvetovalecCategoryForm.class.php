<?php

/**
 * SvetovalecCategory form base class.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseSvetovalecCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'svetovalec' => new sfWidgetFormInputHidden(),
      'category'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'svetovalec' => new sfValidatorPropelChoice(array('model' => 'Svetovalec', 'column' => 'id', 'required' => false)),
      'category'   => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('svetovalec_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SvetovalecCategory';
  }


}
