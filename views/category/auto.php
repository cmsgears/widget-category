<?php
$type			= $widget->type;
$model			= $widget->model;
$disabled		= $widget->disabled;
$notes			= $widget->notes;
$showNotes		= $widget->showNotes;

$app			= $widget->app;
$controller		= $widget->controller;
$action			= $widget->action;
$actionUrl		= $widget->actionUrl;

$mapAction			= $widget->mapAction;
$mapActionUrl		= $widget->mapActionUrl;

$deleteAction		= $widget->deleteAction;
$deleteActionUrl	= $widget->deleteActionUrl;

$modelCategories	= $model->activeModelCategories;
?>
<div class="mapper mapper-auto mapper-auto-categories">
	<div class="auto-fill auto-fill-basic">
		<?php if( !$disabled ) { ?>
		<div class="auto-fill-source" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $actionUrl ?>" cmt-keep cmt-custom>
			<div class="relative">
				<div class="auto-fill-search clearfix">
					<div class="frm-icon-element icon-right">
						<span class="icon cmti cmti-search"></span>
						<input class="cmt-key-up auto-fill-text search-name" type="text" name="name" placeholder="Search Category" autocomplete="off" />
					</div>
					<input class="search-type" type="hidden" name="type" value="<?= $type ?>" />
				</div>
				<div class="auto-fill-items-wrap">
					<ul class="auto-fill-items vnav"></ul>
				</div>
			</div>
		</div>
		<div class="trigger-map-category" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $mapAction ?>" action="<?= $mapActionUrl ?>">
			<input type="hidden" name="categoryId" />
			<span class="cmt-click"></span>
		</div>
		<div class="filler-height"></div>
		<div class="mapper-items auto-fill-target">
		<?php
			foreach ( $modelCategories as $modelCategory ) {

				$category	= $modelCategory->model;
				$deleteUrl	= "$deleteActionUrl&cid=$modelCategory->id";
		?>
			<div class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $deleteAction ?>" action="<?= $deleteUrl ?>">
				<span class="spinner hidden-easy">
					<span class="cmti cmti-spinner-1 spin"></span>
				</span>
				<span class="mapper-item-remove btn-icon-o"><i class="icon cmti cmti-close cmt-click"></i></span>
				<span class="name"><?= $category->name ?></span>
				<input class="cid" type="hidden" name="cid" value="<?= $modelCategory->id ?>" />
			</div>
		<?php } ?>
		</div>
		<?php } else { ?>
		<div class="mapper-items auto-fill-target">
			<?php
				foreach ( $modelCategories as $modelCategory ) {

					$category	= $modelCategory->model;
			?>
			<div class="mapper-item">
				<span class="name"><?= $category->name ?></span>
			</div>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
</div>

<div class="clear filler-height"></div>

<?php if( !$disabled && $showNotes ) { ?>
	<div class="note"><?= $notes ?></div>
<?php } ?>

<?php include 'templates/category.php'; ?>
