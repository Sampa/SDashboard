<?php

class SdashboardModule extends CWebModule
{
	public $defaultController = 'dashboard';
	public $allowAjax = true;
	public function init()
	{
		$this->registerAssets();


		$this->setImport(array(
			'sdashboard.models.*',
			'sdashboard.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		
				
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
	public function registerAssets()
	{	
		$assets =Yii::app()->basePath.'/modules/sdashboard/assets';
		$baseUrl = Yii::app() -> assetManager -> publish($assets);
		//the css to use
		Yii::app() -> clientScript -> registerCssFile($baseUrl . '/css/sdashboard.css');
		Yii::app() -> clientScript -> registerCssFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/start/jquery-ui.css');
		Yii::app() -> clientScript -> registerCssFile($baseUrl . '/css/jquery.toastmessage.css');
		Yii::app() -> clientScript -> registerCssFile($baseUrl . '/markitup/skins/markitup/style.css');
		Yii::app() -> clientScript -> registerCssFile($baseUrl . '/markitup/sets/bbcode/style.css');

		// the js to use
		Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
		Yii::app() -> clientScript -> registerScriptFile($baseUrl . "/js/jquery.toastmessage.js", CClientScript::POS_END);
		Yii::app() -> clientScript -> registerScriptFile($baseUrl . "/js/bootbox.min.js", CClientScript::POS_END);
		Yii::app() -> clientScript -> registerScriptFile($baseUrl . "/markitup/sets/bbcode/set.js", CClientScript::POS_BEGIN);
		Yii::app() -> clientScript -> registerScriptFile($baseUrl . "/markitup/jquery.markitup.js", CClientScript::POS_BEGIN);
	    Yii::app() -> clientScript -> registerScriptFile($baseUrl . "/js/sdashboard.js", CClientScript::POS_END);
	}
}
