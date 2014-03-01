<?php

namespace soju\yii2plupload\widgets;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by Plupload Core.
 *
 * @author soju <soju22@gmail.com>
 */
class CoreWidgetAsset extends AssetBundle
{
	public $sourcePath = '@vendor/soju/yii2plupload/assets';

	public $publishOptions = [
		//'forceCopy'=> YII_DEBUG,
	];

	public $css = [
	];

	public $js = [
		'plupload/moxie.min.js',
		'plupload/plupload.min.js',
		'plupload/i18n/en.js',
	];

	public $depends = [
	];
}
