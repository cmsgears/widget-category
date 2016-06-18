<?php
$categories 	= $widget->categories;
$type 			= $widget->type;
$levelList 		= $widget->levelList;
$model 			= $widget->model;
$binderModel 	= $widget->binderModel;
$notes 			= $widget->notes;
$showNotes 		= $widget->showNotes;
$inputType 		= $widget->inputType;
$disabled		= $widget->disabled;
?>
<div class="wrap-categories clearfix">
<?php
	if( count( $categories ) > 0 ) {

		$modelCategories	= $model->getCategoryIdListByType( $type );

		foreach ( $categories as $category ) {

			$temp			= [];
			$temp[ 'id' ]	= $category->id;
			$temp[ 'name' ]	= $category->name;
			$category		= $temp;

			if( in_array( $category[ 'id' ], $modelCategories ) ) {
?>
				<span class="category col2">
					<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
					<input type="<?=$inputType?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" checked <?= $disabled ? 'disabled' : '' ?> />
					<?= $category[ 'name' ] ?>
				</span>
<?php		}
			else {
?>
				<span class="category col2">
					<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
					<input type="<?=$inputType?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" <?= $disabled ? 'disabled' : '' ?> />
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