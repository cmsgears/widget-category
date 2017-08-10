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
			<?php foreach ( $categoryOptions as $categoryOption ) { ?>
				<?php if( $inputType == 'checkbox' ) { ?>
					<span class="mapper-item"></span>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>

<div class="clear filler-height"></div>

<?php if( !$disabled && $showNotes ) { ?>
	<div class="note"><?= $notes ?></div>
<?php } ?>
