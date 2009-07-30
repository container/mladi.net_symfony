<?php

/**
 * Odgovor form base class.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseOdgovorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'vprasanje_id'  => new sfWidgetFormPropelChoice(array('model' => 'Vprasanje', 'add_empty' => true)),
      'svetovalec_id' => new sfWidgetFormPropelChoice(array('model' => 'Svetovalec', 'add_empty' => true)),
      'naslov'        => new sfWidgetFormInput(),
      'text'          => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Odgovor', 'column' => 'id', 'required' => false)),
      'vprasanje_id'  => new sfValidatorPropelChoice(array('model' => 'Vprasanje', 'column' => 'id', 'required' => false)),
      'svetovalec_id' => new sfValidatorPropelChoice(array('model' => 'Svetovalec', 'column' => 'id', 'required' => false)),
      'naslov'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'text'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('odgovor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Odgovor';
  }


}
