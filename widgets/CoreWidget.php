<?php

namespace soju\yii2plupload\widgets;

use yii\helpers\Html;
use yii\bootstrap\Button;

/**
 * Plupload core widget.
 *
 * @author soju <soju22@gmail.com>
 */
class CoreWidget extends \yii\base\Widget
{
	/**
	 * @var array the HTML attributes for the widget container tag.
	 */
	public $options = [];
	/**
	 * @var string upload url
	 */
	public $uploadUrl;

	public function init()
	{
		parent::init();
		$this->uploadUrl = Html::url($this->uploadUrl);
	}

	public function run()
	{
		$view = $this->getView();
		CoreWidgetAsset::register($view);

		echo Button::widget([
			'label' => 'Browse',
			'options' => [
				'id'=>'browse',
				'class' => 'btn-default'
			],
		]);

		echo Button::widget([
			'label' => 'Start Upload',
			'options' => [
				'id'=>'start-upload',
				'class' => 'btn-default'
			],
		]);

		echo Html::ul([], [
			'id'=>'filelist',
		]);

		$view->registerJs("
			var uploader = new plupload.Uploader({
				browse_button: 'browse',
				url: '{$this->uploadUrl}'
			});
			uploader.init();
		");
	}
}
