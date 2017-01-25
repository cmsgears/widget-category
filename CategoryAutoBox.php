<?php
namespace cmsgears\widgets\category;

// Yii Imports
use \Yii;

class CategoryAutoBox extends CategoryMapper {

	// Variables ---------------------------------------------------

	// Public Variables --------------------

	public $searchByType	= false;

	public $levelList		= false;

	public $notes			= 'Note: Type in search box to filter categories.';

	public $showNotes		= true;

	public $inputType		= 'none';

	public $template		= 'auto-box';

	// Controller where mapping request need to be triggered
	public $controller		= 'category';

	// Controller action to handle the search request
	public $action			= 'autoSearch';

	// Explicit URL to handle the controller search action request
	public $actionUrl		= 'core/category/auto-search';

	// Controller action to handle the mapping request
	public $mapAction		= 'mapModelCategory';

	// Explicit URL to handle the controller mapping action request
	public $mapActionUrl	= null;

	// Controller action to handle the delete request
	public $deleteAction	= 'deleteModelCategory';

	// Explicit URL to handle the controller delete action request
	public $deleteActionUrl	= null;

	// Private Variables -------------------

	// Constructor and Initialisation ------------------------------

	// Instance Methods --------------------------------------------

	// yii\base\Widget

	// CategoryAutoBox
}
