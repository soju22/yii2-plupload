<?php

namespace soju\yii2plupload;

use Yii;
use yii\web\ForbiddenHttpException;

/**
 * Plupload test module
 * 
 * To use this module, include it as a module in the application configuration like the following:
 *
 * ~~~
 * return [
 *     ......
 *     'modules' => [
 *         'plupload' => ['class' => 'soju\plupload\Module'],
 *     ],
 * ]
 * ~~~
 * 
 * @author soju <soju22@gmail.com>
 */
class Module extends \yii\base\Module
{
	public $controllerNamespace = 'soju\yii2plupload\controllers';
	/**
	 * @var array the list of IPs that are allowed to access this module.
	 * Each array element represents a single IP filter which can be either an IP address
	 * or an address with wildcard (e.g. 192.168.0.*) to represent a network segment.
	 * The default value is `['127.0.0.1', '::1']`, which means the module can only be accessed
	 * by localhost.
	 */
	public $allowedIPs = ['127.0.0.1', '::1'];
	/**
	 * @var string upload path
	 */
	public $uploadPath = '@app/runtime';

	/**
	 * Module init
	 */
	public function init()
	{
		parent::init();

		Yii::setAlias('@plupload', __DIR__);
	}

	/**
	 * @inheritdoc
	 */
	public function beforeAction($action)
	{
		if ($this->checkAccess()) {
			return parent::beforeAction($action);
		} else {
			throw new ForbiddenHttpException('You are not allowed to access this page.');
		}
	}

	/**
	 * @return boolean whether the module can be accessed by the current user
	 */
	protected function checkAccess()
	{
		$ip = Yii::$app->getRequest()->getUserIP();
		foreach ($this->allowedIPs as $filter) {
			if ($filter === '*' || $filter === $ip || (($pos = strpos($filter, '*')) !== false && !strncmp($ip, $filter, $pos))) {
				return true;
			}
		}
		Yii::warning('Access to this module is denied due to IP address restriction. The requested IP is ' . $ip, __METHOD__);
		return false;
	}
}
