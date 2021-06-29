<?php
$category		= $widget->category;
$options		= $widget->categoryOptions;
$model			= $widget->model;
$binderModel	= $widget->binderModel;

$disabled = $widget->disabled;

$notes = $widget->notes;

$mapperClass = $widget->mapperClass;

$inputType = $widget->inputType;
?>
<div class="<?= $mapperClass ?>">
<?php
	if( count( $options ) > 0 ) {
?>
	<div class="mapper-items">
<?php
		$modelOptions = $model->getOptionIdListByCategoryId( $category->id );

		foreach( $options as $option ) {

			if( $disabled ) {

				if( in_array( $option->id, $modelOptions ) ) {
?>
					<div class="mapper-item">
						<span class="choice">
							<label class="choice-option">
								<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $option->id ?>" />
								<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $option->id ?>" checked disabled />
								<span class="label cmti cmti-checkbox"></span>
								<?= $option->name ?>
							</label>
						</span>
					</div>
<?php			}
				else {
?>
					<div class="mapper-item">
						<span class="choice">
							<label class="choice-option">
								<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $option->id ?>" />
								<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $option->id ?>" disabled />
								<span class="label cmti cmti-checkbox"></span>
								<?= $option->name ?>
							</label>
						</span>
					</div>
<?php			}
			}
			else {

				if( in_array( $option->id, $modelOptions ) ) {
?>
					<div class="mapper-item">
						<span class="choice">
							<label class="choice-option">
								<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $option->id ?>" />
								<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $option->id ?>" checked />
								<span class="label cmti cmti-checkbox"></span>
								<?= $option->name ?>
							</label>
						</span>
					</div>
<?php			}
				else {
?>
					<div class="mapper-item">
						<span class="choice">
							<label class="choice-option">
								<input type="hidden" name="<?= $binderModel ?>[all][]" value="<?= $option->id ?>" />
								<input type="<?= $inputType ?>" name="<?= $binderModel ?>[binded][]" value="<?= $option->id ?>" />
								<span class="label cmti cmti-checkbox"></span>
								<?= $option->name ?>
							</label>
						</span>
					</div>
<?php			}
			}
		}
?>
	</div>
<?php
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
