<div class="wrap-categories cscroller">
<?php
	if( count( $categories ) > 0 ) {

		$modelCategories	= $model->getCategoryIdListByType( $type );

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

			if( $allDisabled ) {

				if( in_array( $category[ 'id' ], $modelCategories ) ) {
?>
					<span class="category depth-<?= $depth ?>">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
						<input type="checkbox" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" checked disabled /> 
						<?= $category[ 'name' ] ?>
					</span>
<?php			}
				else {
?>
					<span class="category depth-<?= $depth ?>">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
						<input type="checkbox" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" disabled /> 
						<?= $category[ 'name' ] ?>
					</span>
<?php			}
			}
			else {


				if( in_array( $category[ 'id' ], $modelCategories ) ) {
?>
					<span class="category depth-<?= $depth ?>">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
						<input type="checkbox" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" checked /> 
						<?= $category[ 'name' ] ?>
					</span>
<?php			}
				else {
?>
					<span class="category depth-<?= $depth ?>">
						<input type="hidden" name="<?= $binderModel ?>[allData][]" value="<?= $category[ 'id' ] ?>" />
						<input type="checkbox" name="<?= $binderModel ?>[bindedData][]" value="<?= $category[ 'id' ] ?>" /> 
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