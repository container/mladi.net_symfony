<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Komentar filter form base class.
 *
 * @package    svetovalnica
 * @subpackage filter
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseKomentarFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'clanek_id'  => new sfWidgetFormPropelChoice(array('model' => 'Clanek', 'add_empty' => true)),
      'author'     => new sfWidgetFormFilterInput(),
      'email'      => new sfWidgetFormFilterInput(),
      'body'       => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'clanek_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Clanek', 'column' => 'id')),
      'author'     => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'body'       => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('komentar_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Komentar';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'clanek_id'  => 'ForeignKey',
      'author'     => 'Text',
      'email'      => 'Text',
      'body'       => 'Text',
      'created_at' => 'Date',
    );
  }
}
