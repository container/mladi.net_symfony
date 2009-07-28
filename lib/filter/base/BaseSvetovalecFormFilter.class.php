<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Svetovalec filter form base class.
 *
 * @package    svetovalnica
 * @subpackage filter
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseSvetovalecFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nickname'                 => new sfWidgetFormFilterInput(),
      'name'                     => new sfWidgetFormFilterInput(),
      'svetovalec_category_list' => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nickname'                 => new sfValidatorPass(array('required' => false)),
      'name'                     => new sfValidatorPass(array('required' => false)),
      'svetovalec_category_list' => new sfValidatorPropelChoice(array('model' => 'Category', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('svetovalec_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addSvetovalecCategoryListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(SvetovalecCategoryPeer::SVETOVALEC, SvetovalecPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SvetovalecCategoryPeer::CATEGORY, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SvetovalecCategoryPeer::CATEGORY, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Svetovalec';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'nickname'                 => 'Text',
      'name'                     => 'Text',
      'svetovalec_category_list' => 'ManyKey',
    );
  }
}
