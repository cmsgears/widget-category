<?php
$category 		= $widget->category;
$options 		= $widget->categoryOptions;
$model			= $widget->model;
$binderModel	= $widget->binderModel;
$disabled 		= $widget->disabled;
$notes 			= $widget->notes;
$inputType 		= $widget->inputType;
?>
<div class="wrap-options clearfix">
<?php
	if( count( $options ) > 0 ) {

		$modelOptions	= $model->getOptionIdListByCategoryId( $category->id );

		foreach ( $options as $option ) {

			if( $disabled ) {

				if( in_array( $option->id, $modelOptions ) ) {
?>
					<span class="options col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" checked disabled />
						<?= $option->value ?>
					</span>
<?php			}
				else {
?>
					<span class="options col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" disabled />
						<?= $option->value ?>
					</span>
<?php			}
			}
			else {

				if( in_array( $option->id, $modelOptions ) ) {
?>
					<span class="options col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" checked />
						<?= $option->value ?>
					</span>
<?php			}
				else {
?>
					<span class="options col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" />
						<?= $option->value ?>
					</span>
<?php			}
			}
		}
	}
	else {

		echo 'No options found.';
	}
?>
</div>
<div class="clear filler-height"></div>
<?php if( isset( $notes ) ) { ?>
	<div class="note"><?= $notes ?></div>
<?php } ?>