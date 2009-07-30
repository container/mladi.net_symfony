<?php

/**
 * Tags form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TagsForm extends BaseTagsForm
{
  public function configure()
  {
  	 $this->setWidgets(array(
      'name'         => new sfWidgetFormInput(),
      'vprasanje_id' => new sfWidgetFormInputHidden(),
    ));
  	$this->setValidators(array(
      'name'         => new sfValidatorPropelChoice(array('model' => 'Tags', 'column' => 'name', 'required' => true)),
      'vprasanje_id' => new sfValidatorPropelChoice(array('model' => 'Vprasanje', 'column' => 'id', 'required' => true)),
    ));
  }
}
