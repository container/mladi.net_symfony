<?php

/**
 * Category form base class.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'naslov'                   => new sfWidgetFormInput(),
      'text'                     => new sfWidgetFormInput(),
      'svetovalec_category_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Svetovalec')),
      'vprasanje_category_list'  => new sfWidgetFormPropelChoiceMany(array('model' => 'Vprasanje')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id', 'required' => false)),
      'naslov'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'text'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'svetovalec_category_list' => new sfValidatorPropelChoiceMany(array('model' => 'Svetovalec', 'required' => false)),
      'vprasanje_category_list'  => new sfValidatorPropelChoiceMany(array('model' => 'Vprasanje', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['svetovalec_category_list']))
    {
      $values = array();
      foreach ($this->object->getSvetovalecCategorys() as $obj)
      {
        $values[] = $obj->getSvetovalec();
      }

      $this->setDefault('svetovalec_category_list', $values);
    }

    if (isset($this->widgetSchema['vprasanje_category_list']))
    {
      $values = array();
      foreach ($this->object->getVprasanjeCategorys() as $obj)
      {
        $values[] = $obj->getVprasanje();
      }

      $this->setDefault('vprasanje_category_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveSvetovalecCategoryList($con);
    $this->saveVprasanjeCategoryList($con);
  }

  public function saveSvetovalecCategoryList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['svetovalec_category_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(SvetovalecCategoryPeer::CATEGORY, $this->object->getPrimaryKey());
    SvetovalecCategoryPeer::doDelete($c, $con);

    $values = $this->getValue('svetovalec_category_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SvetovalecCategory();
        $obj->setCategory($this->object->getPrimaryKey());
        $obj->setSvetovalec($value);
        $obj->save();
      }
    }
  }

  public function saveVprasanjeCategoryList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['vprasanje_category_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(VprasanjeCategoryPeer::CATEGORY, $this->object->getPrimaryKey());
    VprasanjeCategoryPeer::doDelete($c, $con);

    $values = $this->getValue('vprasanje_category_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new VprasanjeCategory();
        $obj->setCategory($this->object->getPrimaryKey());
        $obj->setVprasanje($value);
        $obj->save();
      }
    }
  }

}
