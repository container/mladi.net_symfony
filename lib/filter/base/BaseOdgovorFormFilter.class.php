<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Odgovor filter form base class.
 *
 * @package    svetovalnica
 * @subpackage filter
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseOdgovorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'vprasanje_id'  => new sfWidgetFormPropelChoice(array('model' => 'Vprasanje', 'add_empty' => true)),
      'svetovalec_id' => new sfWidgetFormPropelChoice(array('model' => 'Svetovalec', 'add_empty' => true)),
      'naslov'        => new sfWidgetFormFilterInput(),
      'text'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'vprasanje_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vprasanje', 'column' => 'id')),
      'svetovalec_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Svetovalec', 'column' => 'id')),
      'naslov'        => new sfValidatorPass(array('required' => false)),
      'text'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('odgovor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Odgovor';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'vprasanje_id'  => 'ForeignKey',
      'svetovalec_id' => 'ForeignKey',
      'naslov'        => 'Text',
      'text'          => 'Text',
    );
  }
}
