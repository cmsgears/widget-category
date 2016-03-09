<div class="wrap-categories clearfix">
<?php
	if( count( $options ) > 0 ) {
		
		$modelOptions	= $model->getOptionIdListByCategory( $category );

		foreach ( $options as $option ) {

			if( $allDisabled ) {

				if( in_array( $option->id, $modelOptions ) ) {
?>
					<span class="category col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" checked disabled /> 
						<?= $option->name ?>
					</span>
<?php			}
				else {
?>
					<span class="category col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" disabled /> 
						<?= $option->name ?>
					</span>
<?php			}
			}
			else {

				if( in_array( $option->id, $modelOptions ) ) {
?>
					<span class="category col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" checked /> 
						<?= $option->name ?>
					</span>
<?php			}
				else {
?>
					<span class="category col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $option->id ?>" />
						<input type="<?= $inputType ?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $option->id ?>" /> 
						<?= $option->name ?>
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