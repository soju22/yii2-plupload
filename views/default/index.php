<h2>Plupload UI Widget</h2>
<?= \soju\yii2plupload\widgets\UIWidget::widget([
	'settings'=>[
		'url'=>['/plupload/default/upload'],
		'max_file_size' => '1mb',
		'filters' => [ 
			['title' => 'Image files', 'extensions' => 'jpg,gif,png'],
			['title' => 'Zip files', 'extensions' => 'zip,avi'],
		],
	],
]); ?>
