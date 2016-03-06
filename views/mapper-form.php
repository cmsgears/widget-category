<div class="wrap-categories clearfix">
<?php
	if( count( $categories ) > 0 ) {
		
		$modelCategories	= $model->getCategoryIdListByType( $type );

		$rootId				= 0;

		foreach ( $categories as $category ) {
			
			if( $levelList && isset( $category[ 'rootId' ] ) && $category[ 'rootId' ] != $rootId ) {

				$rootId	= $category[ 'rootId' ];
			}
			else {

				$temp			= [];
				$temp[ 'id' ]	= $category->id;
				$temp[ 'name' ]	= $category->name;
				$category		= $temp;
			}

			if( $allDisabled ) {

				if( in_array( $category[ 'id' ], $modelCategories ) ) {
?>
					<span class="category col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
						<input type="<?=$inputType?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" checked disabled /> 
						<?= $category[ 'name' ] ?>
					</span>
<?php			}
				else {
?>
					<span class="category col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
						<input type="<?=$inputType?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" disabled /> 
						<?= $category[ 'name' ] ?>
					</span>
<?php			}
			}
			else {


				if( in_array( $category[ 'id' ], $modelCategories ) ) {
?>
					<span class="category col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
						<input type="<?=$inputType?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" checked /> 
						<?= $category[ 'name' ] ?>
					</span>
<?php			}
				else {
?>
					<span class="category col2">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
						<input type="<?=$inputType?>" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" /> 
						<?= $category[ 'name' ] ?>
					</span>
<?php			}
			}
		}
	}
	else {

		echo 'No categories found.';
	}
?>
</div>
<div class="clear filler-height"></div>
<?php if( isset( $notes ) ) { ?>
	<div class="note"><?= $notes ?></div>
<?php } ?>