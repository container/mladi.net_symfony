<?php

/**
 * Project form base class.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormBaseTemplate.php 9304 2008-05-27 03:49:32Z dwhittle $
 */
abstract class BaseFormPropel extends sfFormPropel
{
  public function setup()
  {
  	 $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Vprasanje', 'column' => 'id', 'required' => false)),
      'naslov'                  => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'text'                    => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'nickname'                => new sfValidatorString(array('max_length' => 255, 'required' => true)),
      'created_at'              => new sfValidatorDateTime(array('required' => false)),
      'vprasanje_category_list' => new sfValidatorPropelChoiceMany(array('model' => 'Category', 'required' => false)),
    ));
  }
}
