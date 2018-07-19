<?php
$category		= $widget->category;
$options		= $widget->categoryOptions;
$model			= $widget->model;
$binderModel	= $widget->binderModel;
$disabled		= $widget->disabled;
$notes			= $widget->notes;
$inputType		= $widget->inputType;
?>
<div class="wrap-options row">
<?php
	if( count( $options ) > 0 ) {

		$modelOptions = $model->getOptionIdListByCategoryId( $category->id );

		foreach( $options as $option ) {

			if( $disabled ) {

				if( in_array( $option->id, $modelOptions ) ) {
?>
					<span class="cmt-choice">
						<label>
							<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $option->id ?>" />
							<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $option->id ?>" checked disabled />
							<span class="label cmti cmti-checkbox"></span>
							<?= $option->value ?>
						</label>
					</span>
<?php			}
				else {
?>
					<span class="cmt-choice">
						<label>
							<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $option->id ?>" />
							<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $option->id ?>" disabled />
							<span class="label cmti cmti-checkbox"></span>
							<?= $option->value ?>
						</label>
					</span>
<?php			}
			}
			else {

				if( in_array( $option->id, $modelOptions ) ) {
?>

					<span class="cmt-choice">
						<label>
							<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $option->id ?>" />
							<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $option->id ?>" checked />
							<span class="label cmti cmti-checkbox"></span>
							<?= $option->value ?>
						</label>
					</span>
<?php			}
				else {
?>
					<span class="cmt-choice">
						<label>
							<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $option->id ?>" />
							<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $option->id ?>" />
							<span class="label cmti cmti-checkbox"></span>
							<?= $option->value ?>
						</label>
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
