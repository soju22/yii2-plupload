<?php
use yii\bootstrap\Button;
?>

<ul id="filelist"></ul>

<?= Button::widget([
	'label' => 'Browse',
	'options' => [
		'id'=>'browse',
		'class' => 'btn-default'
	],
]) ?>

<?= Button::widget([
	'label' => 'Start Upload',
	'options' => [
		'id'=>'start-upload',
		'class' => 'btn-default'
	],
]); ?>

<?= \soju\yii2plupload\widgets\CoreWidget::widget([
	'varName'=>'uploader',
	'settings'=>[
		'browse_button'=>'browse',
		'url'=>['default/upload'],
	],
]); ?>

<h3>Console</h3>
<pre id="console"></pre>

<?php $this->registerJs("
	uploader.bind('FilesAdded', function(up, files) {
		var html = '';
		plupload.each(files, function(file) {
			html += '<li id=\"' + file.id + '\">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';
		});
		document.getElementById('filelist').innerHTML += html;
	});
	uploader.bind('UploadProgress', function(up, file) {
		document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + \"%</span>\";
	});
	uploader.bind('Error', function(up, err) {
		document.getElementById('console').innerHTML += \"\\nError #\" + err.code + \": \" + err.message;
	});
	document.getElementById('start-upload').onclick = function() {
		uploader.start();
	};
"); ?>
