<?php

/**
 * Svetovalec form base class.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseSvetovalecForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'nickname'                 => new sfWidgetFormInput(),
      'name'                     => new sfWidgetFormInput(),
      'svetovalec_category_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Category')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Svetovalec', 'column' => 'id', 'required' => false)),
      'nickname'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'name'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'svetovalec_category_list' => new sfValidatorPropelChoiceMany(array('model' => 'Category', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('svetovalec[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Svetovalec';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['svetovalec_category_list']))
    {
      $values = array();
      foreach ($this->object->getSvetovalecCategorys() as $obj)
      {
        $values[] = $obj->getCategory();
      }

      $this->setDefault('svetovalec_category_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveSvetovalecCategoryList($con);
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
    $c->add(SvetovalecCategoryPeer::SVETOVALEC, $this->object->getPrimaryKey());
    SvetovalecCategoryPeer::doDelete($c, $con);

    $values = $this->getValue('svetovalec_category_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new SvetovalecCategory();
        $obj->setSvetovalec($this->object->getPrimaryKey());
        $obj->setCategory($value);
        $obj->save();
      }
    }
  }

}
