<div class="wrap-categories cscroller">
<?php
	if( count( $categories ) > 0 ) {
		
		$modelCategories	= $model->getCategoryIdList();
		
		$rootId				= 0;
		$depth				= 0;

		foreach ( $categories as $category ) {

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
			
			if( in_array( $category[ 'id' ], $modelCategories ) ) {
?>
				<span class="category depth-<?= $depth ?>"><input type="checkbox" name="Binder[bindedData][]" value="<?= $category[ 'id' ] ?>" checked /> <?= $category[ 'name' ] ?></span>
<?php		}
			else {
?>
				<span class="category depth-<?= $depth ?>"><input type="checkbox" name="Binder[bindedData][]" value="<?= $category[ 'id' ] ?>" /> <?= $category[ 'name' ] ?></span>
<?php		}
		}
	}
	else {

		echo 'No categories found.';
	}
?>
</div>
<div class="clear filler-height"></div>
<div class="note"><?= $notes ?></div>