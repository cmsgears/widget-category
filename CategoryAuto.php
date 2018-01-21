<?php
namespace cmsgears\widgets\category;

class CategoryAuto extends CategoryMapper {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	public $searchByType	= false;

	public $levelList		= false;

	public $notes			= '<b>Notes</b>: Type in search box to filter categories and select the category to map.';

	public $showNotes		= true;

	public $inputType		= 'none';

	public $template		= 'auto';

	// Application
	public $app				= 'main';

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

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// yii\base\Widget --------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// CategoryAuto --------------------------

}
