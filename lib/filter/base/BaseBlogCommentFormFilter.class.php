<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * BlogComment filter form base class.
 *
 * @package    svetovalnica
 * @subpackage filter
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 13459 2008-11-28 14:48:12Z fabien $
 */
class BaseBlogCommentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'blog_post_id' => new sfWidgetFormPropelChoice(array('model' => 'BlogPost', 'add_empty' => true)),
      'author'       => new sfWidgetFormFilterInput(),
      'email'        => new sfWidgetFormFilterInput(),
      'body'         => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'blog_post_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'BlogPost', 'column' => 'id')),
      'author'       => new sfValidatorPass(array('required' => false)),
      'email'        => new sfValidatorPass(array('required' => false)),
      'body'         => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('blog_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BlogComment';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'blog_post_id' => 'ForeignKey',
      'author'       => 'Text',
      'email'        => 'Text',
      'body'         => 'Text',
      'created_at'   => 'Date',
    );
  }
}
