<?php

namespace soju\yii2plupload\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Plupload UI widget.
 *
 * @author soju <soju22@gmail.com>
 */
class UIWidget extends \yii\base\Widget
{
	/**
	 * @var array the HTML attributes for the widget container tag.
	 */
	public $options = [];
	/**
	 * @var array settings
	 * @link http://www.plupload.com/docs/UI.Plupload
	 */
	public $settings = [];

	public function init()
	{
		parent::init();

		if (!isset($this->options['id'])) $this->options['id'] = $this->getId();
		else $this->setId($this->options['id']);

		if (!isset($this->settings['url']))
			$this->settings['url'] = '';

		$this->settings['url'] = Html::url($this->settings['url']); 
	}
	
	public function run()
	{
		// register asset
		$view = $this->getView();
		UIWidgetAsset::register($view);

		// echo container
		$text = Html::tag('p', 'Your browser doesn\'t have Flash, Silverlight or HTML5 support');
		echo Html::tag('div', $text, $this->options);

		// plupload settings
		$assetUrl = $view->assetBundles[UIWidgetAsset::className()]->baseUrl;
		$this->settings['flash_swf_url'] = $assetUrl.'/Moxie.swf';
		$this->settings['silverlight_xap_url'] = $assetUrl.'/Moxie.xap';
		
		// add csrf token
		$this->settings['multipart_params'] = [
			Yii::$app->request->csrfParam => Yii::$app->request->csrfToken,
		];

		// register js
		$view->registerJs("
			$('#{$this->getId()}').plupload(".Json::encode($this->settings).");
		");
	}
}