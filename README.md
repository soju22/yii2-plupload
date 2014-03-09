yii2-plupload
=============

Yii2 [Plupload](www.plupload.com) extension, provides simple widgets.

Installation
------------
Install package via composer : `composer require soju/yii2-plupload:dev-master`

Demo module
-----------
Add this to your modules config :
```php
	'plupload' => [
		'class' => 'soju\yii2plupload\Module',
	],
```
Then go to `http://your-app/plupload`

Usage
-----
```php
<?= \soju\yii2plupload\widgets\UIWidget::widget([
	'settings'=>[
		'url'=>['/controller/action'],
	],
]); ?>
```
