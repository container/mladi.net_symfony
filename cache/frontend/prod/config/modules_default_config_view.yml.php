<?php
// auto-generated by sfViewConfigHandler
// date: 2009/07/30 04:26:17
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'test', false, false);
  $response->addMeta('description', 'mamba', false, false);
  $response->addMeta('keywords', 'repeticija, solate', false, false);
  $response->addMeta('language', 'si', false, false);
  $response->addMeta('robots', 'index, follow', false, false);

  $response->addStylesheet('main.css', '', array ());

