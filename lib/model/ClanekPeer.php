<?php

class ClanekPeer extends BaseClanekPeer
{
	public static function getAll($page){
		$c = new Criteria();
	 	$c->addDescendingOrderByColumn(ClanekPeer::CREATED_AT);
  	$pager = new sfPropelPager('Clanek',2);
  	$pager->setCriteria($c);
  	$pager->setPage($page);
  	$pager->init();
  	return $pager;
	}
}
