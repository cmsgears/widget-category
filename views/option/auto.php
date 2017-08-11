<?php
$inputType		= $widget->inputType;
$binderModel	= $widget->binderModel;
$disabled		= $widget->disabled;
$notes			= $widget->notes;
$showNotes		= $widget->showNotes;

$app			= $widget->app;
$controller		= $widget->controller;
$action			= $widget->action;
$actionUrl		= $widget->actionUrl;

$categoryOptions	= $widget->categoryOptions;
$modelOptions		= $widget->model->getOptionIdListByCategoryId( $widget->category->id );
?>
<div class="mapper mapper-action mapper-action-options">
	<div class="mapper-items">
		<?php
			foreach ( $categoryOptions as $categoryOption ) {

				$mapped	= in_array( $categoryOption->id, $modelOptions );
		?>
			<?php if( $inputType == 'checkbox' ) { ?>
			<span class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $actionUrl ?>&cid=<?= $categoryOption->id ?>" cmt-keep cmt-custom>
				<span class="cmt-choice cmt-checkbox">
					<label>
						<input type="hidden" name="<?= $binderModel ?>" value="0" />
						<input id="category-option-<?= $categoryOption->id ?>" class="cmt-change" type="checkbox" name="value" <?= $mapped ? 'checked' : null ?> />
						<span class="label cmti cmti-checkbox"></span>
						<span><?= $categoryOption->name ?></span>
					</label>
				</span>
				<span class="spinner hidden-easy">
					<span class="cmti cmti-1-5x cmti-spinner-1 spin"></span>
				</span>
			</span>
			<?php } ?>
		<?php } ?>
	</div>
</div>

<div class="clear filler-height"></div>

<?php if( !$disabled && $showNotes ) { ?>
	<div class="note"><?= $notes ?></div>
<?php } ?>
