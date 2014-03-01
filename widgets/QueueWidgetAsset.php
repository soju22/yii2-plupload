<?php

namespace soju\yii2plupload\widgets;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by Plupload Queue Widget.
 *
 * @author soju <soju22@gmail.com>
 */
class QueueWidgetAsset extends AssetBundle
{
	public $sourcePath = '@vendor/soju/yii2-plupload/assets';

	public $publishOptions = [
		//'forceCopy'=> YII_DEBUG,
	];

	public $css = [
		'plupload/jquery.plupload.queue/css/jquery.plupload.queue.css',
		'style.css',
	];

	public $js = [
		'plupload/jquery.plupload.queue/jquery.plupload.queue.min.js',
	];

	public $depends = [
		'soju\yii2plupload\widgets\CoreWidgetAsset',
	];
}