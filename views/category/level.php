<?php
$categories		= $widget->categories;
$type			= $widget->type;
$parentType		= $widget->parentType;
$levelList		= $widget->levelList;
$model			= $widget->model;
$binderModel	= $widget->binderModel;
$mapToColumn	= $widget->mapToColumn;
$columnName		= $widget->columnName;

$notes			= $widget->notes;
$showNotes		= $widget->showNotes;

$inputType		= $widget->inputType;
$disabled		= $widget->disabled;
$service		= $widget->service;
?>
<div class="wrap-categories cscroller">
<?php
	if( count( $categories ) > 0 ) {

		$modelCategories = [];

		if( isset( $model ) && !$mapToColumn ) {

			if( $service ) {

				$catService			= Yii::$app->factory->get( 'modelCategoryService' );
				$modelCategories	= $catService->getActiveCategoryIdListByParent( $model->id, $parentType );
			}
			else {

				$modelCategories = $model->getCategoryIdListByType( $parentType );
			}
		}

		$rootId = 0;
		$depth	= 0;

		foreach( $categories as $category ) {

			if( $levelList ) {

				if( isset( $category[ 'rootId' ] ) ) {

					if( $category[ 'rootId' ] != $rootId ) {

						$depth	= 0;
						$rootId	= $category[ 'rootId' ];
					}
					else {

						$depth	= $category[ 'depth' ];
					}
				}
				else {

					$depth	= 0;
				}
			}
			else {

				$temp = [];

				$temp[ 'id' ]	= $category->id;
				$temp[ 'name' ]	= $category->name;

				$category = $temp;
			}

			$binder	= $mapToColumn ? $binderModel . "[$columnName]" : $binderModel . "[binded][]";

			if( in_array( $category[ 'id' ], $modelCategories ) ) {
?>
				<span class="category depth-<?= $depth ?>">
					<?php if( !$mapToColumn ) { ?>
						<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $category[ 'id' ] ?>" />
					<?php } ?>
					<input type="<?= $inputType ?>" name="<?= $binder ?>" value="<?= $category[ 'id' ] ?>" checked <?= $disabled ? 'disabled' : '' ?> />
					<?= $category[ 'name' ] ?>
				</span>
<?php		}
			else {

				$checked = ( $mapToColumn && isset( $model->$columnName ) && $category[ 'id' ] == $model->$columnName ) ? 'checked' : null;
?>
				<span class="category depth-<?= $depth ?>">
					<?php if( !$mapToColumn ) { ?>
						<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $category[ 'id' ] ?>" />
					<?php } ?>
					<input type="<?= $inputType ?>" name="<?= $binder ?>" value="<?= $category[ 'id' ] ?>" <?= $checked ?> <?= $disabled ? 'disabled' : '' ?> />
					<?= $category[ 'name' ] ?>
				</span>
<?php		}
		}
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
