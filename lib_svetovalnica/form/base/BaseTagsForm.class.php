<?php

/**
 * Tags form base class.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseTagsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormInputHidden(),
      'vprasanje_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPropelChoice(array('model' => 'Tags', 'column' => 'name', 'required' => false)),
      'vprasanje_id' => new sfValidatorPropelChoice(array('model' => 'Vprasanje', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tags[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tags';
  }


}
