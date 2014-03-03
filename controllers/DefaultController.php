<?php

namespace soju\yii2plupload\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * Plupload Module - Default Controller
 * 
 * @author soju <soju22@gmail.com>
 */
class DefaultController extends Controller
{
	public function actionIndex($type='core')
	{
		return $this->render('index', [
			'type'=>$type,
		]);
	}
	
	/**
	 * Simple upload
	 */
	public function actionUpload()
	{
		$result = [
			'OK'=>0,
		];

		if (isset($_POST['name']))
		{
			$file = UploadedFile::getInstanceByName('file');
			if ($file->saveAs(Yii::getAlias($this->module->uploadPath.'/'.$file->name)))
			{
				$result['OK'] = 1;
			}
		}

		header('Content-type: application/json');
		echo Json::encode($result);
		exit();
	}
}
