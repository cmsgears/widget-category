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

$categoryOptions	= $widget->categoryOptions;
$modelOptions		= $model->getOptionIdListByCategoryId( $widget->category->id );
?>
<div class="<?= $mapperClass ?>">
	<div class="mapper-items">
		<?php
			foreach( $categoryOptions as $categoryOption ) {

				$mapped	= in_array( $categoryOption->id, $modelOptions );
				$uid	= "category-option-{$model->id}-{$categoryOption->id}";
				$apix	= UrlUtil::addParam( $actionUrl, 'cid', $categoryOption->id );
		?>
			<?php if( $inputType == 'checkbox' ) { ?>
				<span class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $apix ?>" cmt-keep cmt-custom>
					<span class="cmt-checkbox choice">
						<label class="choice-option">
							<input id="<?= $uid ?>" class="cmt-change" type="checkbox" name="value" <?= $mapped ? 'checked' : null ?> <?= $disabled ? 'disabled' : null ?> />
							<span class="label cmti cmti-checkbox"></span>
							<span><?= $categoryOption->name ?></span>
						</label>
					</span>
					<span class="spinner hidden-easy">
						<span class="cmti cmti-1-5x cmti-spinner-1 spin"></span>
					</span>
				</span>
			<?php } else if( $inputType == 'radio' ) { ?>
				<span class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $action ?>" action="<?= $apix ?>" cmt-keep cmt-custom>
					<span class="cmt-choice cmt-radio">
						<label class="choice-option">
							<input id="<?= $uid ?>" class="cmt-change" type="radio" name="value" <?= $mapped ? 'checked' : null ?> <?= $disabled ? 'disabled' : null ?> />
							<span class="label cmti cmti-radio"></span>
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
<?php if( !$disabled && $showNotes && !empty( $notes ) ) { ?>
	<div class="clear filler-height"></div>
	<div class="note"><?= $notes ?></div>
<?php } ?>
