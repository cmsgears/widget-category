<?php
$categories		= $widget->categories;
$type			= $widget->type;
$levelList		= $widget->levelList;
$model			= $widget->model;
$binderModel	= $widget->binderModel;
$notes			= $widget->notes;
$showNotes		= $widget->showNotes;
$inputType		= $widget->inputType;
$disabled		= $widget->disabled;
$service		= $widget->service;
?>
<div class="wrap-categories cscroller">
<?php
	if( count( $categories ) > 0 ) {

		$modelCategories	= null;

		if( $service ) {

			$catService			= Yii::$app->factory->get( 'modelCategoryService' );
			$modelCategories	= $catService->getActiveCategoryIdListByParent( $model->id, $type );
		}
		else {

			$modelCategories	= $model->getCategoryIdListByType( $type );
		}

		$rootId				= 0;
		$depth				= 0;

		foreach ( $categories as $category ) {

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

				$temp			= [];
				$temp[ 'id' ]	= $category->id;
				$temp[ 'name' ]	= $category->name;
				$category		= $temp;
			}

			if( in_array( $category[ 'id' ], $modelCategories ) ) {
?>
				<span class="category depth-<?= $depth ?>">
					<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
					<input type="checkbox" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" checked <?= $disabled ? 'disabled' : '' ?> />
					<?= $category[ 'name' ] ?>
				</span>
<?php		}
			else {
?>
				<span class="category depth-<?= $depth ?>">
					<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
					<input type="checkbox" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" <?= $disabled ? 'disabled' : '' ?> />
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