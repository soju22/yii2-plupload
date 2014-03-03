<?php
use yii\helpers\Html;
use yii\bootstrap\Button;

/**
 * @var \yii\web\View $this
 */
?>
<ul class="nav nav-tabs">
  <li <?= $type=='core' ? 'class="active"' : ''; ?>><a href="<?= Html::url(['default/', 'type'=>'core']); ?>">Core Widget</a></li>
  <li <?= $type=='ui' ? 'class="active"' : ''; ?>><a href="<?= Html::url(['default/', 'type'=>'ui']); ?>">UI Widget</a></li>
  <li <?= $type=='queue' ? 'class="active"' : ''; ?>><a href="<?= Html::url(['default/', 'type'=>'queue']); ?>">Queue Widget</a></li>
</ul>

<div class="plupload tab-content">

	<?php if ($type=='core') : ?>
	<div class="tab-pane active" id="core">
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
				'runtimes'=>'flash',
			],
		]); ?>
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
	</div>
	<?php endif; ?>

	<?php if ($type=='ui') : ?>
	<div class="tab-pane active" id="ui">
		<?= \soju\yii2plupload\widgets\UIWidget::widget([
			'settings'=>[
				'url'=>['default/upload'],
				'max_file_size' => '1mb',
				'filters' => [ 
					['title' => 'Image files', 'extensions' => 'jpg,gif,png'],
					['title' => 'PDF files', 'extensions' => 'pdf'],
					['title' => 'Zip files', 'extensions' => 'zip,avi'],
				],
			],
		]); ?>
	</div>
	<?php endif; ?>

	<?php if ($type=='queue') : ?>
	<div class="tab-pane active" id="queue">
		<?= \soju\yii2plupload\widgets\QueueWidget::widget([
			'settings'=>[
				'url'=>['default/upload'],
				'max_file_size' => '1mb',
				'filters' => [ 
					['title' => 'Image files', 'extensions' => 'jpg,gif,png'],
					['title' => 'PDF files', 'extensions' => 'pdf'],
					['title' => 'Zip files', 'extensions' => 'zip,avi'],
				],
			],
		]); ?>
	</div>
	<?php endif; ?>

</div>

