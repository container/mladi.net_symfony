<?php

/**
 * Vprasanje form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class VprasanjeForm extends BaseVprasanjeForm
{
  public function configure()
  {
		$this->setWidget('tags', new sfWidgetFormInput());
  	//dodaj polja za tage in hendlaj sejvanje Tagsov
   	$this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Vprasanje', 'column' => 'id', 'required' => false)),
      'naslov'                  => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'text'                    => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'nickname'                => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'created_at'              => new sfValidatorDateTime(array('required' => false)),
      'vprasanje_category_list' => new sfValidatorPropelChoiceMany(array('model' => 'Category', 'required' => true)),
      'tags'                    => new sfValidatorString(array('max_length' => 255, 'required' => true)),
    )); 	
  }
  
  protected function doSave($con = null)
  {
    parent::doSave($con);
		$this->saveTags();
    //$this->saveVprasanjeCategoryList($con);
  }
  
  public function saveTags(){
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }
    if (!isset($this->widgetSchema['tags']))
    {
      // somebody has unset this widget
      return;
    }
    
    $valuesStr = $this->getValue('tags');
    $values = explode(',',$valuesStr);
    //remove duplicates
    $values = array_flip(array_flip($values));
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Tags();
        $obj->setVprasanjeId($this->object->getPrimaryKey());
        $obj->setName($value);
        //print_r($obj);die;
        $obj->save();
      }
    }
  }

}
