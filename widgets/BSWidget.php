<?php

namespace soju\yii2plupload\widgets;

use Yii;
use yii\helpers\Html;
use yii\bootstrap\Button;

/**
 * Plupload bootstrap widget.
 *
 * @author soju <soju22@gmail.com>
 */
class BSWidget extends \yii\base\Widget
{
	/**
	 * @var array the HTML attributes for the widget container tag.
	 */
	public $options = [];
	/**
	 * @var array settings
	 */
	public $settings = [];

	public function init()
	{
		parent::init();
	}
	
	public function run()
	{
		$view = $this->getView();
		CoreWidgetAsset::register($view);

		$view->registerJs("
		");
	}
}
