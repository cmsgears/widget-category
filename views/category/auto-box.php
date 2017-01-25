<?php
$type			= $widget->type;
$model			= $widget->model;
$binderModel	= $widget->binderModel;
$notes			= $widget->notes;
$showNotes		= $widget->showNotes;
$disabled		= $widget->disabled;

$controller		= $widget->controller;
$action			= $widget->action;
$actionUrl		= $widget->actionUrl;

$mapAction			= $widget->mapAction;
$mapActionUrl		= $widget->mapActionUrl;

$deleteAction		= $widget->deleteAction;
$deleteActionUrl	= $widget->deleteActionUrl;
?>
<div class="wrap-categories clearfix">
	<?php if( $disabled ) { ?>
		<div class="auto-mapped">
			<ul class="item-list">
			<?php
				$categories	= $model->getCategoryIdNameMap( true );

				foreach ( $categories as $key => $value ) {
			?>
					<li><span class='value'><?= $value ?></span></li>
			<?php } ?>
			</ul>
		</div>
	<?php } else { ?>
		<div class="auto-search cmt-request" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $actionUrl ?>" cmt-keep>
			<input type="hidden" name="type" value="<?= $type ?>" />
			<label>Search Category</label>
			<input type="text" class="cmt-key-up" name="name" autocomplete="off" value="" />
		</div>
		<div class="auto-map cmt-request" cmt-controller="<?= $controller ?>" cmt-action="<?= $mapAction ?>" action="<?= $mapActionUrl ?>" cmt-keep>
			<input type="hidden" name="categoryId" />
			<ul class="item-list"></ul>
		</div>
		<div class="auto-mapped cmt-request" cmt-controller="<?= $controller ?>" cmt-action="<?= $deleteAction ?>" action="<?= $deleteActionUrl ?>" cmt-keep>
			<input type="hidden" name="categoryId" />
			<ul class="item-list">
			<?php
				$categories	= $model->getCategoryIdNameMap( true );

				foreach ( $categories as $key => $value ) {
			?>
					<li><span class='value'><?= $value ?></span><i data-id='<?= $key ?>' class='cmti cmti-close close cmt-click'></i></li>
			<?php } ?>
			</ul>
		</div>
	<?php } ?>
</div>

<div class="clear filler-height"></div>

<?php if( $showNotes ) { ?>
	<div class="note"><?= $notes ?></div>
<?php } ?>