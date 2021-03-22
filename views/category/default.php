<?php
$categories		= $widget->categories;
$type			= $widget->type;
$parentType		= $widget->parentType;
$levelList		= $widget->levelList;
$model			= $widget->model;
$binderModel	= $widget->binderModel;

$notes		= $widget->notes;
$showNotes	= $widget->showNotes;

$mapperClass = $widget->mapperClass;

$inputType	= $widget->inputType;
$disabled	= $widget->disabled;
$service	= $widget->service;
?>
<div class="<?= $mapperClass ?>">
<?php
	if( count( $categories ) > 0 ) {
?>
	<div class="mapper-items">
<?php
		$modelCategories = [];

		if( isset( $model ) ) {

			if( isset( $service ) ) {

				$catService			= Yii::$app->factory->get( 'modelCategoryService' );
				$modelCategories	= $catService->getActiveCategoryIdListByParent( $model->id, $parentType );
			}
			else {

				$modelCategories = $model->getCategoryIdListByType( $type );
			}
		}

		foreach( $categories as $category ) {

			$temp = [];

			$temp[ 'id' ]	= $category->id;
			$temp[ 'name' ]	= $category->name;

			$category = $temp;

			if( in_array( $category[ 'id' ], $modelCategories ) ) {
?>
				<div class="mapper-item">
					<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $category[ 'id' ] ?>" />
					<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $category[ 'id' ] ?>" checked <?= $disabled ? 'disabled' : '' ?> />
					<?= $category[ 'name' ] ?>
				</div>
<?php		}
			else {
?>
				<div class="mapper-item">
					<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $category[ 'id' ] ?>" />
					<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $category[ 'id' ] ?>" <?= $disabled ? 'disabled' : '' ?> />
					<?= $category[ 'name' ] ?>
				</div>
<?php		}
		}
?>
	</div>
<?php
	}
	else {

		echo 'No categories found.';
	}
?>
</div>
<div class="clear filler-height"></div>
<?php if( $showNotes ) { ?>
	<div class="note"><?= $notes ?></div>
<?php } ?>
