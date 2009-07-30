<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Category filter form base class.
 *
 * @package    svetovalnica
 * @subpackage filter
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'naslov'                   => new sfWidgetFormFilterInput(),
      'text'                     => new sfWidgetFormFilterInput(),
      'svetovalec_category_list' => new sfWidgetFormPropelChoice(array('model' => 'Svetovalec', 'add_empty' => true)),
      'vprasanje_category_list'  => new sfWidgetFormPropelChoice(array('model' => 'Vprasanje', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'naslov'                   => new sfValidatorPass(array('required' => false)),
      'text'                     => new sfValidatorPass(array('required' => false)),
      'svetovalec_category_list' => new sfValidatorPropelChoice(array('model' => 'Svetovalec', 'required' => false)),
      'vprasanje_category_list'  => new sfValidatorPropelChoice(array('model' => 'Vprasanje', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_filters[%s]');

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

    $criteria->addJoin(SvetovalecCategoryPeer::CATEGORY, CategoryPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(SvetovalecCategoryPeer::SVETOVALEC, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(SvetovalecCategoryPeer::SVETOVALEC, $value));
    }

    $criteria->add($criterion);
  }

  public function addVprasanjeCategoryListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(VprasanjeCategoryPeer::CATEGORY, CategoryPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(VprasanjeCategoryPeer::VPRASANJE, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(VprasanjeCategoryPeer::VPRASANJE, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'naslov'                   => 'Text',
      'text'                     => 'Text',
      'svetovalec_category_list' => 'ManyKey',
      'vprasanje_category_list'  => 'ManyKey',
    );
  }
}
