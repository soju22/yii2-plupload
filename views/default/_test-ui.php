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
