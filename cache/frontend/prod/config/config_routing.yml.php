<?php
// auto-generated by sfRoutingConfigHandler
// date: 2009/07/30 04:26:16
return array(
'list_of_posts' => new sfRoute('/latest_posts', array (
  'module' => 'post',
  'action' => 'index',
), array (
), array (
)),
'vprasanja_detail' => new sfRoute('/vprasanja/:id/:naslov', array (
  'module' => 'vprasanje',
  'action' => 'permalink',
), array (
), array (
)),
'novo_vprasanje' => new sfRoute('/novo_vprasanje', array (
  'module' => 'vprasanje',
  'action' => 'new',
), array (
), array (
)),
'post' => new sfRoute('/blog/:title', array (
  'module' => 'post',
  'action' => 'permalink',
), array (
), array (
)),
'homepage' => new sfRoute('/', array (
  'module' => 'main',
  'action' => 'index',
), array (
), array (
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
);