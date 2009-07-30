<?php

/**
 * Vprasanje form base class.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 12815 2008-11-09 10:43:58Z fabien $
 */
class BaseVprasanjeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'naslov'                  => new sfWidgetFormInput(),
      'text'                    => new sfWidgetFormInput(),
      'nickname'                => new sfWidgetFormInput(),
      'created_at'              => new sfWidgetFormDateTime(),
      'vprasanje_category_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Category')),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Vprasanje', 'column' => 'id', 'required' => false)),
      'naslov'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'text'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nickname'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'              => new sfValidatorDateTime(array('required' => false)),
      'vprasanje_category_list' => new sfValidatorPropelChoiceMany(array('model' => 'Category', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vprasanje[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vprasanje';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['vprasanje_category_list']))
    {
      $values = array();
      foreach ($this->object->getVprasanjeCategorys() as $obj)
      {
        $values[] = $obj->getCategory();
      }

      $this->setDefault('vprasanje_category_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveVprasanjeCategoryList($con);
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
    $c->add(VprasanjeCategoryPeer::VPRASANJE, $this->object->getPrimaryKey());
    VprasanjeCategoryPeer::doDelete($c, $con);

    $values = $this->getValue('vprasanje_category_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new VprasanjeCategory();
        $obj->setVprasanje($this->object->getPrimaryKey());
        $obj->setCategory($value);
        $obj->save();
      }
    }
  }

}
