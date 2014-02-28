<?php

namespace soju\yii2plupload\widgets;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by Plupload UI Widget.
 *
 * @author soju <soju22@gmail.com>
 */
class UIWidgetAsset extends AssetBundle
{
	public $sourcePath = '@plupload/assets';

	public $publishOptions = [
		//'forceCopy'=> YII_DEBUG,
	];

	public $css = [
		'plupload/jquery.ui.plupload/css/jquery.ui.plupload.css',
	];

	public $js = [
		'plupload/jquery.ui.plupload/jquery.ui.plupload.js',
		'main.js',
	];

	public $depends = [
		'yii\web\JqueryAsset',
		'yii\jui\ButtonAsset',
		'yii\jui\ProgressBarAsset',
		'yii\jui\SortableAsset',
		'yii\jui\ThemeAsset',
		'soju\yii2plupload\widgets\CoreWidgetAsset',
	];
}