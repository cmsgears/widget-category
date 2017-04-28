<?php
$type			= $widget->type;
$model			= $widget->model;
$binderModel	= $widget->binderModel;
$notes			= $widget->notes;
$showNotes		= $widget->showNotes;
$disabled		= $widget->disabled;

$app			= $widget->app;
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
					<li><span class="value"><?= $value ?></span></li>
			<?php } ?>
			</ul>
		</div>
	<?php } else { ?>
		<label>Search Category</label>
		<div class="auto-fill">
			<div class="wrap-fill" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $actionUrl ?>" cmt-keep cmt-custom>
				<div class="relative">
					<input type="hidden" name="type" value="<?= $type ?>" />
					<div class="frm-icon-element icon-right">
						<span class="cmti cmti-search"></span>
						<input class="cmt-key-up auto-fill-text fill-clear" type="text" placeholder="Search Category" autocomplete="off" />
					</div>
					<span class="wrap-auto-list">
						<ul class="auto-list vnav" map-action="<?= $mapAction ?>" map-url="<?= $mapActionUrl ?>"></ul>
					</span>
				</div>
			</div>
			<div class="wrap-field-auto"></div>
			<div class="trigger-map-category" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $mapAction ?>" action="<?= $mapActionUrl ?>">
				<input type="hidden" name="categoryId" />
				<span class="cmt-click"></span>
			</div>
		</div>
		<div class="clear"></div>
		<div class="auto-mapped" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $deleteAction ?>" action="<?= $deleteActionUrl ?>" cmt-keep>
			<input type="hidden" name="categoryId" />
			<ul class="item-list">
			<?php
				$categories	= $model->getCategoryIdNameMap( true );

				foreach ( $categories as $key => $value ) {
			?>
					<li><span class='value'><?= $value ?></span><i data-id='<?= $key ?>' class='cmti cmti-close-c close cmt-click'></i></li>
			<?php } ?>
			</ul>
		</div>
	<?php } ?>
</div>

<div class="clear filler-height"></div>

<?php if( $showNotes ) { ?>
	<div class="note"><?= $notes ?></div>
<?php } ?>