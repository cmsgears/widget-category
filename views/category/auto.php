<?php
// CMG Imports
use cmsgears\core\common\utilities\UrlUtil;

$inputType = $widget->inputType;

$model = $widget->model;

$disabled = $widget->disabled;

$notes		= $widget->notes;
$showNotes	= $widget->showNotes;

$mapperClass = $widget->mapperClass;

$app		= $widget->app;
$controller	= $widget->controller;
$action		= $widget->action;
$actionUrl	= $widget->actionUrl;

$categories			= $widget->categories;
$modelCategories	= $model->getCategoryIdList();
?>
<div class="<?= $mapperClass ?>">
	<div class="mapper-items">
		<?php
			foreach( $categories as $category ) {

				$mapped	= in_array( $category->id, $modelCategories );
				$uid	= "category-cat-{$model->id}-{$category->id}";
				$apix	= UrlUtil::addParam( $actionUrl, 'cid', $category->id );
		?>
			<?php if( $inputType == 'checkbox' ) { ?>
			<span class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $apix ?>" cmt-keep cmt-custom>
				<span class="cmt-checkbox choice">
					<label class="choice-option">
						<input id="<?= $uid ?>" class="cmt-change" type="checkbox" name="value" <?= $mapped ? 'checked' : null ?> />
						<span class="label cmti cmti-checkbox"></span>
						<span><?= $category->name ?></span>
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
<?php if( !$disabled && $showNotes && !empty( $notes ) ) { ?>
	<div class="clear filler-height"></div>
	<div class="note"><?= $notes ?></div>
<?php } ?>
