<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Vprasanje filter form base class.
 *
 * @package    svetovalnica
 * @subpackage filter
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseVprasanjeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'naslov'                  => new sfWidgetFormFilterInput(),
      'text'                    => new sfWidgetFormFilterInput(),
      'nickname'                => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'vprasanje_category_list' => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'naslov'                  => new sfValidatorPass(array('required' => false)),
      'text'                    => new sfValidatorPass(array('required' => false)),
      'nickname'                => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'vprasanje_category_list' => new sfValidatorPropelChoice(array('model' => 'Category', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vprasanje_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(VprasanjeCategoryPeer::VPRASANJE, VprasanjePeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(VprasanjeCategoryPeer::CATEGORY, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(VprasanjeCategoryPeer::CATEGORY, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Vprasanje';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'naslov'                  => 'Text',
      'text'                    => 'Text',
      'nickname'                => 'Text',
      'created_at'              => 'Date',
      'vprasanje_category_list' => 'ManyKey',
    );
  }
}
