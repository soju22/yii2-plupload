<?php

namespace soju\yii2plupload\widgets;

use Yii;
use yii\helpers\Html;
use yii\bootstrap\Button;
use yii\helpers\Json;

/**
 * Plupload core widget.
 *
 * @author soju <soju22@gmail.com>
 */
class CoreWidget extends \yii\base\Widget
{
	/**
	 * @var string uploader var name
	 */
	public $varName;
	/**
	 * @var array settings
	 * http://www.plupload.com/docs/Options
	 */
	public $settings = [];

	public function init()
	{
		parent::init();

		if (!empty($this->varName)) $this->setId($this->varName);
		else $this->varName = $this->getId();
		
		if (!isset($this->settings['url']))
			$this->settings['url'] = '';

		$this->settings['url'] = Html::url($this->settings['url']);
	}

	public function run()
	{
		$view = $this->getView();
		CoreWidgetAsset::register($view);

		// plupload settings
		$assetUrl = $view->assetBundles[CoreWidgetAsset::className()]->baseUrl;
		$this->settings['flash_swf_url'] = $assetUrl.'/plupload/Moxie.swf';
		$this->settings['silverlight_xap_url'] = $assetUrl.'/plupload/Moxie.xap';

		// add csrf token
		$this->settings['multipart_params'] = [
			Yii::$app->request->csrfParam => Yii::$app->request->csrfToken,
		];

		$view->registerJs("
			var {$this->varName} = new plupload.Uploader(".Json::encode($this->settings).");
			{$this->varName}.init();
		");
	}
}
