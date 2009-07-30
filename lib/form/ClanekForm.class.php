<?php

/**
 * Clanek form.
 *
 * @package    svetovalnica
 * @subpackage form
 * @author     DanijelK <danijel.kurincic@gmail.com>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ClanekForm extends BaseClanekForm
{
  public function configure()
  {

    
    unset($this['created_at']);
    unset($this['user_id']);
  }
}
