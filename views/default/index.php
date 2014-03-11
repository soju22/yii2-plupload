<?php
use yii\helpers\Url;

/**
 * @var \yii\web\View $this
 */
?>
<ul class="nav nav-tabs">
  <li <?= $type=='core' ? 'class="active"' : ''; ?>><a href="<?= Url::to(['default/', 'type'=>'core']); ?>">Core Widget</a></li>
  <li <?= $type=='ui' ? 'class="active"' : ''; ?>><a href="<?= Url::to(['default/', 'type'=>'ui']); ?>">UI Widget</a></li>
  <li <?= $type=='queue' ? 'class="active"' : ''; ?>><a href="<?= Url::to(['default/', 'type'=>'queue']); ?>">Queue Widget</a></li>
</ul>

<div class="plupload tab-content">

	<?php if ($type=='core') : ?>
	<div class="tab-pane active" id="core">
		<div class="row">
			<div class="col-md-6">
				<h2>Plupload Core Widget</h2>
				<div class="bs-callout bs-callout-info">
					<h4>Simple Core Widget</h4>
					<p>This core widget is just a simple way to create a Plupload uploader object, example code is based on the following tutorial : <a href="http://www.plupload.com/docs/Getting-Started">Getting started</a>.</p>
				</div>
				<?= $this->render('_test-core'); ?>
			</div>
			<div class="col-md-6">
				<h3>Code</h3>
				<div class="code"><code class=""><?php highlight_file(Yii::getAlias($this->findViewFile('_test-core'))); ?></code></div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ($type=='ui') : ?>
	<div class="tab-pane active" id="ui">
		<div class="row">
			<div class="col-md-6">
				<h2>Plupload UI Widget</h2>
				<?= $this->render('_test-ui'); ?>
			</div>
			<div class="col-md-6">
				<h3>Code</h3>
				<div class="code"><code class=""><?php highlight_file(Yii::getAlias($this->findViewFile('_test-ui'))); ?></code></div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ($type=='queue') : ?>
	<div class="tab-pane active" id="queue">
		<div class="row">
			<div class="col-md-6">
				<h2>Plupload Queue Widget</h2>
				<?= $this->render('_test-queue'); ?>
			</div>
			<div class="col-md-6">
				<h3>Code</h3>
				<div class="code"><code class=""><?php highlight_file(Yii::getAlias($this->findViewFile('_test-queue'))); ?></code></div>
			</div>
		</div>
	</div>
	<?php endif; ?>

</div>

